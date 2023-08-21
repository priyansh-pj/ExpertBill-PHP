<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>ExpertBill</title>
    <meta name="description" content="Experts options for Billing" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800,900');

    body {
        font-family: 'Poppins', sans-serif;
        font-weight: 300;
        font-size: 25px;
        line-height: 1.7;
        color: #fff;
        background-color: #212529;
        overflow-x: hidden
    }

    a {
        cursor: pointer;
        transition: all 200ms linear
    }

    a:hover {
        text-decoration: none
    }

    .link {
        color: #fff
    }

    .link:hover {
        color: #ffd700;
    }

    p {
        font-weight: 500;
        font-size: 14px;
        line-height: 1.7
    }

    h4 {
        font-weight: 600
    }

    h6 span {
        padding: 0 20px;
        text-transform: uppercase;
        font-weight: 700
    }

    .section {
        position: relative;
        width: 100%;
        display: block
    }


    .full-height {
        min-height: 100vh
    }

    [type="checkbox"]:checked,
    [type="checkbox"]:not(:checked) {
        position: absolute;
        left: -9999px
    }

    .checkbox:checked+label,
    .checkbox:not(:checked)+label {
        position: relative;
        display: block;
        text-align: center;
        width: 60px;
        height: 16px;
        border-radius: 2px;
        padding: 0;
        margin: 10px auto;
        cursor: pointer;
        background-color: #ffffff
    }

    .checkbox:checked+label:before,
    .checkbox:not(:checked)+label:before {
        position: absolute;
        display: block;
        width: 36px;
        height: 36px;
        border-radius: 10%;
        color: #ffd700;
        background: linear-gradient(30deg, #0056b3, #007bff);
        content: '';
        z-index: 20;
        font-size: 12px;
        top: -10px;
        left: -10px;
        line-height: 36px;
        text-align: center;
        font-size: 24px;
        transition: all 0.5s ease
    }

    .checkbox:checked+label:before {
        transform: translateX(44px) rotate(-270deg)
    }

    .card-3d-wrap {
        position: relative;
        width: 100%;
        max-width: 440px;
        height: 460px;
        -webkit-transform-style: preserve-3d;
        transform-style: preserve-3d;
        perspective: 800px;
        margin-top: 40px;
        margin-left: auto;
        margin-right: auto;
    }

    .card-3d-wrapper {
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        -webkit-transform-style: preserve-3d;
        transform-style: preserve-3d;
        transition: all 600ms ease-out
    }

    .login-div {
        width: 150px
    }

    .card-front,
    .card-back {
        width: 100%;
        height: 100%;
        background: linear-gradient(30deg, #0056b3, #007bff);

        position: absolute;
        border-radius: 0px;
        left: 0;
        top: 0;
        -webkit-transform-style: preserve-3d;
        transform-style: preserve-3d;
        backface-visibility: hidden
    }

    .card-back {
        transform: rotateY(180deg)
    }

    .checkbox:checked~.card-3d-wrap .card-3d-wrapper {
        transform: rotateY(180deg)
    }

    .center-wrap {
        position: absolute;
        width: 100%;
        padding: 0 20px;
        top: 50%;
        left: 0;
        transform: translate3d(0, -50%, 35px) perspective(100px);
        z-index: 20;
        display: block
    }

    .form-group {
        position: relative;
        display: block;
        margin: 0;
        padding: 0
    }

    .form-style {
        padding: 12px 16px;
        padding-left: 45px;
        height: 48px;
        width: 100%;
        font-weight: 500;
        border-radius: 4px;
        font-size: 14px;
        line-height: 22px;
        letter-spacing: 0.5px;
        outline: none;
        color: #c4c3ca;
        background-color: #fff;
        border: none;
        transition: all 200ms linear;
        box-shadow: 0 4px 8px 0 rgba(21, 21, 21, .2)
    }

    .form-style:focus,
    .form-style:active {
        border: none;
        outline: none;
        box-shadow: 0 4px 8px 0 rgba(21, 21, 21, .2)
    }

    .input-icon {
        position: absolute;
        top: 0;
        left: 18px;
        height: 48px;
        font-size: 24px;
        line-height: 48px;
        text-align: left;
        color: #1f2029;
        transition: all 200ms linear
    }

    .form-group input:-ms-input-placeholder {
        color: #1f2029;
        opacity: 1;
        transition: all 200ms linear
    }

    .form-group input::-moz-placeholder {
        color: #1f2029;
        opacity: 0.7;
        transition: all 200ms linear
    }

    .form-group input:-moz-placeholder {
        color: #1f2029;
        opacity: 0.7;
        transition: all 200ms linear
    }

    .form-group input::-webkit-input-placeholder {
        color: #1f2029;
        opacity: 0.7;
        transition: all 200ms linear
    }

    .form-group input:focus:-ms-input-placeholder {
        opacity: 0;
        transition: all 200ms linear
    }

    .form-group input:focus::-moz-placeholder {
        opacity: 0;
        transition: all 200ms linear
    }

    .form-group input:focus:-moz-placeholder {
        opacity: 0;
        transition: all 200ms linear
    }

    .form-group input:focus::-webkit-input-placeholder {
        opacity: 0;
        transition: all 200ms linear
    }

    .btn {
        border-radius: 4px;
        height: 48px;
        width: 100%;
        font-size: 13px;
        font-weight: 600;
        text-transform: uppercase;
        transition: all 200ms linear;
        padding: 0 30px;
        letter-spacing: 1px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        -ms-flex-pack: center;
        text-align: center;
        border: none;
        background-color: #ffd700;
        color: #fff;
        box-shadow: 0 8px 24px 0 rgba(18, 248, 173, .2)
    }

    .btn:active,
    .btn:focus {
        background-color: #fff;
        color: #ffd700;
        box-shadow: 0 8px 24px 0 rgba(255, 255, 255, .2)
    }

    .btn:hover {
        background-color: #fff;
        color: #ffd700;
        box-shadow: 0 8px 24px 0 rgba(255, 255, 255, .2)
    }

    .logo {
        position: absolute;
        top: 30px;
        right: 30px;
        display: block;
        z-index: 100;
        transition: all 250ms linear
    }

    .logo img {
        height: 26px;
        width: auto;
        display: block
    }
    </style>
</head>

<body>
    <div class="section">
        <div class="container">
            <div class="row full-height justify-content-center">
                <div class="col-12 text-center align-self-center py-5">
                    <div class="section pb-5 pt-5 pt-sm-2 text-center">
                        <h6 class="mb-0 pb-3"><span>Log In </span><span>Sign Up</span></h6> <input class="checkbox"
                            type="checkbox" id="reg-log" name="reg-log">
                        <label for="reg-log"></label>
                        <div class="card-3d-wrap mx-auto">
                            <div class="card-3d-wrapper">
                                <div class="card-front">
                                    <div class="center-wrap">
                                        <div class="section text-center">
                                            <!-- Login Form -->
                                            <form id="loginForm" action="<?= base_url('Credentials/login_check') ?>" method="post">
                                                <?= csrf_field() ?>
                                                <h4 class="mb-4 pb-3">Log In</h4>
                                                <div class="form-group">
                                                    <input type="email" name="email" class="form-style"
                                                        placeholder="Your Email" id="logemail" autocomplete="none"
                                                        required>
                                                    <i class="input-icon fa fa-at"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="password" name="password" class="form-style"
                                                        placeholder="Your Password" id="logpass" autocomplete="none"
                                                        required>
                                                    <i class="input-icon fa fa-lock"></i>
                                                </div>
                                                <input type="submit" class="btn mt-4">Login</a>
                                                <p class="mb-0 mt-4 text-center">
                                                    <a href="#0" class="link">Forgot your password?</a>
                                                </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-back">
                                    <div class="center-wrap">
                                        <div class="section text-center">
                                            <h4 class="mb-4 pb-3">Sign Up</h4>
                                            <!-- Signup Form -->
                                            <form id="signupForm" action="<?= base_url('Credentials/Register') ?>" method="post">
                                                <?= csrf_field() ?>

                                                <div class="form-group">
                                                    <input type="text" name="username" class="form-style"
                                                        placeholder="Username" id="username" autocomplete="none"
                                                        required>
                                                    <i class="input-icon fa fa-user"></i>
                                                </div>


                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6 mt-2">
                                                            <input type="text" name="first_name" class="form-style"
                                                                placeholder="First Name" id="fname" autocomplete="none"
                                                                required>
                                                            <i class="input-icon fa fa-bars"></i>
                                                        </div>

                                                        <div class="col-md-6 mt-2">
                                                            <input type="text" name="last_name" class="form-style"
                                                                placeholder="Last Name" id="lname" autocomplete="none"
                                                                required>
                                                            <i class="input-icon fa input-icon fa fa-bars"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="email" name="email" class="form-style"
                                                        placeholder="Your Email" id="email" autocomplete="none"
                                                        required>
                                                    <i class="input-icon fa fa-at"></i>
                                                </div>

                                                <div class="form-group mt-2">
                                                    <input type="tel" name="phone" class="form-style"
                                                        placeholder="Phone" id="phone" autocomplete="tel" required>
                                                    <i class="input-icon fa fa-phone"></i>
                                                </div>


                                                <div class="form-group mt-2">
                                                    <input type="password" name="password" class="form-style"
                                                        placeholder="Your Password" id="password" autocomplete="none"
                                                        required>
                                                    <i class="input-icon fa fa-lock"></i>
                                                </div>
                                                <input type="submit" class="btn mt-4">Signup</a>
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
    <script rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js">
    </script>

    <script rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</body>

</html>