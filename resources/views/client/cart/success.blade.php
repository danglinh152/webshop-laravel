@extends('client.layout.homepage-layout')
@section('success')

<?php
$order_info = Session::get('order_info');
$username = Session::get('user_name');
?>
<div class="container-fluid py-5">
    <div class="container py-5 mt-2 text-center">
        <h5 class="mt-2">ĐẶT HÀNG THÀNH CÔNG</h5>
        <div class="row justify-content-center">
            <img src="{{ asset('public/frontend/client/img/success.png') }}" alt="" class="col-2">
        </div>

        @if($order_info && $order_info->order_id)
        <h6 class="mt-2">Mã đơn hàng: {{ $order_info->order_id }}</h6>
        @endif

        <h6>***************************************************</h6>
        <h6 class="mt-4">Thông tin giao hàng</h6>

        @if($username || ($order_info && ($order_info->receiverName || $order_info->receiverAddress || $order_info->receiverPhone || $order_info->receiverNote)))
        <p>
            @if($username)
            Người đặt mua: {{ $username }} <br>
            @endif

            @if($order_info)
            @if($order_info->receiverName)
            Người nhận hàng: {{ $order_info->receiverName }} <br>
            @endif

            @if($order_info->receiverAddress)
            Địa chỉ người nhận: {{ $order_info->receiverAddress }}<br>
            @endif

            @if($order_info->receiverPhone)
            SDT người nhận: {{ $order_info->receiverPhone }}<br>
            @endif

            @if($order_info->receiverNote)
            Ghi chú: {{ $order_info->receiverNote }}
            @endif
            @endif
        </p>
        @endif

        <a href="{{ URL::to('/') }}" class="btn border-secondary rounded-pill px-4 py-3 text-primary mb-4 ms-4" style="width:200px">
            Quay lại trang chủ
        </a>
    </div>
</div>
@stop