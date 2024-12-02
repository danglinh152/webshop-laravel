@extends('client.layout.homepage-layout')
@section('success')
<div class="container-fluid py-5">
    <div class="container py-5 mt-2 text-center">
        <h5 class="mt-2 ">ĐẶT HÀNG THÀNH CÔNG</h5>
        <div class="row justify-content-center">
            <img src="{{ asset('public/frontend/client/img/success.png') }}" alt="" class="col-2">
        </div>
        <h6 class="mt-2">Mã đơn hàng: 12345678x</h6>
        <h6>***************************************************</h6>
        <h6 class="mt-4">Thông tin giao hàng</h6>
        <p>Lê Văn Đạt <br>
            KTX Khu B, Đông Hòa, Dĩ An, Bình Dương<br>
            0123456789
        </p>
        <a href="{{ URL::to('/') }}" class="btn border-secondary rounded-pill px-4 py-3 text-primary mb-4 ms-4"
            style="width:200px">
            Quay lại trang chủ
        </a>
    </div>
</div>
@stop