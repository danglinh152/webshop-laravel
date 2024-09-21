<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <link rel="stylesheet" href="{{asset('public/frontend/client/css/forgotPassword.css')}}" />
    <!-- <link rel="stylesheet" href="reset.css" /> -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>
    <div class="wrapper">

        <form action="{{URL::to('/send-mail')}}" method="POST" class="form-login" id="form-login">
            {{csrf_field()}}
            <h1>Forgot Password</h1>
            <p>Enter your email address</p>
            <div class="input-box">
                <input id="email" name="email" type="text" placeholder=" " required />
                <label class="input-label">Email address</label>
                <span class="error-message"></span>
            </div>
            <div class="error-submit">Email không tồn tại</div>

            <button type="submit" class="btn-submit">Continue</button>
            <a href="{{URL::to('/login')}}" class="link-login">Return to login</a>
        </form>

        <script src="public/frontend/client/js/forgotPassword.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Validator({
                    form: "#form-login",
                    formGroupSelector: ".input-box",
                    errorSelector: ".error-message",
                    rules: [
                        Validator.isRequired("#email"),
                        Validator.isEmail("#email"),
                    ],
                    onSubmit: function(data) {
                        // Form sẽ tự động được gửi đi
                        const form = document.getElementById('form-login');
                        form.submit();
                    },
                });
            });
        </script>

        </script>
</body>

</html>