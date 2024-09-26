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
                        <tr>
                            <th scope="row">
                                <div class="d-flex align-items-center">
                                    <img src="{{asset('public/backend/products-images/47920_asus_tuf_gaming_a15_fa506nc_hn011w_anphatcomputer_1.jpg')}}"
                                        class="img-fluid me-5 rounded-circle"
                                        style="width: 80px; height: 80px;" alt="">
                                </div>
                            </th>
                            <td>
                                <p class="mb-0 mt-4">
                                    <a href="{{URL::to('/product/id')}}" target="_blank">
                                        Laptop Asus Tuf gaming
                                    </a>
                                </p>
                            </td>
                            <td>
                                <p class="mb-0 mt-4">
                                     19,000,000đ
                                </p>
                            </td>
                            <td>
                                <div class="input-group quantity mt-4" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button
                                            class="btn btn-sm btn-minus rounded-circle bg-light border">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text"
                                        class="form-control form-control-sm text-center border-0"
                                        value="0"
                                        data-cart-detail-id="${cartDetail.id}"
                                        data-cart-detail-price="${cartDetail.price}"
                                        data-cart-detail-index="${status.index}">
                                    <div class="input-group-btn">
                                        <button
                                            class="btn btn-sm btn-plus rounded-circle bg-light border">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="mb-0 mt-4" data-cart-detail-id="">
                                    <fmt:formatNumber type="number"
                                        value="" /> 19,000,000 đ
                                </p>
                            </td>
                            <td>
                                <form method="post"
                                    action="/delete-product-from-cart/${cartDetail.id}">
                                    <button class="btn btn-md rounded-circle bg-light border mt-4">
                                        <i class="fa fa-times text-danger"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    </c:forEach>
                </tbody>
            </table>
        </div>
            <div class="mt-5 row g-4 justify-content-start">
                <div class="col-md-6"></div>
                <div class="col-12 col-md-6">
                    <div class="bg-light rounded">
                        <div class="p-4">
                            <h2 class=" mb-4 fw-normal">Thông Tin Đơn
                                Hàng</span>
                                </h1>
                                <div class="d-flex justify-content-between mb-4">
                                    <h5 class="mb-0 me-4">Tạm tính:</h5>
                                    <p class="mb-0" data-cart-total-price="${priceTotal}">
                                        <fmt:formatNumber type="number" value="${priceTotal}" /> đ
                                    </p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h5 class="mb-0 me-4">Phí vận chuyển</h5>
                                    <div class="">
                                        <p class="mb-0">0 đ</p>
                                    </div>
                                </div>
                        </div>
                        <div
                            class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                            <h5 class="mb-0 ps-4 me-4">Tổng số tiền</h5>
                            <p class="mb-0 pe-4" data-cart-total-price="${priceTotal}">
                                <fmt:formatNumber type="number" value="${priceTotal}" /> đ
                            </p>
                        </div>
                        <form action="" method="post">
                            
                            <button
                                class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4">Xác
                                nhận thanh toán
                            </button>
                        </form>
                    </div>
                </div>
            </div>
    </div>
</div>
@stop