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
  /* .card{
        border: 2PX solid black;
    } */
    b{
      color: rgb(20, 50, 100);
      font-size: 35px;
      font-weight: bold;
      font-family: times new romen;
    }
    b:hover{
      color: green;
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
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="{{ url('saveLogin') }}" method="POST" autocomplete="off">
        @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email Id">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        @if ($errors->has('email'))
        <div id="b">{{$errors->first('email')}}</div>
        @endif

        <div class="input-group mb-3">
          <input type="password" class="form-control" id="pawo" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span>
                <i id="slash" class="fa fa-eye-slash"></i>
                <i id="eye" class="fa fa-eye"></i>
              </span>
            </div>
          </div>
        </div>
        @if ($errors->has('password'))
        <div id="b">{{$errors->first('password')}}</div>
        @endif

        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" id="submit" class="btn btn-primary btn-block" disabled>Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      @if(session()->has('error'))
        <div id="b">
        {{ session()->get('error') }}
        </div>
        @endif

      <!-- /.social-auth-links -->
      <br>
      <p align="center" class="mb-1">
        <a href="{{ url('forgotPassword') }}">I forgot my password</a>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@if (Session::has('saveRecover'))
        <script>
            alert("{{Session::get('saveRecover')}}");
        </script>
@endif

<script>
    $("#remember").change(function(){
        if(this.checked){
            $("#submit").prop("disabled", false);
        }else{
            $("#submit").prop("disabled", true);
        }
    });

    $(document).ready(function(){
        $('#eye').hide();
        $('#slash').hover(function(){
            var x = document.getElementById('pawo');
            if(x.type === 'password'){
                x.type = "text";
            }else{
                x.type = "password";
            }
            $('#eye').show();
            $('#slash').hide();
            $('#eye').css('color', 'blue');
            $('#eye').css('background-color', 'red');
        }, function(){
            $('#eye').hide();
            $('#slash').show();
            $('#eye').css('color', '');
            $('#eye').css('background-color', '');
        });
    });
</script>
