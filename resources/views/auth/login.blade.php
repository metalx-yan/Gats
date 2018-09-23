<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="images/favicon.ico">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="css/material-design-iconic-font.min.css">

    <link rel="stylesheet" type="text/css" href="css/animate.css">

    <link rel="stylesheet" type="text/css" href="css/hamburgers.min.css">

    <link rel="stylesheet" type="text/css" href="css/animsition.min.css">

    <link rel="stylesheet" type="text/css" href="css/select2.min.css">

    <link rel="stylesheet" type="text/css" href="css/daterangepicker.css">

    <link rel="stylesheet" type="text/css" href="css/util.css">

    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
    
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                    @csrf

                    <span class="login100-form-title p-b-26">
                        Welcome
                    </span>
                    <span class="login100-form-title p-b-48">
                        <i class="zmdi zmdi-font"></i>
                    </span>

                    <div class="wrap-input100 validate-input" data-validate = "Valid username is full character">
                        <input class="input100{{ $errors->has('username') ? ' is-invalid' : '' }}" type="text" name="username" value="{{ old('Username') }}" required autofocus>

                        <span class="focus-input100" data-placeholder="Username"></span>
                        
                        @if ($errors->has('username'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <span class="btn-show-pass">
                            <i class="zmdi zmdi-eye"></i>
                        </span>
                        <input class="input100{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" required>
                        <span class="focus-input100" data-placeholder="Password"></span>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn">
                                Login
                            </button>
                        </div>
                    </div>

                    <div class="text-center p-t-60">
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
    

    <div id="dropDownSelect1"></div>

    <script src="js/jquery-3.2.1.min.js"></script>

    <script src="js/animsition.min.js"></script>

    <script src="js/popper.js"></script>

    <script src="js/bootstrap.min.js"></script>

    <script src="js/select2.min.js"></script>

    <script src="js/moment.min.js"></script>

    <script src="js/daterangepicker.js"></script>

    <script src="js/countdowntime.js"></script>

    <script src="js/main.js"></script>

</body>
</html>

