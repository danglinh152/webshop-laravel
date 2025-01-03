@extends('admin.layout.admin-layout')
@section('update-product')
<main class="h-full overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        @foreach ($get_product as $key => $edit_pro)
        <form action="{{URL::to('/admin/product/update-product/'.$edit_pro->product_id)}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="flex justify-between items-center">
                <h2 class="my-3 mt-6 text-2xl font-semibold text-gray-700"> Update product</h2>
            </div>


            <div class="grid grid-cols-1 gap-x-6 sm:grid-cols-6 w-3/5 mx-auto">
                <div class="sm:col-span-3">
                    <label class="block text-base font-medium leading-6 text-gray-500">Name</label>
                    <div class="mt-2">
                        <input type="text" value="{{$edit_pro->product_name}}" name="product_name"
                            class="font-medium mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                    </div>
                </div>
                <div class="sm:col-span-3">
                    <label class="block text-base font-medium leading-6 text-gray-500">Price</label>
                    <div class="mt-2">
                        <input type="number" value="{{$edit_pro->product_price}}" name="product_price"
                            class="font-medium mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                    </div>
                </div>

                <div class="sm:col-span-6 mt-4">
                    <label class="block text-base font-medium leading-6 text-gray-500">Detail
                        description</label>
                    <div class="mt-2">
                        <textarea name="product_long_desc"
                            class="font-medium mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">{{$edit_pro->product_long_desc}}</textarea>
                    </div>
                </div>
                <div class="sm:col-span-3 mt-4">
                    <label class="block text-base font-medium leading-6 text-gray-500">Short
                        description</label>
                    <div class="mt-2">
                        <input type="text" name="product_short_desc" value="{{$edit_pro->product_short_desc}}"
                            class="font-medium mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                    </div>
                </div>
                 <div class="sm:col-span-3 mt-4">
                        <label class="block text-base font-medium leading-6 text-gray-500">Quantity</label>
                        <div class="mt-2">
                            <input type="number" name="product_quantity" value = "{{$edit_pro->product_quantity}}"
                                class="font-medium mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                        </div>
                    </div>
                <div class="sm:col-span-3 mt-4">
                    <label class="block text-base font-medium leading-6 text-gray-500">Category</label>
                    <div class="mt-2">
                        <select onchange="updateFactoryOptions()" id="category" name="product_cate"
                            class="font-medium mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                            <option value="phone" {{$edit_pro->category_id == 3 ? 'selected' : ''}}>Smart Phone</option>
                            <option value="laptop" {{$edit_pro->category_id == 2 ? 'selected' : ''}}>Laptop</option>
                        </select>
                    </div>
                </div>

                <div class="sm:col-span-3 mt-4">
                    <label class="block text-base font-medium leading-6 text-gray-500">Factory</label>
                    <div class="mt-2">
                        <select id="factory" name="product_fact"
                            class="font-medium mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                            <option value="Dell" {{$edit_pro->product_fact =="Dell" ? 'selected' : ''}}>Dell</option>
                            <option value="Acer" {{$edit_pro->product_fact =="Acer" ? 'selected' : ''}}>Acer</option>
                            <option value="Macbook" {{$edit_pro->product_fact =="Macbook" ? 'selected' : ''}}>Macbook</option>
                            <option value="Asus" {{$edit_pro->product_fact =="Asus" ? 'selected' : ''}}>Asus</option>
                            <option value="Lenovo" {{$edit_pro->product_fact =="Lenovo" ? 'selected' : ''}}>Lenovo</option>
                            <option value="Msi" {{$edit_pro->product_fact =="Msi" ? 'selected' : ''}}>Msi</option>
                            <option value="HP" {{$edit_pro->product_fact =="HP" ? 'selected' : ''}}>HP</option>
                            <option value="Gigabyte" {{$edit_pro->product_fact =="Gigabyte" ? 'selected' : ''}}>Gigabyte</option>
                            <option value="LG" {{$edit_pro->product_fact =="LG" ? 'selected' : ''}}>LG</option>
                        </select>
                    </div>
                </div>


                <div id="target" class="sm:col-span-3 mt-4 hidden">
                    <label class="block text-base font-medium leading-6 text-gray-500 d-none">Target</label>
                    <div class="mt-2">
                        <select id="country" name="product_target"
                            class="font-medium mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                            <option value="Gaming" {{$edit_pro->product_target == 'Gaming' ? 'selected' : ''}}>Gaming</option>
                            <option value="Văn phòng" {{$edit_pro->product_target == 'Văn Phòng' ? 'selected' : ''}}>Văn phòng</option>
                            <option value="Đồ họa" {{$edit_pro->product_target == 'Đồ họa' ? 'selected' : ''}}>Đồ họa</option>
                        </select>
                    </div>
                </div>
                <div class="sm:col-span-full mt-4">
                    <label class="block text-sm font-medium leading-6 text-gray-900">Image</label>
                    <div class="mt-1 flex justify-center rounded-lg border border-dashed border-gray-900/25 py-1">
                        <div class="text-center">
                            <img class="mx-auto w-56 h-56" src="{{asset('public/backend/products-images/'.$edit_pro->product_image)}}" alt="">
                            <div class="flex text-sm leading-6 text-gray-600">
                                <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-blue-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-blue-800 focus-within:ring-offset-2 hover:text-blue-800">
                                    <span class="text-center">Upload an image</span>
                                    <input id="file-upload" name="product_image" type="file" class="sr-only">
                                </label>
                                <p class="pl-1">up to 50mb</p>
                            </div>
                            <p class="text-xs leading-5 text-gray-600">PNG, JPG, JPEG</p>
                        </div>
                    </div>
                </div>
                <div class="sm:col-span-full mt-4">
                    <button type="submit" class="rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-black shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                        <i class="fa-solid fa-download mr-2" style="color: #000000;"></i> Update
                    </button>
                    <a href="{{URL::to('/admin/product')}}" type="submit" class="rounded-md bg-blue-500 px-3 py-2 text-sm font-semibold text-black shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-600">
                        <i class="fa-solid fa-arrow-right-from-bracket fa-rotate-180 mr-2" style="color: #050505;"></i>Back
                    </a>
                </div>
            </div>

        </form>
        @endforeach

</main>
<script src="{{asset('public/frontend/admin/js/add-products.js')}}"></script>

@stop