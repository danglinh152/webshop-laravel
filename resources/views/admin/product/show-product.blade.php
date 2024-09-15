@extends('admin.layout.admin-layout')
@section('show-product')
<main class="h-full overflow-y-auto">
    <div class="container px-6 mx-auto grid">

        <div class="flex justify-between items-center">
            <h2 class="my-6 text-2xl font-semibold text-gray-700">Product</h2>
            <a href="{{URL::to('admin/product/create')}}"
                class="px-4 py-3 text-base bg-blue-600 text-white font-medium leading-5 rounded-lg transition-colors border border-transparent active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-purple">
                Create new product
            </a>
        </div>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b">
                            <th class="px-4 py-3 text-gray-700 text-base">Id</th>
                            <th class="px-4 py-3 text-gray-700 text-base">Name</th>
                            <th class="px-4 py-3 text-gray-700 text-base">Price</th>
                            <th class="px-4 py-3 text-gray-700 text-base">Factory</th>
                            <th class="px-4 py-3 text-gray-700 text-base">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                        <tr class="text-gray-700">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm font-medium text-gray-500">
                                    1
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm font-medium text-gray-500">Laptop Lenovo V14</td>
                            <td class="px-4 py-3 text-sm font-medium text-gray-500">
                                14,000,000 đ
                            </td>
                            <td class="px-4 py-3 text-sm font-medium text-gray-500">Lenovo</td>
                            <td class="px-4 py-3 text-sm flex">
                                <a href="{{URL::to('admin/product/details')}}"
                                    class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-purple">
                                    <i class="fa-regular fa-eye mr-2" style="color: #fff;"></i>View
                                </a>
                                <a href="{{URL::to('admin/product/update')}}"
                                    class="mx-2 px-4 py-2 text-sm font-medium leading-5 transition-colors duration-150 bg-yellow-300 border border-transparent rounded-lg active:bg-yellow-400 hover:bg-yellow-400 focus:outline-none focus:shadow-outline-purple">
                                    <i class="fa-solid fa-pen-to-square mr-2" style="color: #000000;"></i>Update
                                </a>
                                <a href="#" onclick="return confirm('Are you sure you want to delete this product?');"
                                    class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-purple">
                                    <i class="fa-solid fa-trash-can mr-2" style="color: #fff;"></i>Delete
                                </a>
                            </td>
                        </tr>

                        <tr class="text-gray-700">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm font-medium text-gray-500">
                                    2
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm font-medium text-gray-500">Laptop Lenovo V14</td>
                            <td class="px-4 py-3 text-sm font-medium text-gray-500">
                                14,000,000 đ
                            </td>
                            <td class="px-4 py-3 text-sm font-medium text-gray-500">Lenovo</td>
                            <td class="px-4 py-3 text-sm flex">
                                <a href="{{URL::to('admin/product/details')}}" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-purple">
                                    <i class="fa-regular fa-eye mr-2" style="color: #fff;"></i>View
                                </a>
                                <a href="{{URL::to('admin/product/update')}}"
                                    class="mx-2 px-4 py-2 text-sm font-medium leading-5 transition-colors duration-150 bg-yellow-300 border border-transparent rounded-lg active:bg-yellow-400 hover:bg-yellow-400 focus:outline-none focus:shadow-outline-purple">
                                    <i class="fa-solid fa-pen-to-square mr-2" style="color: #000000;"></i>Update
                                </a>
                                <a href="#" onclick="return confirm('Are you sure you want to delete this product?');"
                                    class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-purple">
                                    <i class="fa-solid fa-trash-can mr-2" style="color: #fff;"></i>Delete
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div
                class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t">
                <span class="flex items-center col-span-3">
                    Showing 21-30 of 100
                </span>
                <span class="col-span-2"></span>
            </div>
        </div>
    </div>
</main>
@stop