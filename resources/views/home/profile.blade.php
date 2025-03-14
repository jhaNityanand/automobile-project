@include("layout-2.top")

    <style type="text/css">
        .my-custom-scrollbar
        {
            position: relative;
            height: 400px;
            overflow: auto;
        }
        .table-wrapper-scroll-y
        {
            display: block;
        }
        .color{
            color: black;
            font-family: 'Times New Roman', Times, serif;
            font-size: 16px;
        }

    .container {
      padding: 50px 10%;
    }

    .box {
      position: relative;
      background: #ffffff;
      width: 100%;
    }

    .box-header {
      color: #444;
      display: block;
      padding: 10px;
      position: relative;
      border-bottom: 1px solid #f4f4f4;
      margin-bottom: 10px;
    }

    .box-tools {
      position: absolute;
      right: 10px;
      top: 5px;
    }

    .dropzone-wrapper {
      border: 2px dashed #91b0b3;
      color: #92b0b3;
      position: relative;
      height: 100px;
    }

    .dropzone-desc {
      position: absolute;
      margin: 0 auto;
      left: 0;
      right: 0;
      text-align: center;
      width: 40%;
      top: 30px;
      font-size: 16px;
    }

    .dropzone,
    .dropzone:focus {
      position: absolute;
      outline: none !important;
      width: 100%;
      height: 100px;
      cursor: pointer;
      opacity: 0;
    }

    .dropzone-wrapper:hover,
    .dropzone-wrapper.dragover {
      background: #ecf0f5;
    }

    .preview-zone {
      text-align: center;
    }

    .preview-zone .box {
      box-shadow: none;
      border-radius: 0;
      margin-bottom: 0;
    }

    .btn-primary {
      background-color: crimson;
      border: 1px solid #212121;
    }
    .error{
        color: red;
        font-size: 16px;
        font-weight: bold;
        font-family: 'Times New Roman', Times, serif;
    }
 </style>

