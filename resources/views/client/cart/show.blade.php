@extends('client.layout.homepage-layout')
@section('cartShow')
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="mb-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Chi Tiết Giỏ Hàng</li>
                    </ol>
                </nav>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Sản phẩm</th>
                            <th scope="col">Tên</th>
                            <th scope="col">Giá cả</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Thành tiền</th>
                            <th scope="col">Xử lý</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0; ?>

                        @foreach ($cart as $key => $cart_value )
                            <tr>
                                <th scope="row" class="d-flex align-items-center gap-3">
                                    <div class="checkCart">
                                        <input class="form-check-input" type="checkbox" name=""
                                            index="{{ $i }}" id="check-cart-detail{{ $i }}">
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <img src="{{asset('public/backend/products-images/'.$cart_value->product_image)}}"
                                            class="img-fluid me-5" style="width: 80px; height: 80px;"
                                            alt="">
                                    </div>
                                </th>
                                <td>
                                    <p class="mb-0 mt-4">
                                        <a href="{{ URL::to('/product/'.$cart_value->product_id) }}" target="_blank">
                                           {{$cart_value->product_name}}
                                        </a>
                                    </p>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4" id="price{{ $i }}">
                                        {{number_format($cart_value->product_price, 0, ',', ',')}}đ
                                    </p>
                                </td>
                                <td>
                                    <div class="input-group quantity mt-4" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-minus rounded-circle bg-light border mt-0">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" class="form-control form-control-sm text-center border-0"
                                            value="{{$cart_value->quantity}}" data-cart-detail-id="" data-cart-detail-price="{{$cart_value->product_price}}"
                                            data-cart-detail-index="{{ $i }}" disabled
                                            style="background: transparent">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-plus rounded-circle bg-light border mt-0">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4" id="total{{ $i }}" data_cart_detail_total="{{$cart_value->product_price * $cart_value->quantity}}">
                                        {{number_format($cart_value->product_price * $cart_value->quantity, 0, ',', ',')}}đ
                                    </p>
                                </td>
                                <td>
                                    <form method="post" action="/delete-product-from-cart/${cartDetail.id}">
                                        <button class="btn btn-md rounded-circle bg-light border mt-4">
                                            <i class="fa fa-times text-danger"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php $i++ ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-5 row g-4 justify-content-start">
                <div class="col-md-7"></div>
                <div class="col-12 col-md-5">
                    <div class="bg-light rounded">
                        <div class="p-4">
                            <h4 class="mb-4 ">Thông tin đơn hàng
                            </h4>
                            <div class="d-flex justify-content-between mb-4 text-dark">
                                <p class="mb-0 me-4">Tạm tính:</p>
                                <p class="mb-0 " data-cart-total-price="0">
                                    0 đ
                                </p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="mb-0 me-4 text-dark">Phí vận chuyển:</p>
                                <div class="">
                                    <p class="mb-0 text-dark">0 đ</p>
                                </div>
                            </div>
                        </div>
                        <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                            <p class="mb-0 ps-4 me-4 text-dark">Tổng số tiền:</p>
                            <p class="mb-0 pe-4 text-dark" data-cart-total-price="0">
                                0 đ
                            </p>
                        </div>
                        <form action="{{ URL::to('/client/checkout') }}" method="get">
                            <button class="btn border-secondary rounded-pill px-4 py-3 text-primary  mb-4 ms-4">Xác
                                nhận đơn hàng
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
