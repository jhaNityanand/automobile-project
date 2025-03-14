@include("layout-1.style")
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User Registration</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('public/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{url('public/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{url('public/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{url('public/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{url('public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{url('public/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{url('public/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="{{url('public/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="{{url('public/plugins/bs-stepper/css/bs-stepper.min.css')}}">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="{{url('public/plugins/dropzone/min/dropzone.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('public/assets/dist/css/adminlte.min.css')}}">
  <style>
    body{
      margin: auto;
    }
    #b{
      color: rgb(20, 50, 100);
      font-size: 35px;
      font-weight: bold;
      font-family: times new romen;
    }
    #b:hover{
      color: green;
    }
    p{
      color: black;
      font-size: 18px;
      font-weight: bold;
      text-decoration: unset;
      font-family: times new romen;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">

<div class="wrapper">
<br>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="row justify-content-center">
          <div class="col-md-6">

            <div class="login-logo">
                <a href="{{ url('/') }}"><b id="b"><i class="fas fa-car"></i> Automobile</b></a>
              </div>

            <div class="card card-info">
              <div class="card-header">
                <label style="color: white;" class="card-title">Register a New Membership</label>
              </div>
              <div class="card-body">
              <form action="{{ url('saveUserRegister') }}" method="POST" autocomplete="on" enctype="multipart/form-data"">
              @csrf
              @if(session()->has('status'))
                    <div class="error">{{session()->get('status')}}</div>
             @endif
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                    <label>Name : </label>
                    <div class="input-group">
                      <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Full Name">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-user"></span>
                        </div>
                      </div>
                    </div>
                    @if($errors->has('name'))
                    <div class="error">{{$errors->first('name')}}</div>
                    @endif
                    </div>
                  </div>

                  <div class="col">
                    <div class="form-group">
                    <label>Email : </label>
                    <div class="input-group">
                      <input type="email" name="email" class="form-control" placeholder="Email">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-envelope"></span>
                        </div>
                      </div>
                    </div>
                    @if($errors->has('email'))
                    <div class="error">{{$errors->first('email')}}</div>
                    @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col">
                    <div class="form-group">
                    <label>Gender : </label>
                    <div class="input-group">
                    <div class="form-control">
                      <input type="radio" class="" name="gender" value="Male"><b>Male</b>&nbsp;&nbsp;
                      <input type="radio" class="" name="gender" value="Female"><b>Female</b>&nbsp;&nbsp;
                      <input type="radio" class="" name="gender" value="Other"><b>Other</b>
                    </div>
                      <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-child"></span>
                        </div>
                      </div>
                    </div>
                    @if($errors->has('gender'))
                    <div class="error">{{$errors->first('gender')}}</div>
                    @endif
                    </div>
                  </div>

                  <div class="col">
                    <div class="form-group">
                    <label>Password : </label>
                    <div class="input-group">
                      <input type="password" name="password" id="pawo" class="form-control" placeholder="Password">
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
                    <div class="error">{{$errors->first('password')}}</div>
                    @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col">
                    <div class="form-group">
                    <label>Status : </label>
                    <div class="input-group">
                        <select name="register" class="form-control" id="">
                            <option value="">Select Status</option>
                            <option value="Active" selected>Active</option>
                            <option value="In-Active">In-Active</option>
                        </select>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <i class="fas fa-chevron-circle-down"></i>
                        </div>
                      </div>
                    </div>
                    @if($errors->has('register'))
                    <div class="error">{{$errors->first('register')}}</div>
                    @endif
                    </div>
                  </div>

                  <div class="col">
                    <div class="form-group">
                    <label>Confirm Password : </label>
                    <div class="input-group">
                      <input type="password" name="con_pass" class="form-control" placeholder="Confirm Password">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-lock"></span>
                        </div>
                      </div>
                    </div>
                    @if($errors->has('con_pass'))
                    <div class="error">{{$errors->first('con_pass')}}</div>
                    @endif
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-8">
                    <div class="icheck-primary">
                      <input type="checkbox" id="agreeTerms" name="terms" value="agree" checked>
                      <label for="agreeTerms">
                      I agree to the <a href="" id="term">terms</a>
                      </label>
                    </div>
                  </div>
                </div>

                <div class="form-group text-center ">
                  <button type="button" id="btn_can" class="btn btn-danger" onClick="back()">Cancel</button>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <button type="submit" id="submit" class="btn btn-primary">Register</button>
              </div>
              <!-- /.card-body -->
               <!-- /.social-auth-links -->
                <p align="center" class="mb-1">
                    <a href="{{ url('login') }}">I Already have a Membership</a>
                </p>
            </div>
            <!-- /.card -->

          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
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

    function back(){
      if(confirm("Are You Sure?")){
        window.location.href="{{url('/')}}";
      }
    }
</script>
