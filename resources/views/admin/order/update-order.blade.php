@extends('admin.layout.admin-layout')
@section('update-order')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <form action="{{ URL::to('admin/order/update-order/'.$get_order->order_id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="flex justify-between items-center">
                    <h2 class="my-3 mt-6 text-2xl font-semibold text-gray-700">Update order</h2>
                </div>
                <div class="grid grid-cols-1 gap-x-6 sm:grid-cols-6 w-3/5 mx-auto">
                    <div class="sm:col-span-3">
                        <label class="block text-base font-medium leading-6 text-gray-500">Order ID</label>
                        <div class="mt-2">
                            <input disabled type="text" name="" value="{{ $get_order->order_id }}"
                                class="font-medium mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">

                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label class="block text-base font-medium leading-6 text-gray-500">Payment cost</label>
                        <div class="mt-2">
                            <input type="number" step="0.01" name="payment_cost" value="{{ $get_order->payment_cost }}"
                                class="font-medium mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                        </div>
                    </div>

                    <div class="sm:col-span-3 mt-4">
                        <label class="block text-base font-medium leading-6 text-gray-500">Shipping cost</label>
                        <div class="mt-2">
                            <input name="shipping_cost" type="text" value="{{ $get_order->shipping_cost }}"
                                class="font-medium mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                        </div>
                    </div>
                    <div class="sm:col-span-3 mt-4">
                        <label class="block text-base font-medium leading-6 text-gray-500">Receiver name</label>
                        <div class="mt-2">
                            <input name="receiverName" type="text" value="{{$get_order->receiverName}}"
                                class="font-medium mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                        </div>
                    </div>
                    <div class="sm:col-span-3 mt-4">
                        <label class="block text-base font-medium leading-6 text-gray-500">Receiver address</label>
                        <div class="mt-2">
                            <input name="receiverAddress" type="text" value="{{$get_order->receiverAddress}}"
                                class="font-medium mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                        </div>
                    </div>
                    <div class="sm:col-span-3 mt-4">
                        <label class="block text-base font-medium leading-6 text-gray-500">Phone number</label>
                        <div class="mt-2">
                            <input name="receiverPhone" type="text" value="{{$get_order->receiverPhone}}"
                                class="font-medium mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                        </div>
                    </div>
                    <div class="sm:col-span-3 mt-4">
                        <label class="block text-base font-medium leading-6 text-gray-500">Status</label>
                        <div class="mt-2">
                            <select id="status" name="status"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                <option value="Pending" {{ $get_order->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Shipping" {{ $get_order->status == 'Shipping' ? 'selected' : '' }}>Shipping</option>
                                <option value="Complete" {{ $get_order->status == 'Complete' ? 'selected' : '' }}>Complete</option>
                            </select>
                        </div>
                    </div>

                    <div class="sm:col-span-full mt-4">
                        <button type="submit"
                            class="rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-black shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                            <i class="fa-solid fa-download mr-2" style="color: #000000;"></i> Update order
                        </button>
                        <a href="{{ URL::to('/admin/order') }}" type="submit"
                            class="rounded-md bg-blue-500 px-3 py-2 text-sm font-semibold text-black shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-600">
                            <i class="fa-solid fa-arrow-right-from-bracket fa-rotate-180 mr-2"
                                style="color: #050505;"></i>Back
                        </a>
                    </div>
                </div>
            </form>
    </main>
@stop
