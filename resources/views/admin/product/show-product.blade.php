@extends('admin.layout.admin-layout')
@section('show-product')
<main class="h-full overflow-y-auto">
    <div class="container px-6 mx-auto grid">

        <div class="flex justify-between items-center">
            <h2 class="my-6 text-2xl font-semibold text-gray-700">Product</h2>
            <a href="{{ URL::to('admin/product/create') }}"
                class="px-4 py-3 text-base bg-blue-600 text-white font-medium leading-5 rounded-lg transition-colors border border-transparent active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-purple">
                Create new product
            </a>
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
                        <th class="px-4 py-3 text-gray-700 text-base">Hình ảnh</th>
                        <th class="px-4 py-3 text-gray-700 text-base">Name</th>
                        <th class="px-4 py-3 text-gray-700 text-base">Price</th>
                        <th class="px-4 py-3 text-gray-700 text-base">Factory</th>
                        <th class="px-4 py-3 text-gray-700 text-base">Status</th>
                        <th class="px-4 py-3 text-gray-700 text-base">Action</th>
                    </tr>
                </thead>
                @foreach ($all_product as $key => $pro)
                <tbody class="bg-white divide-y">
                    <tr class="text-gray-700">
                        <td class="px-4 py-3">
                            <div class="flex items-center text-sm font-medium text-gray-500">
                                {{ $pro->product_id }}
                            </div>
                        </td>
                        <td class="px-4 py-3 text-sm font-medium text-gray-500"><img
                                src="{{ asset('public/backend/products-images/' . $pro->product_image) }}"
                                width="60px" height="60px" alt=""></td>
                        <td class="px-4 py-3 text-sm font-medium text-gray-500">{{ $pro->product_name }}</td>
                        <td class="px-4 py-3 text-sm font-medium text-gray-500">
                            {{ number_format($pro->product_price, 0, decimal_separator: '', thousands_separator: ',') }}
                            đ
                        </td>
                        <td class="px-4 py-3 text-sm font-medium text-gray-500">{{ $pro->product_fact }}</td>
                        <td class="px-4 py-3 text-sm font-medium text-gray-500">
                            <?php
                            if ($pro->status == 'hide') {
                            ?>
                                <a href="{{ URL::to('/admin/product/active-product/' . $pro->product_id) }}"> <span
                                        style="color: red ; font-size: 28px" class="fa fa-thumbs-down"></span>
                                <?php
                            } else { ?>
                                    <a href="{{ URL::to('/admin/product/unactive-product/' . $pro->product_id) }}"> <span
                                            style="color: green; font-size: 28px" class="fa fa-thumbs-up"></span>
                                    <?php
                                } ?>
                                    </span>
                        </td>
                        <td class="px-4 py-3 text-sm flex">
                            <a href="{{ URL::to('admin/product/view-details/' . $pro->product_id) }}"
                                class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-purple">
                                <i class="fa-regular fa-eye mr-2" style="color: #fff;"></i>View
                            </a>
                            <a href="{{ URL::to('admin/product/edit-product/' . $pro->product_id) }}"
                                class="mx-2 px-4 py-2 text-sm font-medium leading-5 transition-colors duration-150 bg-yellow-300 border border-transparent rounded-lg active:bg-yellow-400 hover:bg-yellow-400 focus:outline-none focus:shadow-outline-purple">
                                <i class="fa-solid fa-pen-to-square mr-2" style="color: #000000;"></i>Update
                            </a>
                            <a href="{{ URL::to('admin/product/delete-product/' . $pro->product_id) }}"
                                onclick="return confirm('Are you sure to delete this product?')"
                                class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-purple">
                                <i class="fa-solid fa-trash-can mr-2" style="color: #fff;"></i>Delete
                            </a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
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