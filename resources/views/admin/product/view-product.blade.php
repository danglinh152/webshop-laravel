@extends('admin.layout.admin-layout')
@section('view-product')
<main class="h-full overflow-y-auto">
    <div class="container px-6 mx-auto">
        <h2 class="my-6 ml-6 text-2xl font-semibold text-gray-900">Product detail - 01</h2>
        <div class="grid grid-cols-8 mx-auto ml-6 mr-12 border rounded-lg">
            <div class="col-span-3">
                <img class="w-full h-full object-cover rounded-l-lg bg-blue-400 shadow-lg shadow-blue-200/50"
                    src="{{asset('public/backend/products-images/lenovo-loq.jpg')}}" alt="">
            </div>
            <div class="col-span-5 border border-y-blue-400 border-r-blue-400 rounded-r">
                <h2
                    class="px-4 py-2 text-xl font-bold text-white-900 border border-b-blue-400 rounded-tr">
                    Name: Laptop Lenovo LOQ</h2>
                <div class="px-4 flex justify-between mt-5">
                    <p class="text-base font-medium text-gray-800">Factory: Lenovo</p>
                    <p class="text-base font-medium text-gray-800 mr-24">Target: Graphic</p>
                </div>

                <p class="mt-3 px-4 text-base font-medium text-gray-800">Short detail: Intel Core
                    i5-12450HX | 16GB | 512GB | 15.6 inch | Win 11 | Xám</p>
                <p class="mt-3 px-4 text-base font-medium text-gray-800">Description:</p>
                <p class="mt-1 px-4 text-base font-nomal text-gray-600">Trong thế giới laptop gaming đầy
                    cạnh tranh hiện nay, việc tìm kiếm một chiếc máy vừa đáp ứng nhu cầu hiệu suất cao vừa
                    thể hiện phong cách cá nhân có thể là một thách thức. Tuy nhiên, Lenovo LOQ 15IAX9
                    83FQ0005VN dường như đã giải quyết
                    được vấn đề này với cấu hình mạnh mẽ và thiết kế đột phá, đem đến một lựa chọn hấp dẫn
                    cho game thủ và những người yêu
                    thích công nghệ.</p>
                <div class="px-4 flex justify-between mt-4">
                    <p class="text-base font-medium text-gray-800">Price:
                        19,000,000 VND
                    </p>
                    <p class="text-base font-medium text-gray-800 mr-24">Quantity: 10</p>
                </div>
                <div class="px-4 flex justify-end mt-7">
                    <a href="{{URL::to('/admin/product/update')}}" type="submit" class="rounded-md bg-yellow-300 px-3 py-2 text-sm font-semibold text-black shadow-sm hover:bg-yellow-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-600">
                        <i class="fa-solid fa-pen-to-square mr-2" style="color: #000000;"></i>Update product</a>
                    <a href="{{URL::to('/admin/product')}}" type="submit" class="ml-2 rounded-md bg-blue-500 px-3 py-2 text-sm font-semibold text-black shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-600">
                        <i class="fa-solid fa-arrow-right-from-bracket fa-rotate-180 mr-2" style="color: #050505;"></i>Back
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>
@stop