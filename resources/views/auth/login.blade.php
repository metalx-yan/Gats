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
              <br>
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Login</h4></div>

              <div class="card-body">
                <form method="POST" action=" {{ route('login') }}"  novalidate="">
                    @csrf
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" type="username" class="form-control {{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" tabindex="1" value="{{ old('username') }}" required autofocus>
                    {!! $errors->first('username', '<span class="invalid-feedback">:message</span>') !!}

                  </div>

                  <div class="form-group">
                    <label for="password" class="d-block">Password
                    </label>
                    <input id="password" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" tabindex="2" required>
                    {!! $errors->first('password', '<span class="invalid-feedback">:message</span>') !!}

                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                  <div class="form-group">
                    <a href="{{ route('home') }}" class="btn btn-secondary btn-block">Back to Home</a>
                  </div>
                </form>
              </div>
            </div>
            <div class="mt-5 text-muted text-center">
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

