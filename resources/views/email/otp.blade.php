@include("layout-1.style")
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Login Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('public/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{url('public/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('public/assets/dist/css/adminlte.min.css')}}">

  <style type="text/css">
  .card{
        border: 2PX solid black;
    }
    b{
      color: rgb(20, 50, 100);
      font-size: 35px;
      font-weight: bold;
      text-decoration: underline;
      font-family: times new romen;
    }
    #b{
      color: red;
      font-size: 16px;
      font-weight: bold;
      font-family: times new romen;
    }
    p{
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
    <p class="login-box-msg">OTP Send Your Email <a href=""><?php echo session('email'); ?></a></p>

      <form action="{{ url('saveOTP') }}" method="POST" autocomplete="off">
        @csrf
        <div class="form-group">
          <input type="tel" class="form-control" name="otp" placeholder="One Time Password" pattern="[0-9]{6}">
        </div>
        @if ($errors->has('otp'))
        <div id="b">{{$errors->first('otp')}}</div>
        @endif

        @if (session()->has('status'))
        <div id="b">{{session()->get('status')}}</div>
        @endif

        <div class="form-group text-center">
            <button type="submit" id="submit" class="btn btn-primary">Submit</button>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="{{url('userRegister')}}"><button type="button" id="submit" class="btn btn-secondary">Back</button></a>
         </div>
      </form>
      <!-- /.social-auth-links -->
      <p align="center" class="mb-1">
        <a href="{{ url('email') }}">Resend OTP</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{url('public/assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{url('public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('public/assets/dist/js/adminlte.min.js')}}"></script>
</body>
</html>

@if (Session::has('status'))
        <script>
            alert_value("{{Session::get('status')}}");
        </script>
@endif

