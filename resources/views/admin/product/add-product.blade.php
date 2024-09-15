@extends('admin.layout.admin-layout')
@section('add-product')
<main class="h-full overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        <form>
            <div class="flex justify-between items-center">
                <h2 class="my-6 text-2xl font-semibold text-gray-700"> Create a new product</h2>
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
                <div class="sm:col-span-3 mt-4">
                    <label class="block text-base font-medium leading-6 text-gray-500">Image</label>
                    <div class="mt-2">
                        <input type="file" name=""
                            class="font-medium mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                    </div>
                </div>
                <div class="sm:col-span-4 mt-4">
                    <button
                        class="px-3 py-2 text-base bg-blue-600 text-white font-medium leading-5 rounded-lg transition-colors border border-transparent active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-purple">
                        Add product
                    </button>
                </div>
            </div>
        </form>
</main>
@stop