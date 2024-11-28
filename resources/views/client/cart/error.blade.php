@extends('client.layout.homepage-layout')
@section('success')
<div class="container-fluid py-5">
    <div class="container py-5 mt-2 text-center">
        <h5 class="mt-2 ">ĐẶT HÀNG THẤT BẠI</h5>
        <div class="row justify-content-center">
            <img src="{{ asset('public/frontend/client/img/error.png') }}" alt="" class="col-2">
        </div>
        <a href="{{ URL::to('/') }}" class="btn border-secondary rounded-pill px-4 py-3 text-primary mb-4 ms-4"
            style="width:200px">
            Quay lại trang chủ
        </a>
    </div>
</div>
@stop