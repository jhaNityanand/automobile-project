@include("layout-1.style")
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User Forgot Password</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('public/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{url('public/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('public/assets/dist/css/adminlte.min.css')}}">

  <style type="text/css">
    b{
      color: rgb(20, 50, 100);
      font-size: 35px;
      font-weight: bold;
      font-family: times new romen;
    }
    b:hover{
      color: green;
    }
    /* .card{
        border: 2PX solid black;
    } */
    #b{
      color: red;
      font-size: 16px;
      font-weight: bold;
      font-family: times new romen;
    }
    p{
      color: blue;
      font-size: 20px;
      font-weight: bold;
      text-decoration: underline;
      font-family: times new romen;
    }
    #p{
      color: black;
      font-size: 18px;
      font-weight: bold;
      text-decoration: unset;
      font-family: times new romen;
    }
    input{
      color: black;
      font-weight: bold;
      font-family: times new romen;
    }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="{{ url('/') }}"><b><i class="fas fa-car"></i> Automobile</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p id="p_admin" class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>

      <form action="{{ url('saveUserForgot') }}" method="POST" autocomplete="off">
        @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email Id">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        @if($errors->has('email'))
        <div id="b">{{$errors->first('email')}}</div>
        @endif

        <div class="row">
          <div class="col-12">
            <button type="submit" id="submit" class="btn btn-primary btn-block">Request new password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      @if(session()->has('error'))
        <div id="b">
        {{ session()->get('error') }}
        </div>
        @endif

      <p align="center" class="mt-3 mb-1">
        <a href="{{ url('login') }}">Login</a>
      </p>
      </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<!-- jQuery -->
<script src="{{url('public/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{url('public/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('public/assets/dist/js/adminlte.min.js')}}"></script>
</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
