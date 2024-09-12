<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <link rel="stylesheet" href="{{asset('public/frontend/client/css/otp.css')}}" />
    <!-- <link rel="stylesheet" href="reset.css" /> -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>
    <div class="wrapper">
        <div class="text-block">
            <h1>OTP</h1>
            <span>Enter your OTP code</span>
        </div>
        <form action="" id="form-otp">
            <div class="input-box">
                <input type="number" />
                <input type="number" disabled />
                <input type="number" disabled />
                <input type="number" disabled />
            </div>
        </form>
        <div class="error-submit"></div>

        <button class="btn-submit"><a href="#">Verify OTP</a></button>
        <a href="{{URL::to('/login')}}" class="link-login">Return to login</a>
    </div>

    <script src="public/frontend/client/js/otp.js"></script>
</body>

</html>