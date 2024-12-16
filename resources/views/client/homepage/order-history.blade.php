@extends('client.layout.homepage-layout')
@section('order-history')
    <div class="container-fluid contact py-5 history-page">
        <div class="container py-5 ">
            <div class="mb-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Lịch sử mua hàng</li>
                    </ol>
                </nav>
            </div>
            <div class="row mt-4">
                {{-- Order 1 --}}
                <div class="mb-5 history-item p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6>Mã đơn hàng: 1 </h6>
                        <div class="d-flex align-items-center">
                            <img class="mb-2 mx-2" src="{{ asset('public/frontend/client/img/shipped.png') }}"
                                style="width: 30px" alt="">
                            <h6 class="text-success">ĐANG GIAO HÀNG</h6>
                        </div>
                    </div>
                    <div class="d-flex card-history py-2">
                        <div class="col-1">
                            <img src="{{ asset('public/backend/products-images/47920_asus_tuf_gaming_a15_fa506nc_hn011w_anphatcomputer_1.jpg') }}"
                                class="img-fluid me-5" alt="">
                        </div>
                        <div class="col-11">
                            <p class="mb-0 mt-1" style="font-weight:600">
                                <a href="{{ URL::to('/product/') }}" target="_blank">
                                    Laptop Asus TUF Gaming A15
                                </a>
                            </p>
                            <div class="d-flex justify-content-between">
                                <p class="mb-0" style="">x1</p>
                                <p class="mb-0 mt-0" id="">
                                    19.000.000đ
                                </p>
                            </div>

                        </div>
                    </div>
                    <div class="d-flex justify-content-between text-dark">
                        <p>0399912345 | Thủ Đức, TP.HCM</p>
                        <p>Thành tiền: 19.020.000đ</p>
                    </div>

                </div>

                {{-- Order 2 --}}
                <div class="mb-5 history-item p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6>Mã đơn hàng: 2 </h6>
                        <div class="d-flex align-items-center">
                            <img class="mb-2 mx-2" src="{{ asset('public/frontend/client/img/pendding.png') }}"
                                style="width: 30px" alt="">
                            <h6 class="text-warning">ĐANG XỬ LÝ</h6>
                        </div>

                    </div>
                    <div class="d-flex card-history py-2">
                        <div class="col-1">
                            <img src="{{ asset('public/backend/products-images/47920_asus_tuf_gaming_a15_fa506nc_hn011w_anphatcomputer_1.jpg') }}"
                                class="img-fluid me-5" alt="">
                        </div>
                        <div class="col-11">
                            <p class="mb-0 mt-1" style="font-weight:600">
                                <a href="{{ URL::to('/product/') }}" target="_blank">
                                    Laptop Asus TUF Gaming A15
                                </a>
                            </p>
                            <div class="d-flex justify-content-between">
                                <p class="mb-0" style="">x1</p>
                                <p class="mb-0 mt-0" id="">
                                    19.000.000đ
                                </p>
                            </div>

                        </div>
                    </div>
                    <div class="d-flex justify-content-between text-dark">
                        <p>0399912345 | Thủ Đức, TP.HCM</p>
                        <p>Thành tiền: 19.020.000đ</p>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button style="width:13%" class=" btn btn-cancel border rounded-pill py-2 text-danger">
                            Hủy đơn hàng
                        </button>
                    </div>

                </div>

                {{-- Order 3 --}}
                <div class="mb-5 history-item p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6>Mã đơn hàng: 3</h6>
                        <div class="d-flex align-items-center">
                            <img class="mb-2 mx-2" src="{{ asset('public/frontend/client/img/cancelled.png') }}"
                                style="width: 30px" alt="">
                            <h6 class="text-danger">ĐÃ HỦY ĐƠN HÀNG</h6>
                        </div>
                    </div>
                    <div class="d-flex card-history py-2">
                        <div class="col-1">
                            <img src="{{ asset('public/backend/products-images/47920_asus_tuf_gaming_a15_fa506nc_hn011w_anphatcomputer_1.jpg') }}"
                                class="img-fluid me-5" alt="">
                        </div>
                        <div class="col-11">
                            <p class="mb-0 mt-1" style="font-weight:600">
                                <a href="{{ URL::to('/product/') }}" target="_blank">
                                    Laptop Asus TUF Gaming A15
                                </a>
                            </p>
                            <div class="d-flex justify-content-between">
                                <p class="mb-0" style="">x1</p>
                                <p class="mb-0 mt-0" id="">
                                    19.000.000đ
                                </p>
                            </div>

                        </div>
                    </div>
                    <div class="d-flex justify-content-between text-dark">
                        <p>0399912345 | Thủ Đức, TP.HCM</p>
                        <p>Thành tiền: 19.020.000đ</p>
                    </div>
                </div>


                {{-- Order 4 --}}
                <div class="mb-5 history-item p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6>Mã đơn hàng: 4</h6>
                        <div class="d-flex align-items-center">
                            <img class="mb-2 mx-2" src="{{ asset('public/frontend/client/img/shipped.png') }}"
                                style="width: 30px" alt="">
                            <h6 class="text-success">GIAO HÀNG THÀNH CÔNG</h6>
                        </div>

                    </div>
                    <div class="d-flex card-history py-2">
                        <div class="col-1">
                            <img src="{{ asset('public/backend/products-images/47485_laptop_asus_rog_strix_g18_g814jir_n6007w__intel_core_i9_14900hx.jpg') }}"
                                class="img-fluid me-5" alt="">
                        </div>
                        <div class="col-11">
                            <p class="mb-0 mt-1" style="font-weight:600">
                                <a href="{{ URL::to('/product/') }}" target="_blank">
                                    Laptop Asus ROG Strix G18
                                </a>
                            </p>
                            <div class="d-flex justify-content-between">
                                <p class="mb-0" style="">x2</p>
                                <p class="mb-0 mt-0" id="">
                                    19.000.000đ
                                </p>
                            </div>

                        </div>
                    </div>
                    <div class="d-flex card-history py-2">
                        <div class="col-1">
                            <img src="{{ asset('public/backend/products-images/samsung-galaxy-a15-4g-vang-thumb-600x600.jpg') }}"
                                class="img-fluid me-5" alt="">
                        </div>
                        <div class="col-11">
                            <p class="mb-0 mt-1" style="font-weight:600">
                                <a href="{{ URL::to('/product/') }}" target="_blank">
                                    Điện thoại Samsung Galaxy A15 4G
                                </a>
                            </p>
                            <div class="d-flex justify-content-between mt-3">
                                <p class="mb-0">x1</p>
                                <p class="mb-0 mt-0" id="">
                                    5.000.000đ
                                </p>
                            </div>

                        </div>
                    </div>
                    <div class="d-flex justify-content-between text-dark">
                        <p>0399912345 | Thủ Đức, TP.HCM</p>
                        <p>Thành tiền: 24.020.000đ</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
