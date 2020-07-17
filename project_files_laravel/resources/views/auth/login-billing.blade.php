<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href={{ asset("assets2/img/favicon.ico") }}>
    <title>Login | Billing</title>
    <link rel="stylesheet" type="text/css" href={{ asset("assets2/css/bootstrap.min.css") }}>
    <link rel="stylesheet" type="text/css" href={{ asset("assets2/css/font-awesome.min.css") }}>
    <link rel="stylesheet" type="text/css" href={{ asset("assets2/css/style.css") }}>
</head>

<body>
    <div class="main-wrapper account-wrapper">
        <div class="account-page">
			<div class="account-center">
				<div class="account-box">
                      <form class="user" method="POST" action='{{ url("login/billing") }}' aria-label="{{ __('Login') }}">
                        @csrf
						<div class="account-logo">
                            <a href="javascript:void(0);"><img src={{ asset("assets2/img/logo-dark.png") }} alt=""></a>
                        <div class="form-group text-center">
                            <h1 class="text-danger">Billing</h1>
                        </div>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" autofocus="" class="form-control" name="username" value="{{ old('username') }}">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary account-btn">Login</button>
                        </div>
                    </form>
                </div>
			</div>
        </div>
    </div>
    <script src={{ asset("assets2/js/jquery-3.2.1.min.js") }}></script>
	<script src={{ asset("assets2/js/popper.min.js") }}></script>
    <script src={{ asset("assets2/js/bootstrap.min.js") }}></script>
    <script src={{ asset("assets2/js/app.js") }}></script>
</body>


<!-- login23:12-->
</html>