<body class="template-color-1">
    <div class="main-wrapper">
        <!-- Begin Uren's Page Content Area -->
        <main class="page-content">
            <!-- Begin Uren's Account Page Area -->
            <div class="account-page-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3">
                            <ul class="nav myaccount-tab-trigger" id="account-page-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="account-details-tab" data-toggle="tab" href="#account-details" role="tab" aria-controls="account-details" aria-selected="false">Account Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="account-profile-tab" data-toggle="tab" href="#account-profile" role="tab" aria-controls="account-profile" aria-selected="false">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="account-password-tab" data-toggle="tab" href="#account-password" role="tab" aria-controls="account-password" aria-selected="false">Change Password</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="account-address-tab" data-toggle="tab" href="#account-address" role="tab" aria-controls="account-address" aria-selected="false">Addresses</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="account-logout-tab" href="{{url('userLogout')}}" role="tab" aria-selected="false">Logout</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-9">
                            <div class="tab-content myaccount-tab-content" id="account-page-tab-content">

                                <div class="tab-pane fade" id="account-password" role="tabpanel" aria-labelledby="account-password-tab">
                                    <div class="myaccount-password">
                                    <h4 class="small-title">CHANGE PASSWORD</h4>
                                        <form action="{{url('updatePassword')}}" method="post" class="uren-form">
                                            @csrf
                                            <div class="uren-form-inner">
                                                <div class="single-input">
                                                    <label for="account-details-firstname">Old Password : <b style="color: red;">*</b></label>
                                                    <input type="password" name="old" id="account-details-firstname" placeholder="Old Password" required>
                                                </div>
                                                @if ($errors->has('old'))
                                                <div class="error">{{$errors->first('old')}}</div>
                                                @endif
                                                <div class="single-input">
                                                    <label for="account-details-email">Password : <b style="color: red;">*</b></label>
                                                    <input type="password" name="password" id="account-details-email" placeholder="Password" required>
                                                </div>
                                                @if ($errors->has('password'))
                                                <div class="error">{{$errors->first('password')}}</div>
                                                @endif
                                                <div class="single-input">
                                                    <label for="account-details-oldpass">Confirm Password : <b style="color: red;">*</b></label>
                                                    <input type="password" name="con_pass" id="account-details-oldpass" placeholder="Confirm Password" required>
                                                </div>
                                                @if ($errors->has('con_pass'))
                                                <div class="error">{{$errors->first('con_pass')}}</div>
                                                @endif
                                                <div class="single-input">
                                                    @if (session()->has('error'))
                                                    <div class="error">{{session()->get('error')}}</div>
                                                    @endif
                                                </div>
                                                <div class="single-input">
                                                    <button class="uren-btn uren-btn_dark" id="pass_upd" type="submit" name="btn_update" value=""><span>SAVE
                                                    CHANGES</span></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="tab-pane fade show active" id="account-details" role="tabpanel" aria-labelledby="account-details-tab">
                                    <div class="myaccount-details">
                                        <form action="{{url('updateAccount')}}" method="post" class="uren-form">
                                            @csrf
                                            <div class="uren-form-inner">
                                                <div class="single-input">
                                                    <label for="account-details-firstname">User Name : <b style="color: red;">*</b></label>
                                                    <input type="text" name="name" id="account-details-firstname" value="{{$view->name}}" placeholder="User Name">
                                                </div>
                                                @if ($errors->has('name'))
                                                <div class="error">{{$errors->first('name')}}</div>
                                                @endif
                                                <div class="single-input">
                                                    <label for="account-details-email">Email : <b style="color: red;">*</b></label>
                                                    <input disabled type="email" name="email" id="account-details-email" value="{{$view->email}}" placeholder="Email ID" required>
                                                </div>
                                                <div class="single-input">
                                                    <label for="account-details-oldpass">Mobile Number : <b style="color: red;">*</b></label>
                                                    <input type="tel" name="phone" id="account-details-oldpass" value="{{$view->phone ? $view->phone : ''}}" placeholder="Mobile Number" pattern="[789]{1}[0-9]{9}">
                                                </div>
                                                @if ($errors->has('phone'))
                                                <div class="error">{{$errors->first('phone')}}</div>
                                                @endif
                                                <div class="single-input">
                                                    <label for="account-details-email">Status : <b style="color: red;">*</b></label>
                                                    <select name="register" id="">
                                                        <option value="">Select Status</option>
                                                        <option value="Active" {{ $view->register == 'Active' ? 'selected' : '' }}>Active</option>
                                                        <option value="In-Active" {{ $view->register == 'In-Active' ? 'selected' : '' }}>In-Active</option>
                                                    </select>
                                                </div>
                                                @if ($errors->has('register'))
                                                <div class="error">{{$errors->first('register')}}</div>
                                                @endif
                                                <div class="single-input">
                                                    <button class="uren-btn uren-btn_dark" type="submit" name="btn_update" value=""><span>SAVE
                                                    CHANGES</span></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="account-profile" role="tabpanel" aria-labelledby="account-profile-tab">
                                    <div class="myaccount-profile">
                                        <form action="{{url('updateProfile')}}" method="post" class="uren-form" enctype="multipart/form-data">
                                        @csrf
                                            <div class="uren-form-inner">
                                                <div class="single-input">
                                                    <label for="account-details-firstname">Profile Picture : <b style="color: red;">*</b></label>
                                                    <div class="file-upload-wrapper">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                        <div class="form-group">
                                                        <img src="{{url('public/image/user/')}}/{{$view->image}}" width="250" height="150" alt="Profile Picture">
                                                            <div class="preview-zone hidden">
                                                            <div class="box box-solid">
                                                                <div class="box-body"></div>
                                                            </div>
                                                            </div>
                                                            <div class="dropzone-wrapper">
                                                            <div class="dropzone-desc">
                                                                <i class="glyphicon glyphicon-download-alt"></i>
                                                                <p>Choose an image file or drag it here.</p>
                                                            </div>
                                                            <input type="file" name="image" accept="image/*" class="dropzone">
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="account-details-email">Gender : <b style="color: red;">*</b></label>
                                                    <div style="text-align: center;" class="form-control">
                                                    <input type="radio" name="gender" value="Male" required {{ $view->gender == 'Male' ? 'checked' : '' }}> <b>Male</b>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input type="radio" name="gender" value="Female" required {{ $view->gender == 'Female' ? 'checked' : '' }}> <b>Female</b>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input type="radio" name="gender" value="Other" required {{ $view->gender == 'Other' ? 'checked' : '' }}> <b>Other</b>
                                                    </div>
                                                    @if ($errors->has('gender'))
                                                    <div class="error">{{$errors->first('gender')}}</div>
                                                    @endif
                                                </div>
                                                <div class="single-input">
                                                    <button class="uren-btn uren-btn_dark" type="submit" name="btn_update" value=""><span>SAVE
                                                    CHANGES</span></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="account-address" role="tabpanel" aria-labelledby="account-address-tab">
                                    <div class="myaccount-address">
                                    <p>The following addresses will be used on the checkout page by default.</p>
                                    <h4 class="small-title">BILLING ADDRESS</h4>
                                        <form action="{{url('updateAddress')}}" method="post" class="uren-form">
                                        @csrf
                                            <div class="uren-form-inner">
                                                <div class="single-input">
                                                    <label for="account-details-firstname">Address : <b style="color: red;">*</b></label>
                                                    <input type="text" name="address" id="account-details-firstname" value="{{ $view->address ? $view->address : ''}}" placeholder="Address" required>
                                                </div>
                                                @if ($errors->has('address'))
                                                <div class="error">{{$errors->first('address')}}</div>
                                                @endif

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="single-input">
                                                            <label for="account-details-email">Landmark : <b style="color: red;">*</b></label>
                                                            <input type="text" name="landmark" id="account-details-email" value="{{ $view->landmark ? $view->landmark : ''}}" placeholder="Landmark" required>
                                                        </div>
                                                        @if ($errors->has('landmark'))
                                                        <div class="error">{{$errors->first('landmark')}}</div>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="single-input">
                                                            <label for="account-details-oldpass">Lane : <b style="color: red;">*</b></label>
                                                            <input type="text" name="lane" id="account-details-oldpass" value="{{ $view->lane ? $view->lane : ''}}" placeholder="Lane" required>
                                                        </div>
                                                        @if ($errors->has('lane'))
                                                        <div class="error">{{$errors->first('lane')}}</div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="single-input">
                                                            <label for="account-details-oldpass">City : <b style="color: red;">*</b></label>
                                                            <select name="city" id="" required>
                                                                <option value="">Select City</option>
                                                                @foreach($city as $data)
                                                                    <option value="{{$data->id}}" {{$view->city==$data->id?'selected':''}}>{{$data->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        @if ($errors->has('city'))
                                                        <div class="error">{{$errors->first('city')}}</div>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="single-input">
                                                            <label for="account-details-oldpass">Pincode : <b style="color: red;">*</b></label>
                                                            <input type="text" pattern="[0-9]{6}" name="pincode" id="account-details-oldpass" value="{{ $view->pincode ? $view->pincode : ''}}" placeholder="Pincode" required>
                                                        </div>
                                                        @if ($errors->has('pincode'))
                                                        <div class="error">{{$errors->first('pincode')}}</div>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="single-input">
                                                    <button class="uren-btn uren-btn_dark" type="submit" name="btn_update" value=""><span>SAVE
                                                    CHANGES</span></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Uren's Account Page Area End Here -->
        </main>
        <!-- Uren's Page Content Area End Here -->
    </div>
</body>
</html>

@include("layout-2.script")

@if (Session::has('status'))
    <script>
        alert_value("{{Session::get('status')}}");
    </script>
@endif
@if (Session::has('old'))
    <script>
        alert("{{Session::get('old')}}");
    </script>
@endif

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>

<script>
    function readFile(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          var htmlPreview =
            '<img width="200" src="' + e.target.result + '" />' +
            '<p>' + input.files[0].name + '</p>';
          var wrapperZone = $(input).parent();
          var previewZone = $(input).parent().parent().find('.preview-zone');
          var boxZone = $(input).parent().parent().find('.preview-zone').find('.box').find('.box-body');

          wrapperZone.removeClass('dragover');
          previewZone.removeClass('hidden');
          boxZone.empty();
          boxZone.append(htmlPreview);
        };

        reader.readAsDataURL(input.files[0]);
      }
    }

    $(".dropzone").change(function() {
      readFile(this);
    });

    $("#pass_upd").click(function(){
        //
    });
</script>
