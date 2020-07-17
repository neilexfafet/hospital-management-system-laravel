<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Register | Doctor</title>

  <!-- Custom fonts for this template-->
  <link href={{ asset("assets/vendor/fontawesome-free/css/all.min.css") }} rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href={{ asset("assets/css/sb-admin-2.min.css") }} rel="stylesheet">

</head>

<body class="bg-gradient-info">

  <div class="container">

    <div class="row justify-content-center">

    <div class="card o-hidden border-0 shadow-lg my-3 col-lg-8">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
              <img src={{ asset('assets/img/logo-dark.png') }} width='75' height='75'> 
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form class="user" method="POST" action='{{ url("register/doctor") }}' aria-label="{{ __('Register') }}">
                @csrf
                <!-- NAME -->
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label class="col-8"> First Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-user @error('first_name') is-invalid @enderror" id="first_name" placeholder="First Name" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                  </div>
                  <div class="col-sm-6">
                  <label class="col-8"> Last Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-user @error('last_name') is-invalid @enderror" id="last_name" placeholder="Last Name" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                  </div>
                </div>
                <div class="form-group">
                <label class="col-8"> Specialization <span class="text-danger">*</span></label>
                  <select class="form-control" id="specialization" name="specialization" value="{{ old('specialization') }}">
                    <option selected disabled>--SELECT REGISTERED SPECIALIZATION--</option>
                    @foreach ($data as $row)
                      <option value="{{$row->name}}">{{$row->name}}</option>
                    @endforeach
                  </select>
                </div>
                <!-- BDAY -->
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label class="col-8"> Birth Date <span class="text-danger">*</span></label>
                    <input type="date" class="form-control form-control-date @error('birthday') is-invalid @enderror" id="birthday" name="birthday" value="{{ old('birthday') }}" required autocomplete="birthday" autofocus>
                  </div>
                  <div class="col-sm-6">
                    <label class="col-8"> Gender <span class="text-danger">*</span></label>
                    <select class="form-control form-control-select @error('gender') is-invalid @enderror" id="gender" name="gender" value="{{ old('gender') }}">
                        <option selected disabled> --Select-- </option>
                        <option value="Male"> Male </option>
                        <option value="Female"> Female </option>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label class="col-8"> Address <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-user @error('address') is-invalid @enderror" id="address" placeholder="Address" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>
                  </div>
                  <div class="col-sm-6">
                  <label class="col-8"> Contact No. <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-user @error('contactno') is-invalid @enderror" id="contactno" placeholder="Contact No." name="contactno" value="{{ old('last_name') }}" required autocomplete="contactno" autofocus>
                  </div>
                </div>
                <div class="form-group">
                <label class="col-8"> Short Biography (max: 255)<span class="text-danger">*</span></label>
                  <textarea class="form-control" rows="4" placeholder="Short Biography . . ." name="biography" id="biography" value="{{ old('biography') }}" required autocomplete="biography"></textarea>
                </div>
                <hr>
                <div class="form-group">
                <label class="col-8"> Email Address <span class="text-danger">*</span></label>
                  <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email" placeholder="Email Address" name="email" value="{{ old('email') }}" required autocomplete="email">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                  <label class="col-8"> Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password" required autocomplete="new-password">
                       
                  </div>
                  <div class="col-sm-6">
                  <label class="col-12"> Confirm Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control form-control-user" id="password" placeholder="Repeat Password" name="password_confirmation" required autocomplete="new-password">
                  </div>
                </div>
                <button type="submit" href="javascript:void(0);" class="btn btn-primary btn-user btn-block">
                  Register Account
                </button>
                
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="javascript:void(0);">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href={{ url('login/doctor') }}>Already have an account? Login!</a>
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
