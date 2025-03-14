<!-- Begin Uren's Header Main Area -->
<header class="header-main_area bg--sapphire">
    <div class="header-top_area d-lg-block d-none">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-7 col-lg-8">
                    <div class="main-menu_area position-absolute">
                        <nav class="main-nav">
                            <ul>
                                <li class="dropdown-holder active">
                                    <a href="{{ url('/') }}">Home</a>
                                </li>
                                <li class="megamenu-holder "><a href="#">Shop <i class="ion-ios-arrow-down"></i></a>
                                    <ul class="hm-megamenu">
                                        <li><span class="megamenu-title"><a href="{{ url('allBrand') }}">Brand</a></span>
                                            <ul>
                                            @php
                                                $view = DB::table('brand')->select('*')->inRandomOrder()->limit(6)->where("total_product", ">", 0)->get();
                                                $view1 = DB::table('category')->select('*')->inRandomOrder()->limit(6)->where("total_product", ">", 0)->get();

                                                $user_id = Session::get('user_id_login');
                                                if($user_id){
                                                    $count_wish = DB::table('wish')->where("user_id", $user_id)->count('user_id');
                                                    $count_cart = DB::table('cart')->where("user_id", $user_id)->count('user_id');
                                                }else{
                                                    $count_cart = 0;
                                                    $count_wish = 0;
                                                }

                                                $select_cart = DB::table("cart")->where("cart.user_id", $user_id)
                                                    ->select("product.id as p_id", "product.name as p_name", "product.price as p_price", "product.image as p_image")
                                                    ->join("product", "cart.product_id", "=", "product.id")
                                                    ->get();

                                                $select_wish = DB::table("wish")->where("wish.user_id", $user_id)
                                                    ->select("product.id as p_id", "product.name as p_name", "product.price as p_price", "product.image as p_image", "product.status as p_status")
                                                    ->join("product", "wish.product_id", "=", "product.id")
                                                    ->get();
                                            @endphp
                                            @foreach($view as $value)
                                                <li><a href="{{url('brandPage')}}/{{ $value->id }}">{{ $value->name }}</a></li>
                                            @endforeach
                                            </ul>
                                        </li>
                                        <li><span class="megamenu-title"><a href="{{ url('allCategory') }}">Category</a></span>
                                            <ul>
                                            @foreach($view1 as $value1)
                                                <li><a href="{{url('categoryPage')}}/{{ $value1->id }}">{{ $value1->name }}</a></li>
                                            @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                </li>

                                <li class=""><a href="{{url('about')}}">About Us</a></li>
                                <li class=""><a href="{{url('feedback')}}">Feedback</a></li>
                                <li class=""><a href="{{url('contact')}}">Contact Us</a></li>

                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-4">
                    <div class="ht-right_area">
                        <div class="ht-menu">
                            <ul>
                                <li><a href="#">My Account<i class="fa fa-chevron-down"></i></a>
                                    <ul style="font-weight:bold;" class="ht-dropdown ht-my_account">
                                        <li><a href="#">{{ session('user_name_login') }}</a></li>
                                        <li id="hide_register"><a href="{{url('userRegister')}}">Register</a></li>
                                        <li id="hide_login" class="active"><a href="{{url('login')}}">Login</a></li>
                                        <li id="hide_profile"><a href="{{ url('profile') }}">Profile</a></li>
                                        <li id="hide_order"><a href="{{url('myOrder')}}">My Order</a></li>
                                        <li id="hide_logout" class="active"><a href="{{ url('userLogout') }}">Logout <i class="fas fa-sign-out-alt"></i></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-top_area header-sticky bg--sapphire">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 col-lg-7 d-lg-block d-none">
                    <div class="main-menu_area position-absolute">
                        <nav class="main-nav">
                            <ul>
                                <li class="dropdown-holder active">
                                    <a href="{{ url('/') }}">Home</a>
                                </li>
                                <li class="megamenu-holder "><a href="#">Shop <i class="ion-ios-arrow-down"></i></a>
                                    <ul class="hm-megamenu">
                                        <li><span class="megamenu-title"><a href="{{ url('allBrand') }}">Brand</a></span>
                                            <ul>
                                            @foreach($view as $value)
                                                <li><a href="{{url('brandPage')}}/{{ $value->id }}">{{ $value->name }}</a></li>
                                            @endforeach
                                            </ul>
                                        </li>
                                        <li><span class="megamenu-title"><a href="{{ url('allCategory') }}">Category</a></span>
                                            <ul>
                                            @foreach($view1 as $value1)
                                                <li><a href="{{url('categoryPage')}}/{{ $value1->id }}">{{ $value1->name }}</a></li>
                                            @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                </li>

                                <li class=""><a href="{{url('about')}}">About Us</a></li>
                                <li class=""><a href="{{url('feedback')}}">Feedback</a></li>
                                <li class=""><a href="{{url('contact')}}">Contact Us</a></li>

                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-sm-3 d-block d-lg-none">
                    <div class="header-logo_area header-sticky_logo">
                        <a href="index.html">
                            <img src="{{url('public/public/assets/images/menu/logo/1.png')}}" alt="Uren's Logo">
                        </a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 col-sm-9">
                    <div class="header-right_area">
                        <ul>
                            <li class="mobile-menu_wrap d-flex d-lg-none">
                                <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn color--white">
                                    <i class="ion-navicon"></i>
                                </a>
                            </li>
                            <li class="minicart-wrap">
                                <a href="#miniCart" class="minicart-btn toolbar-btn">
                                    <div class="minicart-count_area">
                                        <span class="item-count">{{$count_cart}}</span>
                                        <i class="ion-bag"></i>
                                    </div>
                                    <div class="minicart-front_text">
                                    </div>
                                </a>
                            </li>
                            <li class="minicart-wrap">
                                <a href="#miniCart1" class="minicart-btn toolbar-btn">
                                    <div class="minicart-count_area">

                                        <span class="item-count">{{$count_wish}}</span>
                                        <i class="ion-android-favorite-outline"></i>
                                    </div>
                                    <div class="minicart-front_text">
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle_area">
        <div class="container-fluid">
            <div class="row">
                <div class="custom-logo_col col-12">
                    <div class="header-logo_area">
                        <a href="{{ url('/') }}">
                            <h1 style="color:white;"><span class="fas fa-car"></span></h1>
                        </a>
                    </div>
                </div>

                <div class="custom-cart_col col-12">
                    <div class="header-right_area">
                        <ul>
                            <li class="mobile-menu_wrap d-flex d-lg-none">
                                <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn color--white">
                                    <i class="ion-navicon"></i>
                                </a>
                            </li>
                            <li class="minicart-wrap">
                                <a href="#miniCart" class="minicart-btn toolbar-btn">
                                    <div class="minicart-count_area">
                                        <span class="item-count">{{$count_cart}}</span>
                                        <i class="ion-bag"></i>
                                    </div>
                                    <div class="minicart-front_text">
                                    </div>
                                </a>
                            </li>
                            <li class="minicart-wrap">
                                <a href="#miniCart1" class="minicart-btn toolbar-btn">
                                    <div class="minicart-count_area">
                                        <span class="item-count">{{$count_wish}}</span>
                                        <i class="ion-android-favorite-outline"></i>
                                    </div>
                                    <div class="minicart-front_text">
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="hm-form_area">
                        <form action="{{route('search_product')}}" method="post" class="hm-searchbox" autocomplete="off">
                            @csrf
                            <input type="text" placeholder="Find Your Product..." name="search" required>
                            <button class="header-search_btn" type="submit" name="btn_search"><i
                                class="ion-ios-search-strong"><span>Search</span></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="offcanvas-minicart_wrapper" id="miniCart">
        <div class="offcanvas-menu-inner">
            <a href="#" class="btn-close"><i class="ion-android-close"></i></a>
            <div class="minicart-content">
                <div class="minicart-heading">
                    <h4>Shopping Cart</h4>
                </div>
                <ul class="minicart-list">
                    @foreach ($select_cart as $sel)
                    <li class="minicart-product">
                        <a class="product-item_remove" href="{{url('deleteCart')}}/{{ $sel->p_id }}">
                            <i class="ion-android-close"></i></a>
                            @php $picture = explode(",", $sel->p_image) @endphp

                        <a href="{{url('singleProduct')}}?p_id={{$sel->p_id}}">
                            <div class="">
                                <img src="{{url('public/image/product')}}/{{ $picture[0] }}" alt="Product Image" width="120" height="80">
                            </div>
                        </a>

                        <div class="product-item_content">
                            <a class="product-item_title" href="{{url('singleProduct')}}?p_id={{$sel->p_id}}"><h6>{{$sel->p_name}}</h6></a>
                            <b style="color: rgb(190, 5, 61)" class="product-item_quantity">1 x ₹ {{$sel->p_price}}.00</b>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <br>
            <div class="minicart-btn_area">
                <a href="{{url('cart')}}" class="uren-btn uren-btn_dark uren-btn_fullwidth">Minicart</a>
            </div>
            <div class="minicart-btn_area">
                <a href="{{ url('checkout') }}/0/0" class="uren-btn uren-btn_dark uren-btn_fullwidth">Checkout</a>
            </div>
        </div>
    </div>

    <div class="offcanvas-minicart_wrapper" id="miniCart1">
        <div class="offcanvas-menu-inner">
            <a href="#" class="btn-close"><i class="ion-android-close"></i></a>
            <div class="minicart-content">
                <div class="minicart-heading">
                    <h4>Wishlist Products</h4>
                </div>
                <ul class="minicart-list">
                    @foreach ($select_wish as $sel)
                    <li class="minicart-product">
                        <a class="product-item_remove" href="{{url('deleteWish')}}/{{ $sel->p_id }}">
                            <i class="ion-android-close"></i></a>
                            @php $picture = explode(",", $sel->p_image) @endphp
                        <div class="">
                            <img src="{{url('public/image/product')}}/{{ $picture[0] }}" alt="Product Image" width="120" height="80">
                        </div>
                        <div class="product-item_content">
                            <h6 class="product-item_title">{{$sel->p_name}}</h6>
                            <?php if($sel->p_status == "In Stock"){ ?>
                                <b style="color: green" class="product-item_title">{{$sel->p_status}}</b>
                            <?php }else{ ?>
                                <b style="color: red" class="product-item_title">{{$sel->p_status}}</b>
                            <?php } ?>
                            <span class="product-item_quantity">₹ {{$sel->p_price}}.00</span>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <br>
            <div class="minicart-btn_area">
                <a href="{{url('wish')}}" class="uren-btn uren-btn_dark uren-btn_fullwidth">Minicart</a>
            </div>
        </div>
    </div>

    <div class="mobile-menu_wrapper" id="mobileMenu">
        <div class="offcanvas-menu-inner">
            <div class="container" style="margin-top: -32%;">
                <a href="#" class="btn-close"><i class="ion-android-close"></i></a>

                <nav class="offcanvas-navigation">
                    <ul class="mobile-menu">
                        <li class="menu-item-has-children active"><a href="{{ url('/') }}"><span
                                class="mm-text">Home</span></a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">
                                <span class="mm-text">My Account</span>
                            </a>
                            <ul class="sub-menu">
                                <li class="menu-item-has-children">
                                    <a href="#">
                                        <span class="mm-text">{{ session('user_name_login') }}</span>
                                    </a>
                                </li>
                                <li id="register_hide" class="menu-item-has-children">
                                    <a href="{{url('userRegister')}}">
                                        <span class="mm-text">Register</span>
                                    </a>
                                </li>
                                <li id="login_hide" class="menu-item-has-children">
                                    <a href="{{url('login')}}">
                                        <span class="mm-text">Login</span>
                                    </a>
                                </li>
                                <li id="profile_hide" class="menu-item-has-children">
                                    <a href="{{ url('profile') }}">
                                        <span class="mm-text">Profile</span>
                                    </a>
                                </li>
                                <li id="order_hide" class="menu-item-has-children">
                                    <a href="{{url('myOrder')}}">
                                        <span class="mm-text">Orders</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">
                                <span class="mm-text">Shop</span>
                            </a>
                            <ul class="sub-menu">
                                <li class="menu-item-has-children">
                                    <a href="{{ url('allBrand') }}">
                                        <span class="mm-text">Brand</span>
                                    </a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="{{ url('allCategory') }}">
                                        <span class="mm-text">Category</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children active"><a href="{{ url('about') }}"><span
                            class="mm-text">About Us</span></a>
                        </li>
                        <li class="menu-item-has-children active"><a href="{{ url('feedback') }}"><span
                            class="mm-text">Feedback</span></a>
                        </li>
                        <li class="menu-item-has-children active"><a href="{{ url('contact') }}"><span
                            class="mm-text">Contact Us</span></a>
                        </li>
                        <li id="logout_hide" class="menu-item-has-children active"><a href="{{ url('userLogout') }}"><span
                            class="mm-text">Logout <i class="fas fa-sign-out-alt"></i></span></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- Uren's Header Main Area End Here -->

