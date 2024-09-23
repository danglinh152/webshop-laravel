@extends('admin.layout.admin-layout')
@section('show-voucher')
<main class="h-full overflow-y-auto">
    <div class="container px-6 mx-auto grid">

        <div class="flex justify-between items-center">
            <h2 class="my-6 text-2xl font-semibold text-gray-700">Voucher</h2>
            <a href="{{URL::to('admin/voucher/create')}}"
                class="px-4 py-3 text-base bg-blue-600 text-white font-medium leading-5 rounded-lg transition-colors border border-transparent active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-purple">
                Create new voucher
            </a>
        </div>
    </div>
    <div class="container px-6 mt-4">
        <div class="grid grid-cols-3 gap-6 h-32">
            <div class="rounded-xl shadow-lg w-full flex border ">
                <img class="w-36 h-36 object-cover rounded-l-xl border-r" src="{{asset('public/frontend/client/img/voucher3.png')}}" alt="">
                <div class="pl-3 pt-1 w-full rounded-r-xl">
                    <h2 class="text-dark font-medium text-base text-blue-800">Giảm 50% đơn tối thiểu 0đ</h2>
                    <p class="mt-4 text-gray-800 font-medium text-xs">Giá trị: 50% tổng giá trị đơn hàng </p>
                    <p class="mt-1 text-gray-800 font-medium text-xs">Thời hạn: 18/09/2024 - 18/10/2024 </p>

                    <div class="flex mt-5 justify-end gap-1 mr-2 ">
                        <a href="{{URL::to('admin/voucher/update')}}"
                            class="px-3 py-2 text-sm font-medium leading-5 transition-colors duration-150 bg-yellow-300 border border-transparent rounded-lg active:bg-yellow-400 hover:bg-yellow-400 focus:outline-none focus:shadow-outline-purple">
                            <i class="fa-solid fa-pen-to-square" style="color: #000000;"></i>
                        </a>
                        <a href="#" onclick="return confirm('Are you sure you want to delete this voucher?');"
                            class="px-3 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-purple">
                            <i class="fa-solid fa-trash-can" style="color: #000;"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="rounded-xl shadow-lg w-full flex border">
                <img class="w-36 h-36 object-cover rounded-xl border" src="{{asset('public/frontend/client/img/voucher3.png')}}" alt="">
                <div class="pl-3 pt-1 w-full">
                    <h2 class="text-dark font-medium text-base text-blue-800">Giảm 50% đơn tối thiểu 0đ</h2>
                    <p class="mt-4 text-gray-800 font-medium text-xs">Giá trị: 50% tổng giá trị đơn hàng </p>
                    <p class="mt-1 text-gray-800 font-medium text-xs">Thời hạn: 18/09/2024 - 18/10/2024 </p>

                    <div class="flex mt-5 justify-end gap-1 mr-2">
                        <a href="{{URL::to('admin/product/update')}}"
                            class="px-3 py-2 text-sm font-medium leading-5 transition-colors duration-150 bg-yellow-300 border border-transparent rounded-lg active:bg-yellow-400 hover:bg-yellow-400 focus:outline-none focus:shadow-outline-purple">
                            <i class="fa-solid fa-pen-to-square" style="color: #000000;"></i>
                        </a>
                        <a href="#" onclick="return confirm('Are you sure you want to delete this product?');"
                            class="px-3 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-500 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-purple">
                            <i class="fa-solid fa-trash-can" style="color: #000;"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="rounded-xl shadow-lg w-full flex border">
                <img class="w-36 h-36 object-cover rounded-xl border" src="{{asset('public/frontend/client/img/voucher3.png')}}" alt="">
                <div class="pl-3 pt-1 w-full">
                    <h2 class="text-dark font-medium text-base text-blue-800">Giảm 50% đơn tối thiểu 0đ</h2>
                    <p class="mt-4 text-gray-800 font-medium text-xs">Giá trị: 50% tổng giá trị đơn hàng </p>
                    <p class="mt-1 text-gray-800 font-medium text-xs">Thời hạn: 18/09/2024 - 18/10/2024 </p>

                    <div class="flex mt-5 justify-end gap-1 mr-2">
                        <a href="{{URL::to('admin/product/update')}}"
                            class="px-3 py-2 text-sm font-medium leading-5 transition-colors duration-150 bg-yellow-300 border border-transparent rounded-lg active:bg-yellow-400 hover:bg-yellow-400 focus:outline-none focus:shadow-outline-purple">
                            <i class="fa-solid fa-pen-to-square" style="color: #000000;"></i>
                        </a>
                        <a href="#" onclick="return confirm('Are you sure you want to delete this product?');"
                            class="px-3 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-500 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-purple">
                            <i class="fa-solid fa-trash-can" style="color: #000;"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="rounded-xl shadow-lg w-full flex border">
                <img class="w-36 h-36 object-cover rounded-xl border" src="{{asset('public/frontend/client/img/voucher3.png')}}" alt="">
                <div class="pl-3 pt-1 w-full">
                    <h2 class="text-dark font-medium text-base text-blue-800">Giảm 50% đơn tối thiểu 0đ</h2>
                    <p class="mt-4 text-gray-800 font-medium text-xs">Giá trị: 50% tổng giá trị đơn hàng </p>
                    <p class="mt-1 text-gray-800 font-medium text-xs">Thời hạn: 18/09/2024 - 18/10/2024 </p>

                    <div class="flex mt-5 justify-end gap-1 mr-2">
                        <a href="{{URL::to('admin/product/update')}}"
                            class="px-3 py-2 text-sm font-medium leading-5 transition-colors duration-150 bg-yellow-300 border border-transparent rounded-lg active:bg-yellow-400 hover:bg-yellow-400 focus:outline-none focus:shadow-outline-purple">
                            <i class="fa-solid fa-pen-to-square" style="color: #000000;"></i>
                        </a>
                        <a href="#" onclick="return confirm('Are you sure you want to delete this product?');"
                            class="px-3 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-500 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-purple">
                            <i class="fa-solid fa-trash-can" style="color: #000;"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="rounded-xl shadow-lg w-full flex border">
                <img class="w-36 h-36 object-cover rounded-xl border" src="{{asset('public/frontend/client/img/voucher3.png')}}" alt="">
                <div class="pl-3 pt-1 w-full">
                    <h2 class="text-dark font-medium text-base text-blue-800">Giảm 50% đơn tối thiểu 0đ</h2>
                    <p class="mt-4 text-gray-800 font-medium text-xs">Giá trị: 50% tổng giá trị đơn hàng </p>
                    <p class="mt-1 text-gray-800 font-medium text-xs">Thời hạn: 18/09/2024 - 18/10/2024 </p>

                    <div class="flex mt-5 justify-end gap-1 mr-2">
                        <a href="{{URL::to('admin/product/update')}}"
                            class="px-3 py-2 text-sm font-medium leading-5 transition-colors duration-150 bg-yellow-300 border border-transparent rounded-lg active:bg-yellow-400 hover:bg-yellow-400 focus:outline-none focus:shadow-outline-purple">
                            <i class="fa-solid fa-pen-to-square" style="color: #000000;"></i>
                        </a>
                        <a href="#" onclick="return confirm('Are you sure you want to delete this product?');"
                            class="px-3 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-500 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-purple">
                            <i class="fa-solid fa-trash-can" style="color: #000;"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
@stop