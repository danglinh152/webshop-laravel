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
                    <h3>Sản phẩm nổi bật</h3>
                </div>
                <div class="col-lg-8 text-end">
                    <ul class="nav nav-pills d-inline-flex text-center ">
                        <li class="nav-item">
                            <a class="mx-auto btn border rounded-pill px-3 text-primary"
                                href="{{ URL::to('/product') }}">
                                <span style="width: 130px;">Tất cả sản phẩm</span>
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
<div class="w-100 mt-5">
    <img class="w-100" src="{{ asset('public/frontend/client/img/xmas.png') }}" alt="">
</div>
<div class="container d-flex justify-content-center w-100">
    <img class="m-auto" src="{{ asset('public/frontend/client/img/xmas1.png') }}" alt="">
</div>

<!-- Mobile carousel -->
<div class="container-fluid vesitable">

    <div class="container py-5" id="samsung-block">
        <h3 class="mb-3">Samsung</h3>
        @foreach ($Samsung as $ss)
        <div class="mobile-carousel owl-carousel justify-content-center">
            <div class="" style="width: 16rem">
                <div class="card mb-3 mobile-card">
                    <img src="{{ asset('public/backend/products-images/' . $ss->product_image) }}" class="card-img-top mobile-image">
                    <div class="card-body text-center">
                        <a href="" class="item-name">{{ $ss->product_name }}</a>
                        <p class="item-desc">{{ $ss->product_short_desc }}</p>
                        <p class="item-price">{{ number_format($ss->product_price, 0, '.', '.') }} đ</p>
                        <button type="button" class="mx-auto btn border rounded-pill px-3 text-primary"
                            onclick="addToCart('{{ $ss->product_id }}', event)">
                            <i class="fa fa-shopping-bag me-2"></i>
                            Add to cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- iPhone Section -->
<div class="container-fluid vesitable">
    <div class="container py-5">
        <h3 class="mb-3">Iphone</h3>
        @foreach ($Iphone as $ip)
        <div class="mobile-carousel owl-carousel justify-content-center">
            <div class="" style="width: 16rem">
                <div class="card mb-3 mobile-card">
                    <img src="{{ asset('public/backend/products-images/' . $ip->product_image) }}" class="card-img-top mobile-image">
                    <div class="card-body text-center">
                        <a href="" class="item-name">{{ $ip->product_name }}</a>
                        <p class="item-desc">{{ $ip->product_short_desc }}</p>
                        <p class="item-price">{{ number_format($ip->product_price, 0, '.', '.') }} đ</p>
                        <button type="button" class="mx-auto btn border rounded-pill px-3 text-primary"
                            onclick="addToCart('{{ $ip->product_id }}', event)">
                            <i class="fa fa-shopping-bag me-2"></i>
                            Add to cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Asus Section -->
<div class="container-fluid vesitable">
    <div class="container py-5">
        <h3 class="mb-3">Laptop Asus</h3>
        @foreach ($Asus as $as)
        <div class="mobile-carousel owl-carousel justify-content-center">
            <div class="" style="width: 19.5rem">
                <div class="card mb-3 product-cart">
                    <img src="{{ asset('public/backend/products-images/' . $as->product_image) }}" class="card-img-top card-image">
                    <div class="card-body text-center">
                        <a href="" class="item-name">{{ $as->product_name }}</a>
                        <p class="item-desc">{{ $as->product_short_desc }}</p>
                        <p class="item-price">{{ number_format($as->product_price, 0, '.', '.') }} đ</p>
                        <button type="button" class="mx-auto btn border rounded-pill px-3 text-primary"
                            onclick="addToCart('{{ $as->product_id }}', event)">
                            <i class="fa fa-shopping-bag me-2"></i>
                            Add to cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Acer Section -->
<div class="container-fluid vesitable">
    <div class="container py-5">
        <h3 class="mb-3">Laptop Acer</h3>
        @foreach ($Acer as $ac)
        <div class="mobile-carousel owl-carousel justify-content-center">
            <div class="" style="width: 19.5rem">
                <div class="card mb-3 product-cart">
                    <img src="{{ asset('public/backend/products-images/' . $ac->product_image) }}" class="card-img-top card-image">
                    <div class="card-body text-center">
                        <a href="" class="item-name">{{ $ac->product_name }}</a>
                        <p class="item-desc">{{ $ac->product_short_desc }}</p>
                        <p class="item-price">{{ number_format($ac->product_price, 0, '.', '.') }} đ</p>
                        <button type="button" class="mx-auto btn border rounded-pill px-3 text-primary"
                            onclick="addToCart('{{ $ac->product_id }}', event)">
                            <i class="fa fa-shopping-bag me-2"></i>
                            Add to cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="container d-flex justify-content-between">
    <img src="{{ asset('public/frontend/client/img/banner5.png') }}" alt="">
    <img src="{{ asset('public/frontend/client/img/banner1.jpg') }}" alt="">
</div>

<!-- Features Section  -->
<div class="container-fluid features">
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

<script>
    const addToCart = function(product_id, event) {
        event.preventDefault(); // Prevent the default form submission

        var xhr = new XMLHttpRequest();
        xhr.open('POST', "{{ URL::to('/product/add-to-card/') }}/" + product_id, true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}'); // Include CSRF token

        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Handle success response
                    showSuccessMessage('Added to cart successfully!');
                } else {
                    console.error('Error updating quantity:', xhr.statusText);
                }
            }
        };

        xhr.send(); // Sending the request without additional data
    };

    function showSuccessMessage(message) {
        // Create a div for the success message
        var messageDiv = document.createElement('div');
        messageDiv.textContent = message;
        messageDiv.style.position = 'fixed';
        messageDiv.style.top = '100px';
        messageDiv.style.right = '20px';
        messageDiv.style.backgroundColor = '#28a745'; // Green background
        messageDiv.style.color = '#fff'; // White text
        messageDiv.style.padding = '10px 20px';
        messageDiv.style.borderRadius = '5px';
        messageDiv.style.zIndex = '1000';
        messageDiv.style.transition = 'opacity 0.5s ease-in-out';
        messageDiv.style.opacity = '1';

        // Append to body
        document.body.appendChild(messageDiv);

        // Fade out after 3 seconds
        setTimeout(function() {
            messageDiv.style.opacity = '0';
            setTimeout(function() {
                document.body.removeChild(messageDiv);
            }, 500); // Remove after fade out
        }, 3000);
    }
</script>
@stop