@extends('admin.layout.admin-layout')
@section('show-order')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <div class="flex justify-between items-center">
                <h2 class="my-6 text-2xl font-semibold text-gray-700">Order</h2>
            </div>
            <?php
            $message = Session::get('message');
            if ($message) {
                echo '<div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                                                                                                                <span class="font-medium">' .
                    $message .
                    '</span>';

                Session::put('message', null);
            }
            ?>
        </div>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b">
                            <th class="px-4 py-3 text-gray-700 text-base">Id</th>
                            <th class="px-4 py-3 text-gray-700 text-base">Payment cost</th>
                            <th class="px-4 py-3 text-gray-700 text-base">Shipping cost</th>
                            <th class="px-4 py-3 text-gray-700 text-base">Status</th>
                            <th class="px-4 py-3 text-gray-700 text-base">Receiver</th>
                            <th class="px-4 py-3 text-gray-700 text-base">Address</th>
                            <th class="px-4 py-3 text-gray-700 text-base">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                        @foreach ($all_orders as $key => $order)
                            <tr class="text-gray-700">
                                <td class="px-4 py-3 text-sm font-medium text-gray-500">{{$order->order_id}}</td>
                                <td class="px-4 py-3 text-sm font-medium text-gray-500">{{$order->order_total}}</td>
                                <td class="px-4 py-3 text-sm font-medium text-gray-500">35.000 VNĐ</td>
                                <td class="px-4 py-3 text-sm font-medium text-gray-500">Shipping</td>
                                <td class="px-4 py-3 text-sm font-medium text-gray-500">{{$order->receiverName}}</td>
                                <td class="px-4 py-3 text-sm font-medium text-gray-500">{{$order->receiverAddress}}</td>
                                <td class="px-4 py-3 text-sm flex">
                                    <a href="{{ URL::to('admin/order/update/'.$order->order_id) }}"
                                        class="px-4 py-2 text-sm font-medium leading-5 transition-colors duration-150 bg-yellow-300 border border-transparent rounded-lg active:bg-yellow-400 hover:bg-yellow-400 focus:outline-none focus:shadow-outline-purple">
                                        <i class="fa-solid fa-pen-to-square mr-2" style="color: #000000;"></i>Update
                                    </a>
                                    <a href="{{ URL::to('admin/order/delete/'.$order->order_id)}}"
                                        onclick="return confirm('Are you sure to delete this order?')"
                                        class="mx-2 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-purple">
                                        <i class="fa-solid fa-trash-can mr-2" style="color: #fff;"></i>Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t">
                <span class="flex items-center col-span-3">
                    Showing 21-30 of 100
                </span>
                <span class="col-span-2"></span>
            </div>
        </div>
        </div>
    </main>
@stop
