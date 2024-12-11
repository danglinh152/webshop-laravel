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
        <h6 class="mt-2">Mã đơn hàng: {{ $order_info->order_id }}</h6>
        <h6>***************************************************</h6>
        <h6 class="mt-4">Thông tin giao hàng</h6>
        <p>
            Người đặt mua: {{ $username }} <br>
            Người nhận hàng: {{ $order_info->receiverName }} <br>
            Địa chỉ người nhận: {{ $order_info->receiverAddress }}<br>
            SDT người nhận: {{ $order_info->receiverPhone }}
            Ghi chú: {{ $order_info->receiverNote }}

        </p>
        <a href="{{ URL::to('/') }}" class="btn border-secondary rounded-pill px-4 py-3 text-primary mb-4 ms-4" style="width:200px">
            Quay lại trang chủ
        </a>
    </div>
</div>
@stop