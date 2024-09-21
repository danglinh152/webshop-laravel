<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <link rel="stylesheet" href="{{asset('public/frontend/client/css/otp.css')}}" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>
    <?php
    $otp = Session::get('otp');
    $email = Session::get('email');
    if ($otp || $email) {
        Session::put('otp', null);
        Session::put('email', null);
    }
    ?>
    <div class="wrapper">
        <div class="text-block">
            <h1>OTP</h1>
            <span>Enter your OTP code</span>
        </div>
        <form action="{{URL::to('/check-otp')}}" method="POST" id="form-otp">
            {{csrf_field()}}
            <!-- Hidden input to send OTP -->
            <input type="hidden" name="otp" value="{{ $otp }}" />
            <input type="hidden" name="email" value="{{ $email }}" />
            <div class="input-box">
                <input type="number" id="otp1" name="otp1" />
                <input type="number" id="otp2" name="otp2" disabled />
                <input type="number" id="otp3" name="otp3" disabled />
                <input type="number" id="otp4" name="otp4" disabled />
            </div>
        </form>
        <div class="error-submit"></div>

        <button class="btn-submit" id="verify-btn">Verify OTP</button>

        <script>
            document.getElementById('verify-btn').addEventListener('click', function() {
                const otpValues = [
                    document.getElementById('otp1').value,
                    document.getElementById('otp2').value,
                    document.getElementById('otp3').value,
                    document.getElementById('otp4').value
                ];

                if (otpValues.every(value => value !== '')) {
                    // Thực hiện hành động xác minh OTP ở đây
                    const form = document.getElementById('form-otp');
                    form.submit();
                } else {
                    document.querySelector('.error-submit').innerText = 'Please enter all OTP digits.';
                }
            });
        </script>

        <a href="{{URL::to('/login')}}" class="link-login">Return to login</a>
    </div>

    <script src="public/frontend/client/js/otp.js"></script>
</body>

</html>
