
@include("layout-2.top")

<body class="template-color-1">
    <div class="main-wrapper">
<br>
        <!-- Begin Loading Area -->
        <div class="loading">
            <div class="text-center middle">
                <div class="lds-ellipsis">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>
        <!-- Loading Area End Here -->

        <!-- Begin Uren's Breadcrumb Area -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <h2>Shop By Brand</h2>
                </div>
            </div>
        </div>
        <!-- Uren's Breadcrumb Area End Here -->

        <!-- Begin Uren's Shop Left Sidebar Area -->
        <div class="shop-content_wrapper">
            <div class="container-fluid">
               
                @foreach ($view as $data1)
                <div class="row">
                    <div class="col-lg-12">
                    <br>
                    <h2>{{ $data1->name }}</h2>
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
                                $product = DB::table('product')->select('*')->where("brand", $data1->name)->inRandomOrder()->limit(10)->get();
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
            </div>
        </div>
        <!-- Uren's Shop Left Sidebar Area End Here -->
<br>
        @include("layout-2.script")

    </div>
</body>
</html>

@if (Session::has('status'))
<script>
    alert_value("{{Session::get('status')}}");
</script>
@endif
