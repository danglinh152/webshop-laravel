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
        <?php
        $message = Session::get('message');
        if ($message) {
            echo '<div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                <span class="font-medium">' . $message . '</span>';

            Session::put('message', null);
        }
        ?>
    </div>

    <div class="container px-6 mt-4">
        <div class="grid grid-cols-3 gap-6 h-32">       
            @foreach ($all_voucher as $key => $vou)

            <div class="rounded-xl shadow-lg w-full flex border ">
                <img class="w-36 h-36 object-cover rounded-l-xl border-r" src="{{asset('public/frontend/client/img/voucher3.png')}}" alt="">
                <div class="pl-3 pt-1 w-full rounded-r-xl">
                    <h2 class="text-dark font-medium text-base text-blue-800">{{$vou->voucher_name}}</h2>
                    <p class="mt-4 text-gray-800 font-medium text-xs">Giá trị: {{$vou->discount_value * 100}}% tổng giá trị đơn hàng </p>
                    <p class="mt-1 text-gray-800 font-medium text-xs">Mô tả voucher: {{$vou->voucher_desc}}</p>
                    <p class="mt-1 text-gray-800 font-medium text-xs">Thời hạn: {{$vou->start_date}} tới {{$vou->end_date}} </p>

                    <div class="flex mt-5 justify-end gap-1 mr-2 ">
                        <a href="{{URL::to('admin/voucher/edit-voucher/'.$vou->voucher_id)}}"
                            class="px-3 py-2 text-sm font-medium leading-5 transition-colors duration-150 bg-yellow-300 border border-transparent rounded-lg active:bg-yellow-400 hover:bg-yellow-400 focus:outline-none focus:shadow-outline-purple">
                            <i class="fa-solid fa-pen-to-square" style="color: #000000;"></i>
                        </a>
                        <a href="{{URL::to('admin/voucher/delete-voucher/'.$vou->voucher_id)}}" onclick="return confirm('Are you sure you want to delete this voucher?');"
                            class="px-3 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-purple">
                            <i class="fa-solid fa-trash-can" style="color: #000;"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>

</main>
@stop