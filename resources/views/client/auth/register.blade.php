<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <link rel="stylesheet" href="{{asset('public/frontend/client/css/register-styles.css')}}" />
    <!-- <link rel="stylesheet" href="reset.css" /> -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>
    <div class="wrapper">
        <form  action="{{URL::to('/admin/user/add-user')}}" method="POST" class="form-login" id="form-login">
            {{csrf_field()}}
            <h1>Register</h1>
            <div class="input-field">
                <div class="input-box">
                    <input id="f_name" name="f_name" type="text" placeholder=" " />
                    <label class="input-label">First name</label>
                    <span class="error-message"></span>
                </div>
                <div class="input-box">
                    <input id="l_name" name="l_name" type="text" placeholder=" " />
                    <label class="input-label">Last name</label>
                    <span class="error-message"></span>
                </div>
            </div>
            <div class="input-box">
                <input id="email" name="email" type="text" placeholder=" " />
                <label class="input-label">Email address</label>
                <span class="error-message"></span>
            </div>
            <div class="input-field">
                <div class="input-box">
                    <input id="password" name="password" type="password" placeholder=" " />
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
                <div class="input-box">
                    <input
                        id="confirm-password"
                        type="password"
                        placeholder=" " />
                    <label class="input-label">Confirm password</label>
                    <span class="error-message"></span>
                    <button
                        type="button"
                        class="view view-confirm_password">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 576 512">
                            <path
                                fill="#888"
                                d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="error-register error">
                <!-- username hoặc password không đúng! -->
            </div>

            <button class="btn" type="submit">Register</button>

            <div class="login-group">
                <span class="login">You have an account?
                    <a href="{{URL::to('/login')}}" class="link link-login">Login</a>
                </span>
            </div>
        </form>
    </div>

    <script src="{{('public/frontend/client/js/register-scripts.js')}}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Validator({
                form: "#form-login",
                formGroupSelector: ".input-box",
                errorSelector: ".error-message",
                rules: [
                    Validator.isRequired("#email"),
                    Validator.isEmail("#email"),
                    Validator.isRequired("#l_name"),
                    Validator.isRequired("#f_name"),
                    Validator.minLength("#password", 6),
                    Validator.isRequired("#confirm-password"),
                    Validator.isConfirmed(
                        "#confirm-password",
                        function() {
                            return document.querySelector(
                                "#form-login #password"
                            ).value;
                        },
                        "Mật khẩu không chính xác"
                    ),
                ],
                onSubmit: function(data) {
                    // Call API
                    const form = document.getElementById('form-login');
                    form.submit();
                    console.log(data);
                },
            });
        });
    </script>
</body>

</html>
