<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" name="viewport">
  <title>Login</title>

  <link rel="stylesheet" href="{{ asset('/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/modules/ionicons/css/ionicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/modules/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css') }}">

  <link rel="stylesheet" href="{{ asset('/css/demo.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
</head>
<body>
    
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              VETERAN 7680
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Login</h4></div>

              <div class="card-body">
                <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
                    @csrf
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" type="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" tabindex="1" value="{{ old('Username') }}" required autofocus>
                    @if ($errors->has('username'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                  </div>

                  <div class="form-group">
                    <label for="password" class="d-block">Password
                      {{-- <div class="float-right">
                        <a href="forgot.html">
                          Forgot Password?
                        </a>
                      </div> --}}
                    </label>
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" tabindex="2" required>
                     @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                     @endif
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="mt-5 text-muted text-center">
              {{-- Don't have an account? <a href="register.html">Create One</a> --}}
            </div>
            <div class="simple-footer">
              Copyright &copy; Stisla 2018
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

    <div id="dropDownSelect1"></div>

  <script src="{{ asset('/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('/modules/popper.js') }}"></script>
  <script src="{{ asset('/modules/tooltip.js') }}"></script>
  <script src="{{ asset('/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('/modules/moment.min.js') }}"></script>
  <script src="{{ asset('/modules/scroll-up-bar/dist/scroll-up-bar.min.js') }}"></script>
  <script src="{{ asset('/js/sa-functions.js') }}"></script>
  
  <script src="{{ asset('/js/scripts.js') }}"></script>
  <script src="{{ asset('/js/custom.js') }}"></script>
  <script src="{{ asset('/js/demo.js') }}"></script>

</body>
</html>

