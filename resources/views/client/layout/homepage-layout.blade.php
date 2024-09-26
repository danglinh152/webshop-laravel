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
    <style>
        dialog {
            padding: 20px;
            border: none;
            border-radius: 5px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        button {
            margin-top: 10px;
        }
    </style>
</head>


<?php
$message = Session::get('message');
$user_name = session('user_name');
$user_id = session('user_id');
$avatar = session('image');
?>

<body>
    <?php if ($message): ?>
        <dialog id="forget-password-dialog">
            <h2>Welcome Back to 10pm Store!</h2>
            <p><?php echo $message; ?></p>
            <button id="close-dialog">Close</button>
        </dialog>
        <?php Session::put('message', null); ?>
    <?php endif; ?>

    <!-- Spinner  -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>


    <!-- Navbar  -->
    <div class="container-fluid fixed-top shadow">
        <div class="container px-0">
            <nav class="navbar navbar-light bg-white navbar-expand-xl">
                <a href="{{URL::to('/')}}" class="navbar-brand">
                    <img style="width: 200px; height: 85px; border-radius:20%; object-fit:cover" src="{{asset('public/frontend/client/img/logo.png')}}" alt="">
                </a>
                <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                    <div class="navbar-nav mx-auto me-5">
                        <a href="{{URL::to('')}}" class="nav-item nav-link active"
                            style="font-weight: 600; font-size: 16px;">Trang Chủ</a>
                        <a href="{{URL::to('/product')}}" class="nav-item nav-link"
                            style="font-weight: 600; font-size: 16px;">Sản Phẩm</a>
                        <a href="" class="nav-item nav-link" style="font-weight: 600; font-size: 16px;">Liên
                            hệ</a>
                    </div>
                    <div class="d-flex">
                        <a href="/cart" class="position-relative me-4 my-auto">
                            <i class="fa fa-shopping-bag fa-2x"></i>
                            <span
                                class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1"
                                style="top: -5px; left: 15px; height: 20px; min-width: 20px;">
                                1
                            </span>
                        </a>
                        @if (Session::has('user_name'))
                        <div class="dropdown my-auto">
                            <a href="#" class="dropdown" role="button" id="dropdownMenuLink"
                                data-bs-toggle="dropdown" aria-expanded="false" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fas fa-user fa-2x"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end p-4" labelledby="dropdownMenuLink">
                                <li class="d-flex align-items-center flex-column" style="min-width: 250px;">
                                    @if ($avatar)
                                    <img class=""
                                        src="{{ $avatar }}"
                                        alt="" aria-hidden="true"
                                        style="height: 200px; width: 200px; object-fit: cover; border-radius: 50%" />
                                    @else
                                    <img class=""
                                        src="https://images.unsplash.com/photo-1502378735452-bc7d86632805?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&s=aa3a807e1bbdfd4364d1f449eaa96d82"
                                        alt="" aria-hidden="true"
                                        style="height: 200px; width: 200px; object-fit: cover; border-radius: 50%" />
                                    @endif

                                    <div class="text-dark fw-bold fs-5 my-3">
                                        {{ Session::get('user_name') }}
                                    </div>
                                </li>

                                <li><a class="dropdown-item" href="#">Quản lý tài khoản</a></li>
                                <li><a class="dropdown-item" href="/order-history">Lịch sử mua hàng</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <!-- <form action="{{URL::to('/logout')}}" method="post">
                                            <button class="dropdown-item" href="#">Đăng xuất</button>
                                        </form> -->
                                    <a class="dropdown-item" href="{{URL::to('/logout')}}">Đăng xuất</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @elseif(!Session::has('user_name'))
                    <div class="navbar-nav mx-auto me-5">
                        <a class="nav-item nav-link active" style="font-weight: 600; font-size: 16px;" href="{{ URL::to('/login') }}">
                            Đăng nhập
                        </a>
                    </div>
                    @endif


                    <!-- <div class="navbar-nav mx-auto me-5">
                        <a class="nav-item nav-link active" style="font-weight: 600; font-size: 16px;" href="{{URL::to('/login')}}">Đăng nhập</a>
                    </div> -->
                </div>
            </nav>
        </div>
    </div>

    @yield('content')
    @yield('productDetail')
    @yield('productShow')


    <!-- Footer  -->
    <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5">
        <div class="container py-5">
            <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5) ;">
                <div class="row g-4">
                    <div class="col-lg-3">
                        <a target="_blank">
                            <h1 class="text-primary mb-0">10PM STORE</h1>
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
                        <span class="text-dark">10PM Corporation</span>

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
                    <span class="text-light"><a href="https://www.facebook.com/UIT.Fanpage" target="_blank"><i
                                class="fas fa-copyright text-light me-2"></i>10PM Store</a>, All right
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
    <script>
        // Check if the dialog exists and show it if there is a message
        window.onload = function() {
            const dialog = document.getElementById('forget-password-dialog');
            if (dialog) {
                dialog.showModal();
            }
        };

        // Close the dialog when the button is clicked
        document.getElementById('close-dialog')?.addEventListener('click', function() {
            const dialog = document.getElementById('forget-password-dialog');
            if (dialog) {
                dialog.close();
            }
        });
    </script>
</body>

</html>