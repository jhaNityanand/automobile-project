
@include("layout-2.top")

<body class="template-color-1">
    <div class="main-wrapper">
<br>
        <!-- Begin Uren's Breadcrumb Area -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <h2>Single Product</h2>
                </div>
            </div>
        </div>
        <!-- Uren's Breadcrumb Area End Here -->




        <!-- Begin Uren's Single Product Area -->
        <div class="sp-area">
            <div class="container-fluid">
                <div class="sp-nav">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="sp-img_area">
                                <div class="sp-img_slider slick-img-slider uren-slick-slider" data-slick-options='{
                                "slidesToShow": 1,
                                "arrows": false,
                                "fade": true,
                                "draggable": false,
                                "swipe": false,
                                "asNavFor": ".sp-img_slider-nav"
                                }'>

                                <?php foreach(explode(",", $single->image) as $picture){ ?>
                                    <div class="single-slide red zoom">
                                        <img src="{{url('public/image/product')}}/{{$picture}}" alt="Product Image" height="400">
                                    </div>
                                <?php } ?>

                                </div>
                                <div class="sp-img_slider-nav slick-slider-nav uren-slick-slider slider-navigation_style-3" data-slick-options='{
                                "slidesToShow": 3,
                                "asNavFor": ".sp-img_slider",
                                "focusOnSelect": true,
                                "arrows" : true,
                                "spaceBetween": 30
                                }' data-slick-responsive='[
                                        {"breakpoint":1501, "settings": {"slidesToShow": 3}},
                                        {"breakpoint":992, "settings": {"slidesToShow": 4}},
                                        {"breakpoint":768, "settings": {"slidesToShow": 3}},
                                        {"breakpoint":575, "settings": {"slidesToShow": 2}}
                                    ]'>

                                    <?php foreach(explode(",", $single->image) as $picture){ ?>
                                        <div class="single-slide red">
                                            <img src="{{url('public/image/product')}}/{{$picture}}" alt="Product Image" width="120" height="80">
                                        </div>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="sp-content">
                                <div class="sp-heading">
                                    <h5><a href="#">{{$single->name}}</a></h5>
                                </div>
                                <div class="rating-box">
                                    <ul>
                                        @php
                                            $review = DB::table('review')->select('*')->where("product_id", $single->id)->avg('rating');
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
                                <div class="sp-essential_stuff">
                                    <ul>
                                        <li>Brands : <a href="javascript:void(0)">{{$single->brand}}</a></li>
                                        <li>Category : <a href="javascript:void(0)">{{$single->cat}}</a></li>
                                        <li>Sub-Category : <a href="javascript:void(0)">{{$single->sub_cat}}</a></li>
                                        <li>Availability : <a href="javascript:void(0)">{{$single->status}}</a></li>
                                        <li>Price : <a href="javascript:void(0)" style="color: green;"><b>₹ {{$single->price}}.00</b></a></li>
                                    </ul>
                                </div>
                                
                                <div class="">
                                    <b>Product Code : </b><a href="javascript:void(0)"># {{$single->id}}</a>
                                </div>
                                <div class="quantity">
                                    <label>Quantity</label>
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" id="qty" value="1" type="text">
                                        <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                        <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                    </div>
                                </div>
                                <div class="qty-btn_area">
                                    <ul>
                                        <li>
                                            <?php
                                                if($single->status == "In Stock"){ ?>
                                                    <form action="{{ url('saveCart') }}" method="post">
                                                    @csrf
                                                        <button type="submit" class="btn btn-outline-warning btn-ft" data-toggle="tooltip" data-placement="top" title="Add To Cart" type="submit" name="btn_cart" value="{{$single->id}}" >
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
                                            <?php if($single->status){
                                                ($single->status == "In Stock")? print('<button class="btn btn-ft rounded-0 btn-outline-success" id="btn_buy" name="btn_buy" type="submit" value="'.$single->id.'">Buy Now</button>') : print(' <button class="btn btn-outline-danger btn-ft" type="submit" name="btnlogin">Out Of Stock</button>') ;?>
                                                <?php } ?>
                                        </li>

                                        {{-- <li>
                                            <a class="qty-cart_btn" href="cart.html">Buy Now</a>
                                        </li> --}}

                                        <li>
                                            <form action="{{ url('saveWish') }}" method="post">
                                            @csrf
                                                <button class="btn btn-outline-warning btn-ft" data-toggle="tooltip" data-placement="top" title="Add To Wishlist" type="submit" name="wis" value="{{$single->id}}" >
                                                    <i class="ion-android-favorite-outline"></i>
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Uren's Single Product Area End Here -->




        <!-- Begin Uren's Single Product Tab Area -->
        <div class="sp-product-tab_area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sp-product-tab_nav">
                            <div class="product-tab">
                                <ul class="nav product-menu">
                                    <li>
                                        <a class="active" data-toggle="tab" href="#description"><span>Description</span></a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#reviews"><span>Reviews ({{$count}})</span></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content uren-tab_content">
                                <div id="description" class="tab-pane active show" role="tabpanel">
                                    <div class="product-description">
                                        <ul>
                                            <li>
                                                <h4> Name:</h4><strong style="margin-left:100px"> {{$single->name}} </strong>
                                                <h6>Description:</h6><span style="margin-left:110px"> {{$single->description}} </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div id="reviews" class="tab-pane" role="tabpanel">
                                    <div class="tab-pane active" id="tab-review">
                                        <form action="{{url('saveReview')}}" method="POST" class="form-horizontal" id="form-review">
                                            @csrf
                                            <h2>Write a review</h2>
                                            <input type="hidden" name="user_name" value="{{session('user_name_login')}}">
                                            <input type="hidden" name="product_id" value="{{$_REQUEST['p_id']}}">
                                            <div class="form-group required second-child">
                                                <div class="col-sm-12 p-0">
                                                    <label class="control-label">Share your opinion</label>
                                                    <textarea class="review-textarea" name="message" id="message" required>{{old('message')}}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group last-child required">
                                                <div class="col-sm-12 p-0">
                                                    <div class="your-opinion">
                                                        <label>Your Rating</label>
                                                        <span>
                                                    <select name="star" id="star" class="star-rating">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </span>
                                                    </div>
                                                </div>
                                                <div class="uren-btn-ps_right">
                                                    <button type="submit" name="submit" class="uren-btn-2">Continue</button>
                                                </div>
                                            </div>
                                        </form>
                                        <br>
                                            <div class="review">
                                                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                                    <table class="table table-striped table-bordered">
                                                        @foreach ($view3 as $data3)
                                                        <tbody>
                                                            <tr>
                                                                <td style="width: 50%;"><strong>{{$data3->user_name}}</strong></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">
                                                                    <p>{{$data3->message}}</p>
                                                                    <div class="rating-box">
                                                                        <ul class="nav nav-list">
                                                                        <?php for($i = 1 ; $i <= $data3->rating ; $i++){ ?><li><i class="ion-android-star"></i></li><?php } ?>
                                                                        </ul>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        @endforeach
                                                    </table>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Uren's Single Product Tab Area End Here -->
        




        <!-- Begin Uren's Product Area -->
        <div class="uren-product_area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title_area">
                            <span></span>
                            <h3>Related Products</h3>
                        </div>
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
                            @foreach ($view2 as $data2)

                            <div class="product-slide_item">
                                <div class="inner-slide">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="{{url('singleProduct')}}?p_id={{$data2->id}}">
                                                @php $picture = explode(",", $data2->image) @endphp
                                                <img class="primary-img" src="{{url('public/image/product')}}/{{ $picture[0] }}" alt="Uren's Product Image" width="200" height="200">
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
            </div>
        </div>
        <!-- Uren's Product Area End Here -->





        <div class="uren-brand_area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title_area">
                            <h2 style="color:  rgb(171, 171, 241)">Shop By Brands</h2>
                        </div>
                        <br>
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
                <br><br>
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title_area">
                    <h2 style="color: rgb(171, 171, 241)">Shop By Category</h2>
                </div>
                <br>
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
        <br><br>
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
    $(document).ready(function(){
        $("#btn_buy").click(function(){
            var qty = $("#qty").val();
            var pro = $("#btn_buy").val();
            window.location.href="{{url('checkout')}}/"+qty+"/"+pro;
        });

        $("#myform").submit(function(e){
          e.preventDefault();

            var formData = new FormData(this);
            $.ajax({
            url: "{{ url('saveUpdateCart') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data){
                $("#myform").trigger("reset");
                $("#btn_can").trigger("click");
                alert_value(data);
                setTimeout(function () {
                    location.reload(true);
                }, 3000);
            }
            });
        });
    });
</script>
