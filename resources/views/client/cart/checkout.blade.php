@extends('client.layout.homepage-layout')
@php
use Illuminate\Support\Facades\session;
@endphp
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
                    <?php $i = 0;
                    session(['cart' => $cart]); ?>
                    @foreach ($cart as $key => $cart_value)
                    <tr>
                        <th scope="row" class="d-flex align-items-center gap-3">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('public/backend/products-images/'.$cart_value->product_image) }}"
                                    class="me-5" style="width: 80px; height: 80px; object-fit: contain;" alt="">
                            </div>
                        </th>
                        <td>
                            <p class="mb-0 mt-4">
                                <a href="{{ URL::to('/product/'.$cart_value->product_id) }}" target="_blank">
                                    {{ $cart_value->product_name }}
                                </a>
                            </p>
                        </td>
                        <td>
                            <p class="mb-0 mt-4" id="price{{ $i }}">
                                {{ number_format($cart_value->product_price, 0, ',', ',') }}đ
                            </p>
                        </td>
                        <td>
                            <div class="input-group quantity mt-4" style="width: 80px;">

                                <input type="text" class="form-control form-control-sm text-center border-0"
                                    value="{{ $cart_value->quantity }}" data-cart-detail-id="" data-cart-detail-price="{{ $cart_value->product_price }}"
                                    data-cart-detail-index="{{ $i }}" disabled
                                    style="background: transparent">

                            </div>
                        </td>
                        <td>
                            <p class="mb-0 mt-4" id="total{{ $i }}" data_cart_detail_total="{{ $cart_value->product_price * $cart_value->quantity }}">
                                {{ number_format($cart_value->product_price * $cart_value->quantity, 0, ',', ',') }}đ
                            </p>
                        </td>
                        <td>
                            <form method="post" action="/delete-product-from-cart/{{ $cart_value->product_id }}">
                                @csrf
                                <button class="btn btn-md rounded-circle bg-light border mt-4">
                                    <i class="fa fa-times text-danger"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php $i++; ?>
                    @endforeach
                </tbody>
            </table>
        </div>

        <form class="row mt-5 g-4" action="{{ URL::to('/client/online-checkout') }}" method="POST" id="checkoutForm">
            @csrf
            <div class="col-md-7">
                <h4 class="mt-2">Thông tin người nhận</h4>
                <div class="form-group mt-3 input-box">
                    <label>Họ tên:</label>
                    <input id="receiverName" class="form-control mt-1" type="text" name="receiverName" />
                    <span class="error-message" style="color: #f33a58;"></span>
                </div>
                <div class="form-group mt-3 input-box">
                    <label>Địa chỉ:</label>
                    <textarea id="receiverAddress" class="form-control mt-1" name="receiverAddress"></textarea>
                    <span class="error-message" style="color: #f33a58;"></span>
                </div>
                <div class="form-group mt-3 input-box">
                    <label>Số điện thoại:</label>
                    <input id="receiverPhone" class="form-control mt-1" type="tel" name="receiverPhone"/>
                    <span class="error-message" style="color: #f33a58;"></span>
                </div>
                <div class="form-group mt-3 input-box">
                    <label>Ghi chú:</label>
                    <textarea id="receiverNote" class="form-control mt-1" name="receiverNote"></textarea>
                    <span class="error-message" style="color: #f33a58;"></span>
                </div>

                <h4 class="mt-4 mb-2">Hình thức thanh toán</h4>
                <div class="border rounded w-50 d-flex justify-content-between align-items-center px-2 py-2">
                    <div class="form-check-label" style="width: 100%">
                        <img src="{{ asset('public/frontend/client/img/delivery.jpg') }}" alt="" style="width: 14%; border-radius:5px">
                        Thanh toán khi giao hàng
                    </div>
                    <input class="form-check-input mx-2" type="radio" name="payment" value="cod" id="cod" required>
                </div>
                <div class="border rounded mt-2 w-50 d-flex justify-content-between align-items-center px-1 py-1 pe-2">
                    <div class="form-check-label" style="width: 100%">
                        <img src="https://test-payment.momo.vn/v2/gateway/images/logo-momo.png" alt="captureWallet" style="width: 16%">
                        Ví MoMo
                    </div>
                    <input class="form-check-input mx-2" type="radio" name="payment" value="payUrl" id="payUrl">
                </div>
                <div class="mt-4"><i class="fa-solid fa-arrow-left m-2" style="color: #0d367d;"></i><a href="{{ URL::to('/cart') }}">Quay lại giỏ hàng</a></div>
            </div>

            <div class="col-md-5">
                <div class="bg-light rounded p-4">
                    <h4 class="mb-4">Thông tin đơn hàng</h4>
                    <div class="d-flex justify-content-between mb-4 text-dark">
                        <p class="mb-0 me-4">Tạm tính:</p>
                        <p class="mb-0" id="subtotal" data-cart-total-price="0">0 đ</p>
                    </div>
                    <div class="d-flex justify-content-between mb-4 text-dark">
                        <p class="mb-0 me-4">Voucher:</p>
                        <p class="mb-0" id="discountPrice" data-cart-total-price="0">0 đ</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="mb-0 me-4 text-dark">Phí vận chuyển:</p>
                        <div class="">
                            <p class="mb-0 text-dark">20.000 đ</p>
                        </div>
                    </div>
                    <div class="py-4 my-4 border-top border-bottom d-flex justify-content-between">
                        <p class="mb-0 ps-4 me-4 text-dark">Tổng số tiền:</p>
                        <p class="mb-0 pe-4 text-dark" id="totalAmount" data-cart-total-price="0">0 đ</p>
                        <input type="hidden" name="total" id="total" value="" />
                    </div>
                    <button type="submit" name="submit" class="btn border-secondary rounded-pill px-4 py-3 text-primary mb-4">Xác nhận đơn hàng</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="{{ asset('public/frontend/client/js/onlineCheckOut.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const subtotalElement = document.getElementById('subtotal');
        const totalAmountElement = document.getElementById('totalAmount');
        const totalInput = document.getElementById('total');
        const discountPriceElement = document.getElementById('discountPrice');

        function calculateTotal() {
            let subtotal = parseFloat(localStorage.getItem('subtotal'));
            let discountVal = parseFloat(localStorage.getItem('discountVal'));
            let discountPrice = parseFloat(localStorage.getItem('discountPrice'));
            let totalPrice = parseFloat(localStorage.getItem('totalPrice'));
            const rows = document.querySelectorAll('tbody tr');
            subtotalElement.innerText = new Intl.NumberFormat('vi-VN').format(subtotal) + ' đ';
            discountPriceElement.innerText = '-' + new Intl.NumberFormat('vi-VN').format(discountPrice) + ' đ';
            totalAmountElement.innerText = new Intl.NumberFormat('vi-VN').format(totalPrice) + ' đ'; // Assuming no shipping costs
            totalInput.value = totalPrice;
        }

        // Initial calculation
        calculateTotal();
    });
</script>
<!-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        console.log("Validator initialized");
        Validator({
            form: "#checkoutForm",
            formGroupSelector: ".input-box",
            errorSelector: ".error-message",
            rules: [
                Validator.isRequired("#receiverName"),
                Validator.isRequired("#receiverAddress"),
                Validator.isRequired("#receiverPhone"),
                Validator.isLength("#receiverPhone", 10),
                Validator.isNumber("#receiverPhone"),

            ],
            onSubmit: function(data) {
                const form = document.getElementById('checkoutForm');
                form.submit();
                console.log(data);
            },
        });
    });
</script> -->
@stop
