@extends('admin.layout.admin-layout')
@section('update-voucher')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            @foreach ($get_vou as $key => $vou)
                <form action="{{ URL::to('/admin/voucher/update-voucher/' . $vou->voucher_id) }}" method="post"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="flex justify-between items-center">
                        <h2 class="my-3 mt-6 text-2xl font-semibold text-gray-700">Update voucher</h2>
                    </div>
                    <div class="grid grid-cols-1 gap-x-6 sm:grid-cols-6 w-3/5 mx-auto">
                        <div class="sm:col-span-3">
                            <label class="block text-base font-medium leading-6 text-gray-500">Voucher name</label>
                            <div class="mt-2">
                                <input type="text" name="voucher_name" value="{{ $vou->voucher_name }}"
                                    class="font-medium mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                            </div>
                        </div>
                        <div class="sm:col-span-3">
                            <label class="block text-base font-medium leading-6 text-gray-500">Discount value</label>
                            <div class="mt-2">
                                <input type="number" step="0.01" name="discount_value"
                                    value="{{ $vou->discount_value }}"
                                    class="font-medium mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                            </div>
                        </div>
                        <div class="sm:col-span-3 mt-4">
                            <label class="block text-base font-medium leading-6 text-gray-500">Quantity</label>
                            <div class="mt-2">
                                <input type="text" name="quantity"value ="{{$vou->quantity}}"
                                    class="font-medium mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                            </div>
                        </div>
                        <div class="sm:col-span-3 mt-4">
                            <label class="block text-base font-medium leading-6 text-gray-500">Ranking</label>
                            <div class="mt-2">
                                <select id="countries" name = "rank"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                    
                                    <option value="Copper" {{ $vou->rank == 0 ? 'selected' : '' }}>Copper</option>
                                    <option value="Silver" {{ $vou->rank == 1 ? 'selected' : '' }}>Silver</option>
                                    <option value="Gold" {{ $vou->rank == 2 ? 'selected' : '' }}>Gold</option>
                                    <option value="Diamond" {{ $vou->rank == 3 ? 'selected' : '' }}>Diamond</option>

                                </select>
                            </div>
                        </div>

                        <div class="sm:col-span-6 mt-4">
                            <label class="block text-base font-medium leading-6 text-gray-500">Voucher
                                description</label>
                            <div class="mt-2">
                                <input name="voucher_desc" type="text" value="{{ $vou->voucher_desc }}"
                                    class="font-medium mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                            </div>
                        </div>
                        <div class="sm:col-span-3 mt-4">
                            <label class="block text-base font-medium leading-6 text-gray-500">Start date
                            </label>
                            <div class="mt-2">
                                <input type="date" value="{{ $vou->start_date }}" name="start_date"
                                    class="font-medium mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                            </div>
                        </div>
                        <div class="sm:col-span-3 mt-4">
                            <label class="block text-base font-medium leading-6 text-gray-500">End date</label>
                            <div class="mt-2">
                                <input type="date" value="{{ $vou->end_date }}" name="end_date"
                                    class="font-medium mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                            </div>
                        </div>


                        <div class="sm:col-span-full mt-4">
                            <button type="submit"
                                class="rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-black shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                                <i class="fa-solid fa-download mr-2" style="color: #000000;"></i> Update voucher
                            </button>
                            <a href="{{ URL::to('/admin/voucher') }}" type="submit"
                                class="rounded-md bg-blue-500 px-3 py-2 text-sm font-semibold text-black shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-600">
                                <i class="fa-solid fa-arrow-right-from-bracket fa-rotate-180 mr-2"
                                    style="color: #050505;"></i>Back
                            </a>
                        </div>
                    </div>
                </form>
            @endforeach
    </main>
@stop
