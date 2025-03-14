@include("layout-2.top")

<style>
#img_border{
    background-color: pink;
    border: 2px solid green;
}
</style>

<body class="template-color-1">
    <div class="main-wrapper">
    <br>
        <div class="uren-slider_area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-slider slider-navigation_style-2">
                            <!-- Begin Single Slide Area -->
                            <div class="single-slide animation-style-01 bg-1">
                                <div class="slider-content">
                                    <span>New thinking new possibilities</span>
                                    <h3>Car interior</h3>
                                    <h4>Starting at <span>$99.00</span></h4>
                                    <div class="uren-btn-ps_left slide-btn">
                                        <a class="uren-btn" href="#">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Slide Area End Here -->
                            <!-- Begin Single Slide Area -->
                            <div class="single-slide animation-style-02 bg-2">
                                <div class="slider-content slider-content-2">
                                    <span class="primary-text_color">Car, Truck, CUV &amp; SUV Tires</span>
                                    <h3>Wheels &amp; Tires</h3>
                                    <h4>Sale up to 20% off</h4>
                                    <div class="uren-btn-ps_left slide-btn">
                                        <a class="uren-btn" href="#">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Begin Uren's Shipping Area -->
        <div class="uren-shipping_area">
            <div class="container-fluid">
                <div class="shipping-nav">
                    <div class="row no-gutters">
                        <div class="shipping-grid">
                            <div class="shipping-item">
                                <div class="shipping-icon">
                                    <i class="ion-ios-paperplane-outline"></i>
                                </div>
                                <div class="shipping-content">
                                    <h6>Free Shipping</h6>
                                    <p>Free shipping on all US order</p>
                                </div>
                            </div>
                        </div>
                        <div class="shipping-grid">
                            <div class="shipping-item">
                                <div class="shipping-icon">
                                    <i class="ion-ios-help-outline"></i>
                                </div>
                                <div class="shipping-content">
                                    <h6>Support 24/7</h6>
                                    <p>Contact us 24 hours a day</p>
                                </div>
                            </div>
                        </div>
                        <div class="shipping-grid">
                            <div class="shipping-item">
                                <div class="shipping-icon">
                                    <i class="ion-ios-refresh-empty"></i>
                                </div>
                                <div class="shipping-content">
                                    <h6>100% Money Back</h6>
                                    <p>You have 30 days to Return</p>
                                </div>
                            </div>
                        </div>
                        <div class="shipping-grid">
                            <div class="shipping-item">
                                <div class="shipping-icon">
                                    <i class="ion-ios-undo-outline"></i>
                                </div>
                                <div class="shipping-content">
                                    <h6>90 Days Return</h6>
                                    <p>If goods have problems</p>
                                </div>
                            </div>
                        </div>
                        <div class="shipping-grid">
                            <div class="shipping-item">
                                <div class="shipping-icon">
                                    <i class="ion-ios-locked-outline"></i>
                                </div>
                                <div class="shipping-content last-child">
                                    <h6>Payment Secure</h6>
                                    <p>We ensure secure payment</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Uren's Shipping Area End Here -->


        <div class="uren-brand_area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title_area">
                            <h3>Shop By Brands</h3>
                        </div>
                        <div class="brand-slider uren-slick-slider img-hover-effect_area featured-categories_slider uren-slick-slider slider-navigation_style-1" data-slick-options='{
                        "slidesToShow": 6,
                        "arrows" : true
                       }' data-slick-responsive='[
                                                {"breakpoint":1200, "settings": {"slidesToShow": 5}},
                                                {"breakpoint":992, "settings": {"slidesToShow": 3}},
                                                {"breakpoint":767, "settings": {"slidesToShow": 3}},
                                                {"breakpoint":577, "settings": {"slidesToShow": 2}},
                                                {"breakpoint":321, "settings": {"slidesToShow": 1}}
                                            ]'>

                            @foreach($view as $data)
                            <div class="slide-item">

                                <div class="inner-slide">
                                    <div class="single-product">
                                        <a href="javascript:void(0)">
                                            <a href="{{url('brandPage')}}/{{$data->id}}"><h3>{{$data->name}}</h3></a>
                                        </a>
                                    </div>
                                </div>

                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <br>

                <h2 style="text-align: center; color:rgb(132, 241, 132);">Products</h2>

                @foreach ($view1 as $data1)
                <div class="row">
                    <div class="col-lg-12">
                        <br>
                        <div class="product-slider uren-slick-slider slider-navigation_style-1 img-hover-effect_area" data-slick-options='{
                        "slidesToShow": 6,
                        "arrows" : true
                        }' data-slick-responsive='[
                                                {"breakpoint":1501, "settings": {"slidesToShow": 4}},
                                                {"breakpoint":1200, "settings": {"slidesToShow": 3}},
                                                {"breakpoint":992, "settings": {"slidesToShow": 2}},
                                                {"breakpoint":767, "settings": {"slidesToShow": 1}},
                                                {"breakpoint":480, "settings": {"slidesToShow": 1}}
                                            ]'>
                            <?php
                                $product = DB::table('product')->select('*')->where("cat", $data1->name)->inRandomOrder()->limit(10)->get();
                            ?>
                            @foreach ($product as $data2)

                            <div class="product-slide_item">
                                <div class="inner-slide">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="{{url('singleProduct')}}?p_id={{$data2->id}}">
                                                @php $picture = explode(",", $data2->image) @endphp
                                                <img class="primary-img" src="{{url('public/image/product')}}/{{ $picture[0] }}" alt="Product Image" width="200" height="200">
                                                <img class="secondary-img" src="{{url('public/image/product')}}/{{ $picture[1] }}" width="200" height="200" alt="Product Image">
                                            </a>

                                            <div class="add-actions">
                                                <ul>
                                                    <li>
                                                        @php
                                                            if($data2->status == "In Stock"){
                                                                //
                                                            }else{
                                                                print('<button class="btn btn-outline-danger btn-ft" type="submit" name="btnlogin">'.$data2->status.'</button>');
                                                            }
                                                        @endphp
                                                    </li>
                                                    <li>
                                                        <?php
                                                            if($data2->status == "In Stock"){ ?>
                                                                <form action="{{ url('saveCart') }}" method="post">
                                                                @csrf
                                                                    <button type="submit" class="btn btn-outline-warning btn-ft" data-toggle="tooltip" data-placement="top" title="Add To Cart" type="submit" name="btn_cart" value="{{$data2->id}}" >
                                                                        <i class="ion-bag"></i>
                                                                    </button>
                                                                </form>
                                                            <?php
                                                            }else{
                                                                //
                                                            }
                                                        ?>
                                                    </li>
                                                    <li>
                                                        <form action="{{ url('saveWish') }}" method="post">
                                                        @csrf
                                                            <button class="btn btn-outline-warning btn-ft" data-toggle="tooltip" data-placement="top" title="Add To Wishlist" type="submit" name="wis" value="{{$data2->id}}" >
                                                                <i class="ion-android-favorite-outline"></i>
                                                            </button>
                                                        </form>
                                                    </li>
                                                    <li>
                                                        <button class="btn btn-outline-warning btn-ft" data-toggle="tooltip" data-placement="top" title="Quick View" type="button">
                                                            <a href="{{ url('singleProduct') }}?p_id={{$data2->id}}">
                                                                <i class="ion-android-open"></i>
                                                            </a>
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-desc_info">
                                                <div class="rating-box">
                                                    <ul>
                                                        @php
                                                            $review = DB::table('review')->select('*')->where("product_id", $data2->id)->avg('rating');
                                                            if($review){
                                                                for($i = 1 ; $i <= $review; $i++){
                                                                echo '<li><i class="ion-android-star"></i></li>';
                                                                }
                                                            }else{
                                                                for($i = 1 ; $i <= 3; $i++){
                                                                echo '<li><i class="ion-android-star"></i></li>';
                                                                }
                                                            }
                                                        @endphp
                                                    </ul>
                                                </div>
                                                <h6><a class="product-name" href="#">{{ $data2->name}}</a></h6>
                                                <div class="price-box">
                                                    <span class="new-price">₹ {{ $data2->price}}.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
                <br>


        <!-- Begin Uren's Banner Two Area -->
                <div class="section-title_area">
                    <h3>New Arrivals Products</h3>
                </div>
                <div class="row">
                @foreach($view2 as $pro)
                <div class="col-lg-4 col-md-6">
                        <div class="banner-item img-hover_effect">
                            <a href="{{url('singleProduct')}}?p_id={{$pro->id}}">
                                @php $picture = explode(",", $pro->image) @endphp
                                <img width="400" height="300" id="img_border" src="{{url('public/image/product')}}/{{ $picture[0] }}" alt="Product Image">
                            </a>
                            <div class="sticker-area-2">
                                <span style="background-color: red;" class="sticker-2"># -5%</span>
                                <span style="background-color: blue;" class="sticker"># New</span>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            <!-- Uren's Banner Two Area End Here -->
            <br><br>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title_area">
                            <h3>Shop By Category</h3>
                        </div>
                        <div class="brand-slider uren-slick-slider img-hover-effect_area featured-categories_slider uren-slick-slider slider-navigation_style-1" data-slick-options='{
                        "slidesToShow": 4,
                        "arrows" : true
                       }' data-slick-responsive='[
                                                {"breakpoint":992, "settings": {"slidesToShow": 3}},
                                                {"breakpoint":767, "settings": {"slidesToShow": 3}},
                                                {"breakpoint":577, "settings": {"slidesToShow": 2}},
                                                {"breakpoint":321, "settings": {"slidesToShow": 1}}
                                            ]'>

                            @foreach($view1 as $data1)
                            <div class="slide-item">

                                <div class="inner-slide">
                                    <div class="single-product">
                                        <a href="javascript:void(0)">
                                            <a href="{{url('categoryPage')}}/{{$data1->id}}"><h3>{{$data1->name}}</h3></a>
                                        </a>
                                    </div>
                                </div>

                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>

    @include("layout-2.script")

</body>
</html>

@if (Session::has('status'))
        <script>
            alert_value("{{Session::get('status')}}");
        </script>
@endif

<script>
    Var id =
    $.ajax({
        url: "url('/')",
        method: "POST",
        data: {},
    });
</script>
