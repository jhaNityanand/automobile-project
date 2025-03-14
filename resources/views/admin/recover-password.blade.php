@include("layout-1.style")
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Recover Password</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('public/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{url('public/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('public/assets/dist/css/adminlte.min.css')}}">

  <style type="text/css">
    h1{
      color: #006400;
      font-size: 25px;
      font-weight: bold;
      font-family: times new romen;
    }
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
        <p id="p" align="center"><a href="">{{ session('user_name')}}</a></p>
      <p id="p_admin" class="login-box-msg">You are only one step a way from your new password.</p>

      <form action="{{ url('saveRecover') }}" method="POST" autocomplete="off">
        @csrf
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
        @if($errors->has('password'))
        <div id="b">{{$errors->first('password')}}</div>
        @endif

        <div class="input-group mb-3">
          <input type="password" class="form-control" name="con_pass" placeholder="Confirm Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        @if($errors->has('con_pass'))
        <div id="b">{{$errors->first('con_pass')}}</div>
        @endif

        @if(session()->has('error'))
        <div id="b">
        {{ session()->get('error') }}
        </div>
        @endif

        <div class="row">
          <div class="col-12">
            <button type="submit" id="submit" class="btn btn-primary btn-block">Change password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p align="center" class="mt-3 mb-1">
        <a href="{{ url('admin') }}">Login</a>
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

<script>
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
