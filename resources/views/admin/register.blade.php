@include("layout-1.style")
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('public/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{url('public/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('public/assets/dist/css/adminlte.min.css')}}">

  <style type="text/css">
    b.hover{
      color: blue;
    }
   /*  .card{
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
    #g{
      color: black;
      font-size: 17px;
      font-weight: bold;
      text-decoration: unset;
      font-family: times new romen;
    }
    #term{
      color: rgb(20, 50, 100);
      font-size: 20px;
      font-weight: bold;
      text-decoration: underline;
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
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="{{ url('/') }}"><b><i class="fas fa-car"></i> Automobile</b></a>
  </div>
  <div class="card">
    <div class="card-body register-card-body">
      <p id="p_admin" class="login-box-msg">Register a new membership</p>

      <form action="{{ url('saveRegister') }}" method="POST" autocomplete="off">
        @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Full name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        @if($errors->has('name'))
        <div id="b">{{$errors->first('name')}}</div>
        @endif

        <div class="input-group mb-3">
        <div class="form-control">
          <input type="radio" class="" name="gender" value="Male"><b id="g">Male</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="radio" class="" name="gender" value="Female"><b id="g">Female</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="radio" class="" name="gender" value="Other"><b id="g">Other</b>
        </div>
          <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-child"></span>
            </div>
          </div>
        </div>
        @if($errors->has('gender'))
        <div id="b">{{$errors->first('gender')}}</div>
        @endif

        <div class="input-group mb-3">
          <input type="tel" class="form-control" name="phone" pattern="[6789]{1}[0-9]{9}" placeholder="Mobile Number">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        @if($errors->has('phone'))
        <div id="b">{{$errors->first('phone')}}</div>
        @endif

        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        @if($errors->has('email'))
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
        @if($errors->has('password'))
        <div id="b">{{$errors->first('password')}}</div>
        @endif

        <div class="input-group mb-3">
          <input type="password" class="form-control" name="con_pass" placeholder="Retype password">
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
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="" id="term">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" id="submit" disabled class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <div class="text-center">
            <a href="{{url('adminData')}}"><button type="submit" id="submit" class="btn btn-secondary">Back</button></a>
          </div>
      </div>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
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
   /*  setInterval(
            function () {
                var colors = Math.floor(Math.random()*16777215).toString(16);
                var abc = document.getElementById("abc");
                abc.style.color = "#"+colors;
            },1000); */

    $(document).ready(function(){
        $("#agreeTerms").change(function(){
            if(!this.checked){
                $("#submit").prop('disabled', true);
            }else{
                $("#submit").prop('disabled', false);
            }
        });

        $("#term").click(function(){
            $(this).css("background-color", "yellow");
            alert('Are you sure for register a new member?');
        });
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

