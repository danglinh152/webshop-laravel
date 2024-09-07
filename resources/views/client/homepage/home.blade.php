<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Laptop Shop</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
        rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('public/frontend/client/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/client/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('public/frontend/client/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('public/frontend/client/css/style.css')}}" rel="stylesheet">
</head>

<body>

    <!-- Spinner  -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>


    <!-- Navbar  -->
    <div class="container-fluid fixed-top shadow">
        <div class="container px-0">
            <nav class="navbar navbar-light bg-white navbar-expand-xl">
                <a href="/" class="navbar-brand">
                    <h1 class="text-primary display-6">Laptopshop</h1>
                </a>
                <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                    <div class="navbar-nav mx-5">
                        <a href="/" class="nav-item nav-link active"
                            style="font-weight: 700; font-size: 18px;">Trang Chủ</a>
                        <a href="/products" class="nav-item nav-link"
                            style="font-weight: 700; font-size: large;">Sản Phẩm</a>
                        <a href="" class="nav-item nav-link" style="font-weight: 700; font-size: large;">Liên
                            hệ</a>
                    </div>

                    <!-- <div class="d-flex m-3 me-0 mx-auto">
                            <a href="/cart" class="position-relative me-4 my-auto">
                                <i class="fa fa-shopping-bag fa-2x"></i>
                                <span
                                    class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1"
                                    style="top: -5px; left: 15px; height: 20px; min-width: 20px;">${sessionScope.sum}</span>
                            </a>
                            <div class="dropdown my-auto">
                                <a href="#" class="dropdown" role="button" id="dropdownMenuLink"
                                    data-bs-toggle="dropdown" aria-expanded="false" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="fas fa-user fa-2x"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end p-4" labelledby="dropdownMenuLink">
                                    <li class="d-flex align-items-center flex-column" style="min-width: 300px;">
                                        <img style="width: 150px; height: 150px; border-radius: 50%; overflow: hidden; object-fit: cover;"
                                            src="/img/avatar/${sessionScope.avatar}" />
                                        <div class="text-center my-3">
                                            <c:out value="${sessionScope.fullName}" />
                                        </div>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Quản lý tài khoản</a></li>
                                    <li><a class="dropdown-item" href="/order-history">Lịch sử mua hàng</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <form action="/logout" method="post">
                                            <input type="hidden" name="${_csrf.parameterName}"
                                                value="${_csrf.token}" />
                                            <button class="dropdown-item" href="#">Đăng xuất</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div> -->


                    <div class="d-flex m-3 me-0 mx-auto">
                        <a class="btn" href="/login">Đăng nhập</a>
                    </div>


                </div>
            </nav>
        </div>
    </div>




    <!-- Hero  -->
    <div class="container-fluid py-5 mb-5 hero-header">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-md-12 col-lg-7 ">
                    <h4 class="mb-3 text-secondary mt-5">100% Sản Phẩm Chính Hãng</h4>
                    <h4 class="mb-5 display-3 text-primary">Hàng cao cấp<br />provip</h4>
                </div>
                <div class="col-md-12 col-lg-5 mt-5">
                    <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
                        <div class="carousel-inner mt-5" role="listbox">
                            <div class="carousel-item active rounded">
                                <img src="{{asset('public/frontend/client/img/laptop1.jpg')}}" style="object-fit: cover;"
                                    class="img-fluid w-100 h-100 bg-secondary rounded" alt="First slide">
                            </div>
                            <div class="carousel-item rounded">
                                <img src="{{asset('public/frontend/client/img/laptop2.jpg')}}" class="img-fluid w-100 h-100 rounded"
                                    alt="Second slide">
                            </div>
                            <div class="carousel-item rounded">
                                <img src="{{asset('public/frontend/client/img/laptop3.jpg')}}" class="img-fluid w-100 h-100 rounded"
                                    alt="Second slide">
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
    <div class="container-fluid fruite py-5">
        <div class="container py-5">
            <div class="tab-class text-center">
                <div class="row g-4">
                    <div class="col-lg-4 text-start">
                        <h1>Sản phẩm nổi bật</h1>
                    </div>
                    <div class="col-lg-8 text-end">
                        <ul class="nav nav-pills d-inline-flex text-center mb-5">
                            <li class="nav-item">
                                <a class="d-flex m-2 py-2 bg-light rounded-pill active"
                                    data-bs-toggle="pill" href="#tab-1">
                                    <span class="text-dark" style="width: 130px;">All
                                        Products</span>
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
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="{{asset('public/frontend/client/img/lenovo-loq.jpg')}}"
                                                    class="w-100 rounded-top" alt="">
                                            </div>
                                            <div
                                                class="p-4 border border-secondary border-top-0 rounded-bottom fruit-content">
                                                <h4 style="font-size: 16px;">
                                                    <a href="/product">
                                                        Laptop Lenovo LOQ </a>
                                                </h4>
                                                <p style="font-size: 13px;">
                                                    Intel Core i5-12450HX | 16GB | 512GB | 15.6 inch | Win 11 | Xám</p>
                                                <div
                                                    class="d-flex flex-lg-wrap justify-content-center flex-column">
                                                    <p style="text-align: center; width: 100%;font-size: 16px;"
                                                        class="text-dark  fw-bold mb-2">
                                                        <fmt:formatNumber type="number"
                                                            value="" /> 16999998 đ
                                                    </p>
                                                    <form
                                                        action="/add-product-to-cart/${product.id}"
                                                        method="post" class="">
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
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="{{asset('public/frontend/client/img/lenovo-loq.jpg')}}"
                                                    class="w-100 rounded-top" alt="">
                                            </div>
                                            <div
                                                class="p-4 border border-secondary border-top-0 rounded-bottom fruit-content">
                                                <h4 style="font-size: 16px;">
                                                    <a href="/product">
                                                        Laptop Lenovo LOQ </a>
                                                </h4>
                                                <p style="font-size: 13px;">
                                                    Intel Core i5-12450HX | 16GB | 512GB | 15.6 inch | Win 11 | Xám</p>
                                                <div
                                                    class="d-flex flex-lg-wrap justify-content-center flex-column">
                                                    <p style="text-align: center; width: 100%;font-size: 16px;"
                                                        class="text-dark  fw-bold mb-2">
                                                        <fmt:formatNumber type="number"
                                                            value="" /> 16999998 đ
                                                    </p>
                                                    <form
                                                        action="/add-product-to-cart/${product.id}"
                                                        method="post" class="">
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
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="{{asset('public/frontend/client/img/lenovo-loq.jpg')}}"
                                                    class="w-100 rounded-top" alt="">
                                            </div>
                                            <div
                                                class="p-4 border border-secondary border-top-0 rounded-bottom fruit-content">
                                                <h4 style="font-size: 16px;">
                                                    <a href="/product">
                                                        Laptop Lenovo LOQ </a>
                                                </h4>
                                                <p style="font-size: 13px;">
                                                    Intel Core i5-12450HX | 16GB | 512GB | 15.6 inch | Win 11 | Xám</p>
                                                <div
                                                    class="d-flex flex-lg-wrap justify-content-center flex-column">
                                                    <p style="text-align: center; width: 100%;font-size: 16px;"
                                                        class="text-dark  fw-bold mb-2">
                                                        <fmt:formatNumber type="number"
                                                            value="" /> 16999998 đ
                                                    </p>
                                                    <form
                                                        action="/add-product-to-cart/${product.id}"
                                                        method="post" class="">
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
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="{{asset('public/frontend/client/img/lenovo-loq.jpg')}}"
                                                    class="w-100 rounded-top" alt="">
                                            </div>
                                            <div
                                                class="p-4 border border-secondary border-top-0 rounded-bottom fruit-content">
                                                <h4 style="font-size: 16px;">
                                                    <a href="/product">
                                                        Laptop Lenovo LOQ </a>
                                                </h4>
                                                <p style="font-size: 13px;">
                                                    Intel Core i5-12450HX | 16GB | 512GB | 15.6 inch | Win 11 | Xám</p>
                                                <div
                                                    class="d-flex flex-lg-wrap justify-content-center flex-column">
                                                    <p style="text-align: center; width: 100%;font-size: 16px;"
                                                        class="text-dark  fw-bold mb-2">
                                                        <fmt:formatNumber type="number"
                                                            value="" /> 16999998 đ
                                                    </p>
                                                    <form
                                                        action="/add-product-to-cart/${product.id}"
                                                        method="post" class="">
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
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="{{asset('public/frontend/client/img/lenovo-loq.jpg')}}"
                                                    class="w-100 rounded-top" alt="">
                                            </div>
                                            <div
                                                class="p-4 border border-secondary border-top-0 rounded-bottom fruit-content">
                                                <h4 style="font-size: 16px;">
                                                    <a href="/product">
                                                        Laptop Lenovo LOQ </a>
                                                </h4>
                                                <p style="font-size: 13px;">
                                                    Intel Core i5-12450HX | 16GB | 512GB | 15.6 inch | Win 11 | Xám</p>
                                                <div
                                                    class="d-flex flex-lg-wrap justify-content-center flex-column">
                                                    <p style="text-align: center; width: 100%;font-size: 16px;"
                                                        class="text-dark  fw-bold mb-2">
                                                        <fmt:formatNumber type="number"
                                                            value="" /> 16999998 đ
                                                    </p>
                                                    <form
                                                        action="/add-product-to-cart/${product.id}"
                                                        method="post" class="">
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
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="{{asset('public/frontend/client/img/lenovo-loq.jpg')}}"
                                                    class="w-100 rounded-top" alt="">
                                            </div>
                                            <div
                                                class="p-4 border border-secondary border-top-0 rounded-bottom fruit-content">
                                                <h4 style="font-size: 16px;">
                                                    <a href="/product">
                                                        Laptop Lenovo LOQ </a>
                                                </h4>
                                                <p style="font-size: 13px;">
                                                    Intel Core i5-12450HX | 16GB | 512GB | 15.6 inch | Win 11 | Xám</p>
                                                <div
                                                    class="d-flex flex-lg-wrap justify-content-center flex-column">
                                                    <p style="text-align: center; width: 100%;font-size: 16px;"
                                                        class="text-dark  fw-bold mb-2">
                                                        <fmt:formatNumber type="number"
                                                            value="" /> 16999998 đ
                                                    </p>
                                                    <form
                                                        action="/add-product-to-cart/${product.id}"
                                                        method="post" class="">
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
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="{{asset('public/frontend/client/img/lenovo-loq.jpg')}}"
                                                    class="w-100 rounded-top" alt="">
                                            </div>
                                            <div
                                                class="p-4 border border-secondary border-top-0 rounded-bottom fruit-content">
                                                <h4 style="font-size: 16px;">
                                                    <a href="/product">
                                                        Laptop Lenovo LOQ </a>
                                                </h4>
                                                <p style="font-size: 13px;">
                                                    Intel Core i5-12450HX | 16GB | 512GB | 15.6 inch | Win 11 | Xám</p>
                                                <div
                                                    class="d-flex flex-lg-wrap justify-content-center flex-column">
                                                    <p style="text-align: center; width: 100%;font-size: 16px;"
                                                        class="text-dark  fw-bold mb-2">
                                                        <fmt:formatNumber type="number"
                                                            value="" /> 16999998 đ
                                                    </p>
                                                    <form
                                                        action="/add-product-to-cart/${product.id}"
                                                        method="post" class="">
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
    <div class="container-fluid featurs py-5">
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

    <!-- Footer  -->
    <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5">
        <div class="container py-5">
            <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5) ;">
                <div class="row g-4">
                    <div class="col-lg-3">
                        <a target="_blank">
                            <h1 class="text-primary mb-0">Laptopshop</h1>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item">
                        <h4 class="text-light mb-3">Chất lượng là ưu tiên hàng đầu</h4>

                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex flex-column text-start footer-item">
                        <h4 class="text-light mb-3">Shop Info</h4>
                        <a class="text-dark" href="#">About Us</a>

                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex flex-column text-start footer-item">
                        <h4 class="text-light mb-3">Account</h4>
                        <a class="text-dark" href="#">My Account</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item">
                        <h4 class="text-light mb-3">Contact</h4>
                        <span class="text-dark">Lê Tiến Đạt</span>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Copyright Start -->
    <div class="container-fluid copyright bg-dark py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <span class="text-light"><a href="/" target="_blank"><i
                                class="fas fa-copyright text-light me-2"></i>TDat</a>, All right
                        reserved.</span>
                </div>

            </div>
        </div>
    </div>
    <!-- Copyright End -->



    <!-- Back to Top -->
    <a href="#"
        class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i
            class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script
        src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('/public/frontend/client/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('/public/frontend/client/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('/public/frontend/client/lib/lightbox/js/lightbox.min.js')}}"></script>
    <script src="{{asset('/public/frontend/client/lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('/public/frontend/client/js/main.js')}}"></script>
</body>

</html>