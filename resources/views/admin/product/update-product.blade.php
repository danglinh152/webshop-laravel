@extends('admin.layout.admin-layout')
@section('update-product')
<main class="h-full overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        <form>
            <div class="flex justify-between items-center">
                <h2 class="my-3 mt-6 text-2xl font-semibold text-gray-700">Update product</h2>
            </div>
            <div class="grid grid-cols-1 gap-x-6 sm:grid-cols-6 w-3/5 mx-auto">
                <div class="sm:col-span-3">
                    <label class="block text-base font-medium leading-6 text-gray-500">Name</label>
                    <div class="mt-2">
                        <input type="text" name=""
                            class="font-medium mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                    </div>
                </div>
                <div class="sm:col-span-3">
                    <label class="block text-base font-medium leading-6 text-gray-500">Price</label>
                    <div class="mt-2">
                        <input type="number" name=""
                            class="font-medium mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                    </div>
                </div>

                <div class="sm:col-span-6 mt-4">
                    <label class="block text-base font-medium leading-6 text-gray-500">Detail
                        description</label>
                    <div class="mt-2">
                        <textarea name=""
                            class="font-medium mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                                    </textarea>
                    </div>
                </div>
                <div class="sm:col-span-3 mt-4">
                    <label class="block text-base font-medium leading-6 text-gray-500">Sort
                        description</label>
                    <div class="mt-2">
                        <input type="text" name=""
                            class="font-medium mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                    </div>
                </div>
                <div class="sm:col-span-3 mt-4">
                    <label class="block text-base font-medium leading-6 text-gray-500">Quantity</label>
                    <div class="mt-2">
                        <input type="number" name=""
                            class="font-medium mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                    </div>
                </div>

                <div class="sm:col-span-3 mt-4">
                    <label class="block text-base font-medium leading-6 text-gray-500">Factory</label>
                    <div class="mt-2">
                        <select id="country" name="country"
                            class="font-medium mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                            <option>Lenovo</option>
                            <option>Acer</option>
                            <option>Asus</option>
                        </select>
                    </div>
                </div>
                <div class="sm:col-span-3 mt-4">
                    <label class="block text-base font-medium leading-6 text-gray-500">Target</label>
                    <div class="mt-2">
                        <select id="country" name="country"
                            class="font-medium mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                            <option>Gaming</option>
                            <option>Văn phòng</option>
                            <option>Đồ họa</option>
                        </select>
                    </div>
                </div>
                <div class="sm:col-span-full mt-4">
                    <label class="block text-sm font-medium leading-6 text-gray-900">Image</label>
                    <div class="mt-1 flex justify-center rounded-lg border border-dashed border-gray-900/25 py-1">
                        <div class="text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd"></path>
                            </svg>
                            <div class="flex text-sm leading-6 text-gray-600">
                                <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-blue-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-blue-800 focus-within:ring-offset-2 hover:text-blue-800">
                                    <span>Upload an image</span>
                                    <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                </label>
                                <p class="pl-1">up to 50mb</p>
                            </div>
                            <p class="text-xs leading-5 text-gray-600">PNG, JPG, JPEG</p>
                        </div>
                    </div>
                </div>
                <div class="sm:col-span-full mt-4">
                    <button type="submit" class="rounded-md bg-yellow-300 px-3 py-2 text-sm font-semibold text-black shadow-sm hover:bg-yellow-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-600">
                        <i class="fa-solid fa-pen-to-square mr-2" style="color: #000000;"></i>Update product</button>
                    <a href="{{URL::to('/admin/product')}}" type="submit" class="rounded-md bg-blue-500 px-3 py-2 text-sm font-semibold text-black shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-600">
                        <i class="fa-solid fa-arrow-right-from-bracket fa-rotate-180 mr-2" style="color: #050505;"></i>Back
                    </a>
                </div>
            </div>
        </form>
</main>
@stop