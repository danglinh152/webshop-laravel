@extends('client.layout.homepage-layout')
@section('content')
    <!-- Hero  -->
    <div class="container-fluid py-5 mb-5 hero-header">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-md-12 col-lg-7 ">
                    <h4 class="mb-3 text-secondary mt-5">100% Sản Phẩm Chính Hãng</h4>
                    <h1 class="mb-5 display-3 text-primary">Hàng cao cấp giá tốt</h1>
                </div>
                <div class="col-md-12 col-lg-5 mt-5">
                    <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
                        <div class="carousel-inner mt-5" role="listbox">
                            <div class="carousel-item active rounded">
                                <img src="{{ asset('public/frontend/client/img/laptop1.jpg') }}" style="object-fit: cover;"
                                    class="img-fluid w-100 h-100 bg-secondary rounded" alt="First slide">
                            </div>
                            <div class="carousel-item rounded">
                                <img src="{{ asset('public/frontend/client/img/laptop2.jpg') }}"
                                    class="img-fluid w-100 h-100 rounded" alt="Second slide">
                            </div>
                            <div class="carousel-item rounded">
                                <img src="{{ asset('public/frontend/client/img/laptop3.jpg') }}"
                                    class="img-fluid w-100 h-100 rounded" alt="Second slide">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselId"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselId"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Laptop Shop -->
    <div class="container-fluid fruite">
        <div class="container">
            <div class="tab-class text-center">
                <div class="row g-4">
                    <div class="col-lg-4 text-start">
                        <h2>Sản phẩm nổi bật</h2>
                    </div>
                    <div class="col-lg-8 text-end">
                        <ul class="nav nav-pills d-inline-flex text-center ">
                            <li class="nav-item">
                                <a class="d-flex m-2 py-2 bg-light active rounded-pill" href="{{ URL::to('/product') }}">
                                    <span class="text-dark" style="width: 130px;">All
                                        Products</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div id="tranding">
                            <div class="container">
                                <div class="swiper tranding-slider">
                                    <div class="swiper-wrapper">
                                        <!-- Slide-start -->
                                        @foreach ($all_product as $key => $pro)
                                            <div class="swiper-slide tranding-slide">
                                                <a href=" {{ URL::to('/product/' . $pro->product_id) }}">
                                                    <div class="tranding-slide-img">
                                                        <img src="{{ asset('public/backend/products-images/' . $pro->product_image) }}"
                                                            alt="Tranding">
                                                    </div>
                                                    <div class="tranding-slide-content">
                                                        <div class="tranding-slide-content-bottom">
                                                            <a href=" {{ URL::to('/product/' . $pro->product_id) }}"
                                                                class="product-name">
                                                                {{ $pro->product_name }} </a>
                                                            <p class="product-desc mb-0 mt-2">
                                                                {{ $pro->product_short_desc }}
                                                            </p>
                                                            <p class="product-price"><?php $formatted_price = number_format($pro->product_price);
                                                            echo $formatted_price; ?> đ</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="tranding-slider-control">
                                        <div class="swiper-button-prev slider-arrow">
                                            <ion-icon name="arrow-back-outline"></ion-icon>
                                        </div>
                                        <div class="swiper-button-next slider-arrow">
                                            <ion-icon name="arrow-forward-outline"></ion-icon>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="container-fluid fruite py-5">
        <div class="container py-5">
            <div class="tab-class text-center">
                <div class="row g-4">
                    <div class="col-lg-4 text-start">
                        <h1>Mobile</h1>
                    </div>
                    <div class="col-lg-8 text-end">
                        <ul class="nav nav-pills d-inline-flex text-center mb-5">
                            <li class="nav-item">
                                <a class="d-flex m-2 py-2 bg-light rounded-pill active" data-bs-toggle="pill"
                                    href="#tab-1">
                                    <span class="text-dark" style="width: 200px;">Sản phẩm điện thoại</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="row g-4">
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative mobile-item">
                                            <div class="mobile-img">
                                                <img src="{{ asset('public/backend/products-images/samsung-galaxy-s23-ultra-green-thumbnew-600x600.jpg') }}"
                                                    class="w-100 rounded-top" alt="">
                                            </div>
                                            <div
                                                class="p-4 border border-secondary border-top-0 rounded-bottom mobile-content">
                                                <h4 style="font-size: 16px;">
                                                    <a href="">
                                                        Samsung Galaxy S23 Ultra 5G
                                                    </a>
                                                </h4>
                                                <p style="font-size: 13px;">
                                                    8GB/256GB
                                                </p>
                                                <div class="d-flex flex-lg-wrap justify-content-center flex-column">
                                                    <p style="text-align: center; width: 100%;font-size: 16px;"
                                                        class="text-dark  fw-bold mb-2">
                                                        20.190.000đ
                                                    </p>
                                                    <form action="" method="post" class="">
                                                        <button
                                                            class="mx-auto btn border border-secondary rounded-pill px-3 text-primary "><i
                                                                class="fa fa-shopping-bag me-2 text-primary"></i>
                                                            Add to cart
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative mobile-item">
                                            <div class="mobile-img">
                                                <img src="{{ asset('public/backend/products-images/samsung-galaxy-a15-4g-vang-thumb-600x600.jpg') }}"
                                                    class="w-100 rounded-top" alt="">
                                            </div>
                                            <div
                                                class="p-4 border border-secondary border-top-0 rounded-bottom mobile-content">
                                                <h4 style="font-size: 16px;">
                                                    <a href="">
                                                        Samsung Galaxy S23 Ultra 5G
                                                    </a>
                                                </h4>
                                                <p style="font-size: 13px;">
                                                    8GB/256GB
                                                </p>
                                                <div class="d-flex flex-lg-wrap justify-content-center flex-column">
                                                    <p style="text-align: center; width: 100%;font-size: 16px;"
                                                        class="text-dark  fw-bold mb-2">
                                                        20.190.000đ
                                                    </p>
                                                    <form action="" method="post" class="">
                                                        <button
                                                            class="mx-auto btn border border-secondary rounded-pill px-3 text-primary "><i
                                                                class="fa fa-shopping-bag me-2 text-primary"></i>
                                                            Add to cart
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Features Section  -->
    <div class="container-fluid features py-5">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="featurs-item text-center rounded bg-light p-4">
                        <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                            <i class="fas fa-car-side fa-3x text-white"></i>
                        </div>
                        <div class="featurs-content text-center">
                            <h5>Free Shipping</h5>
                            <p class="mb-0">Hỏa tốc trong 2h</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="featurs-item text-center rounded bg-light p-4">
                        <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                            <i class="fas fa-user-shield fa-3x text-white"></i>
                        </div>
                        <div class="featurs-content text-center">
                            <h5>Security Payment</h5>
                            <p class="mb-0">Giao dịch an toàn</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="featurs-item text-center rounded bg-light p-4">
                        <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                            <i class="fas fa-exchange-alt fa-3x text-white"></i>
                        </div>
                        <div class="featurs-content text-center">
                            <h5>30 Day Return</h5>
                            <p class="mb-0">Đổi trả miễn phí</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="featurs-item text-center rounded bg-light p-4">
                        <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                            <i class="fa fa-phone-alt fa-3x text-white"></i>
                        </div>
                        <div class="featurs-content text-center">
                            <h5>24/7 Support</h5>
                            <p class="mb-0">Hỗ trợ nhiệt tình</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
