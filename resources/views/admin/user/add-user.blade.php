@extends('admin.layout.admin-layout')
@section('add-user')
<main class="h-full overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        <form action="{{URL::to('/admin/user/save-user')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="flex justify-between items-center">
                <h2 class="my-3 mt-6 text-2xl font-semibold text-gray-700">Create new user</h2>
            </div>
            <div class="grid grid-cols-1 gap-x-6 sm:grid-cols-6 w-3/5 mx-auto">

                <div class="sm:col-span-3">


                    <label class="block text-base font-medium leading-6 text-gray-500">Avatar</label>
                    <div class="py-10 flex justify-center rounded-lg border border-dashed border-gray-900/25 py-1">
                        <div class="text-center">
                            <div class="flex text-sm leading-6 text-gray-600">
                                <label for="fileUpload" class="relative cursor-pointer rounded-md bg-white font-semibold text-blue-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-blue-800 focus-within:ring-offset-2 hover:text-blue-800">
                                    <span>Upload an image</span>
                                    <input id="fileUpload" name="fileUpload" type="file" class="sr-only">
                                </label>
                                <p class="pl-1">up to 50mb</p>
                            </div>
                            <p class="text-xs leading-5 text-gray-600">PNG, JPG, JPEG</p>
                        </div>
                    </div>
                </div>
                <div class="ml-20 mt-2 sm:col-span-3">
                    <img style="" class="h-36 w-36 rounded-full object-cover " src="{{asset('public/images/avt.jpg')}}"
                        alt="" id="imgPreview">
                </div>
                <div class="sm:col-span-3">
                    <label class="block text-base font-medium leading-6 text-gray-500">First name</label>
                    <div class="mt-2">
                        <input type="text" name="f_name"
                            class="font-medium mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                    </div>
                </div>



                <div class="sm:col-span-3">
                    <label class="block text-base font-medium leading-6 text-gray-500">Last name</label>
                    <div class="mt-2">
                        <input type="text" name="l_name"
                            class="font-medium mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                    </div>
                </div>
                <div class="sm:col-span-3 mt-4">
                    <label class="block text-base font-medium leading-6 text-gray-500">Email</label>
                    <div class="mt-2">
                        <input type="email" name="email"
                            class="font-medium mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                    </div>
                </div>
                <div class="sm:col-span-3 mt-4">
                    <label class="block text-base font-medium leading-6 text-gray-500">Password</label>
                    <div class="mt-2">
                        <input type="password" name="password"
                            class="font-medium mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                    </div>
                </div>
                <div class="sm:col-span-3">
                    <label class="block text-base font-medium leading-6 text-gray-500">Phone</label>
                    <div class="mt-2">
                        <input type="text" name="phone"
                            class="font-medium mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                    </div>
                </div>
                <div class="sm:col-span-3">
                    <label class="block text-base font-medium leading-6 text-gray-500">Address</label>
                    <div class="mt-2">
                        <input type="text" name="address"
                            class="font-medium mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                    </div>
                </div>
                <div class="sm:col-span-3 mt-4">
                    <label class="block text-base font-medium leading-6 text-gray-500">Role</label>
                    <div class="mt-2">
                        <select onchange="updateFactoryOptions()" id="category" name="role"
                            class="font-medium mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">

                            <option value="admin">ADMIN</option>
                            <option value="customer">CUSTOMER</option>

                        </select>
                    </div>
                </div>

                <div class="sm:col-span-full mt-4">
                    <button type="submit" class="rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-black shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                        <i class="fa-solid fa-download mr-2" style="color: #000000;"></i> Save user
                    </button>
                    <a href="{{URL::to('/admin/user')}}" type="submit" class="rounded-md bg-blue-500 px-3 py-2 text-sm font-semibold text-black shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-600">
                        <i class="fa-solid fa-arrow-right-from-bracket fa-rotate-180 mr-2" style="color: #050505;"></i>Back
                    </a>
                </div>
            </div>
        </form>
</main>
<script>
    fileUpload.onchange = evt => {
        const [file] = fileUpload.files;
        if (file) {
            imgPreview.src = URL.createObjectURL(file);
            $("#imgPreview").css({
                "display": "block"
            });
        }
    }
</script>
@stop