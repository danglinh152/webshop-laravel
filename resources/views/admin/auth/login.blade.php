<!-- <!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - Admin Panel</title>
    <link href="{{asset('public/frontend/admin/css/styles.css')}}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>
                                <div class="card-body login-form">
                                    
                                    <form action="{{URL::to('/admin-dashboard')}}" method="POST">
                                        {{csrf_field()}}
                                        <div class="mb-3">
                                            <input name="admin_email" class="form-control" id="inputEmail" type="email" placeholder="name@example.com" />
                                        </div>
                                        <div class="mb-3">
                                            <input name="admin_password" class="form-control" id="inputPassword" type="password" placeholder="Password" />
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                            <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="password.html">Forgot Password?</a>
                                            <button class="btn btn-primary">Login</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="register.html">Need an account? Sign up!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('public/frontend/admin/js/scripts.js')}}"></script>
</body>

</html> -->

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login page</title>

    <link rel="stylesheet" href="{{asset('public/frontend/admin/css/login-styles.css')}}" />
    <!-- <link rel="stylesheet" href="reset.css" /> -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>
    <div class="wrapper">
        <form action="" class="form-login" id="form-login">
            <h1>Login</h1>
            <div class="input-box">
                <input id="email" type="text" placeholder=" " />
                <label class="input-label">Email address</label>
                <span class="error-message"></span>
            </div>
            <div class="input-box">
                <input id="password" type="password" placeholder=" " />
                <label class="input-label">Password</label>
                <span class="error-message"></span>
                <button type="button" class="view view-password">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 576 512">
                        <path
                            fill="#888"
                            d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z" />
                    </svg>
                </button>
            </div>
            <div class="error-login">
                Username hoặc password không đúng!
            </div>

            <button class="btn" type="submit">Login</button>

            <div class="forgot-register">
                <span class="register">You don't have an account?
                    <a
                        href="{{URL::to('/register')}}"
                        class="link link-register">Register</a>
                </span>
                <a href="#" class="link-forgot">Forgot your password?</a>
            </div>
        </form>
    </div>

    <script src="{{asset('public/frontend/admin/js/login-scripts.js')}}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Validator({
                form: "#form-login",
                formGroupSelector: ".input-box",
                errorSelector: ".error-message",
                rules: [
                    Validator.isRequired("#email"),
                    Validator.minLength("#password", 2),
                ],
                onSubmit: function(data) {
                    // Call API
                    console.log(data);
                },
            });
        });
    </script>
</body>

</html>