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
                            <th class="px-4 py-3 text-gray-700 text-base">User id</th>
                            <th class="px-4 py-3 text-gray-700 text-base">Voucher id</th>
                            <th class="px-4 py-3 text-gray-700 text-base">Payment cost</th>
                            <th class="px-4 py-3 text-gray-700 text-base">Shipping cost</th>
                            <th class="px-4 py-3 text-gray-700 text-base">Status</th>
                            <th class="px-4 py-3 text-gray-700 text-base">Receiver</th>
                            <th class="px-4 py-3 text-gray-700 text-base">Phone</th>
                            <th class="px-4 py-3 text-gray-700 text-base">Address</th>
                            <th class="px-4 py-3 text-gray-700 text-base">Note</th>
                            <th class="px-4 py-3 text-gray-700 text-base">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                        @foreach ($all_orders as $key => $order)
                            <tr class="text-gray-700">
                                <td class="px-4 py-3 text-sm font-medium text-gray-500">{{$order->order_id}}</td>
                                <td class="px-4 py-3 text-sm font-medium text-gray-500">{{$order->user_id}}</td>
                                <td class="px-4 py-3 text-sm font-medium text-gray-500">{{ $order->voucher_id ? $order->voucher_id : 'None' }}</td>
                                <td class="px-4 py-3 text-sm font-medium text-gray-500">{{$order->payment_cost}}</td>
                                <td class="px-4 py-3 text-sm font-medium text-gray-500">{{$order->shipping_cost}}</td>
                                @if($order->status == 'Pending')
                                    <td class="px-4 py-3 text-sm font-medium text-yellow-500 flex">
                                        <span class="mr-2">{{$order->status}}</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="20" height="20" fill="currentColor">
                                            <path d="M32 0C14.3 0 0 14.3 0 32S14.3 64 32 64l0 11c0 42.4 16.9 83.1 46.9 113.1L146.7 256 78.9 323.9C48.9 353.9 32 394.6 32 437l0 11c-17.7 0-32 14.3-32 32s14.3 32 32 32l32 0 256 0 32 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l0-11c0-42.4-16.9-83.1-46.9-113.1L237.3 256l67.9-67.9c30-30 46.9-70.7 46.9-113.1l0-11c17.7 0 32-14.3 32-32s-14.3-32-32-32L320 0 64 0 32 0zM96 75l0-11 192 0 0 11c0 19-5.6 37.4-16 53L112 128c-10.3-15.6-16-34-16-53zm16 309c3.5-5.3 7.6-10.3 12.1-14.9L192 301.3l67.9 67.9c4.6 4.6 8.6 9.6 12.1 14.9L112 384z"/>
                                        </svg>
                                    </td>
                                @elseif($order->status == 'Shipping')
                                    <td class="px-4 py-3 text-sm font-medium text-blue-500 flex">
                                        <span class="mr-2">{{$order->status}}</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" width="20" height="20" fill="currentColor">
                                            <path d="M112 0C85.5 0 64 21.5 64 48l0 48L16 96c-8.8 0-16 7.2-16 16s7.2 16 16 16l48 0 208 0c8.8 0 16 7.2 16 16s-7.2 16-16 16L64 160l-16 0c-8.8 0-16 7.2-16 16s7.2 16 16 16l16 0 176 0c8.8 0 16 7.2 16 16s-7.2 16-16 16L64 224l-48 0c-8.8 0-16 7.2-16 16s7.2 16 16 16l48 0 144 0c8.8 0 16 7.2 16 16s-7.2 16-16 16L64 288l0 128c0 53 43 96 96 96s96-43 96-96l128 0c0 53 43 96 96 96s96-43 96-96l32 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l0-64 0-32 0-18.7c0-17-6.7-33.3-18.7-45.3L512 114.7c-12-12-28.3-18.7-45.3-18.7L416 96l0-48c0-26.5-21.5-48-48-48L112 0zM544 237.3l0 18.7-128 0 0-96 50.7 0L544 237.3zM160 368a48 48 0 1 1 0 96 48 48 0 1 1 0-96zm272 48a48 48 0 1 1 96 0 48 48 0 1 1 -96 0z"/>
                                        </svg>
                                    </td>
                                @else
                                    <td class="px-4 py-3 text-sm font-medium text-green-500 flex">
                                        <span class="mr-2">{{$order->status}}</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="20" height="20" fill="currentColor">
                                            <path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/>
                                        </svg>
                                    </td>
                                @endif

                                <td class="px-4 py-3 text-sm font-medium text-gray-500">{{$order->receiverName}}</td>
                                <td class="px-4 py-3 text-sm font-medium text-gray-500">{{$order->receiverPhone}}</td>
                                <td class="px-4 py-3 text-sm font-medium text-gray-500">{{$order->receiverAddress}}</td>
                                <td class="px-4 py-3 text-sm font-medium text-gray-500">{{$order->receiverNote}}</td>
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
