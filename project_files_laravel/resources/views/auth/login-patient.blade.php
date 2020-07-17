<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Login | Patient</title>

  <!-- Custom fonts for this template-->
  <link href={{ asset("assets/vendor/fontawesome-free/css/all.min.css") }} rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href={{ asset("assets/css/sb-admin-2.min.css") }} rel="stylesheet">

</head>

<body class="bg-gradient-info">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4"><img src={{ asset('assets/img/logo-dark.png') }} width='100' height='100'></h1>
                    <h1 class="h4 text-gray-900 mb-4">Welcome!</h1>
                  </div>
                    @isset($url)
                      <form class="user" method="POST" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}">
                      @else
                      <form class="user" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}"> 
                    @endisset
                        @csrf
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email Address..." name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="exampleInputPassword" name="password" placeholder="Password..." required autocomplete="current-password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                    {{ __('Login') }}
                    </button>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="javascript:void(0);">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href={{ url('register/patient') }}>Not yet Registered? Create an Account!</a>
                  </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src={{ asset("assets/vendor/jquery/jquery.min.js") }}></script>
  <script src={{ asset("assets/vendor/bootstrap/js/bootstrap.bundle.min.js") }}></script>

  <!-- Core plugin JavaScript-->
  <script src={{ asset("assets/vendor/jquery-easing/jquery.easing.min.js") }}></script>

  <!-- Custom scripts for all pages-->
  <script src={{ asset("assets/js/sb-admin-2.min.js") }}></script>

</body>

</html>
