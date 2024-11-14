@extends('client.layout.homepage-layout')
@section('checkout')
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="mb-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Đặt hàng</li>
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
                        @for ($i = 0; $i < 2; $i++)
                            <tr>
                                <th scope="row" class="d-flex align-items-center gap-3">
                                    <div class="checkCart">
                                        <input class="form-check-input" type="checkbox" name=""
                                            index="{{ $i }}" id="check-cart-detail{{ $i }}">
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('public/backend/products-images/47920_asus_tuf_gaming_a15_fa506nc_hn011w_anphatcomputer_1.jpg') }}"
                                            class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;"
                                            alt="">
                                    </div>
                                </th>
                                <td>
                                    <p class="mb-0 mt-4">
                                        <a href="{{ URL::to('/product/id') }}" target="_blank">
                                            Laptop Asus Tuf gaming
                                        </a>
                                    </p>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4" id="price{{ $i }}">
                                        19,000,000
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
                                            value="1" data-cart-detail-id="" data-cart-detail-price="19000000"
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
                                    <p class="mb-0 mt-4" id="total{{ $i }}" data_cart_detail_total="19000000">
                                        19,000,000 đ
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
                        @endfor
                    </tbody>
                </table>
            </div>
            <div class="mt-5 row g-4 justify-content-start">
                <div class="col-md-7">
                    <div class="mb-3">
                        <h4 class="mt-2">Thông tin người nhận</h4>

                        <div class="form-group mt-3">
                            <label>Họ tên:</label>
                            <input class="form-control mt-1" type="text" name="receiverName" />
                        </div>
                        <div class="form-group mt-3">
                            <label>Địa chỉ:</label>
                            <textarea class="form-control mt-1" type="text" name="receiverAddress">
                            </textarea>
                        </div>
                        <div class="form-group mt-3">
                            <label>Số điện thoại:</label>
                            <input class="form-control mt-1" type="text" name="receiverPhone" />
                        </div>
                        <div class="form-group mt-3">
                            <label>Ghi chú:</label>
                            <textarea class="form-control mt-1" type="text" name="receiverAddress">
                            </textarea>
                        </div>

                        <h4 class="mt-4 mb-2">Hình thức thanh toán</h4>
                        <div class="border rounded w-50 d-flex justify-content-between align-items-center px-2 py-2">
                            <div class="form-check-label" style="width: 100%">
                                <img src="{{ asset('public/frontend/client/img/delivery.jpg') }}" alt=""
                                    class="" style="width: 14%; border-radius:5px">
                                Thanh toán khi giao hàng
                            </div>
                            <input class="form-check-input" type="radio" name="payment" id="cod">
                        </div>
                        <div
                            class="border rounded mt-2 w-50 d-flex justify-content-between align-items-center px-1 py-1 pe-2">
                            <div class="form-check-label " style="width: 100%">
                                <img src="https://test-payment.momo.vn/v2/gateway/images/logo-momo.png" alt="captureWallet"
                                    class="" style="width: 16%">
                                Ví MoMo
                            </div>
                            <input class="form-check-input " type="radio" name="payment" id="momo">
                        </div>
                        <div class="mt-4"><i class="fa-solid fa-arrow-left m-2" style="color: #0d367d;"></i><a
                                href="{{ URL::to('/cart') }}">Quay lại giỏ
                                hàng</a></div>
                    </div>
                </div>
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
                        <form action="{{ URL::to('/success') }}" method="get">
                            <button class="btn border-secondary rounded-pill px-4 py-3 text-primary  mb-4 ms-4">
                                Xác nhận đặt hàng
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
