
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
                    <h2>Shop By Category : {{$name}}</h2>
                </div>
            </div>
        </div>
        <!-- Uren's Breadcrumb Area End Here -->

        <!-- Begin Uren's Shop Left Sidebar Area -->
        <div class="shop-content_wrapper">
            <div class="container-fluid">
                <div class="row justify-content-center">

                    <div class="col-lg-9 col-md-7 order-1 order-lg-2 order-md-2">
                        <div class="shop-toolbar">
                            <div class="product-view-mode">
                                <a class="grid-1" data-target="gridview-1" data-toggle="tooltip" data-placement="top" title="1">1</a>
                                <a class="grid-2" data-target="gridview-2" data-toggle="tooltip" data-placement="top" title="2">2</a>
                                <a class="active grid-3" data-target="gridview-3" data-toggle="tooltip" data-placement="top" title="3">3</a>
                                <a class="list" data-target="listview" data-toggle="tooltip" data-placement="top" title="List"><i class="fa fa-th-list"></i></a>
                            </div>
                        </div>
                        <div class="shop-product-wrap grid gridview-3 img-hover-effect_area row">
                        <?php $serial = 1; ?>

                            @foreach ($view as $pro)
                            
                            <div class="col-lg-4">
                                <div class="product-slide_item">
                                    <div class="inner-slide">
                                        <div class="single-product">
                                            <div class="product-img">
                                                <a href="{{url('singleProduct')}}?p_id={{$pro->id}}">
                                                    @php $picture = explode(",", $pro->image) @endphp
                                                    <img class="primary-img" src="{{url('public/image/product')}}/{{ $picture[0] }}" width="" height="200" alt="Product Image">
                                                    <img class="secondary-img" src="{{url('public/image/product')}}/{{ $picture[1] }}" width="" height="200" alt="Product Image">
                                                </a>
                                                <br><br>
                                                <div class="sticker-area-2">
                                                    <span class="sticker-2"># {{ $serial++ }}</span>
                                                </div>
                                                <div class="add-actions">
                                                    <ul>
                                                        <li>
                                                            @php
                                                                if($pro->status == "In Stock"){
                                                                    //
                                                                }else{
                                                                    print('<button class="btn btn-outline-danger btn-ft" type="submit" name="btnlogin">'.$pro->status.'</button>');
                                                                }
                                                            @endphp
                                                        </li>
                                                        <li>
                                                            <?php
                                                                if($pro->status == "In Stock"){ ?>
                                                                    <form action="{{ url('saveCart') }}" method="post">
                                                                    @csrf
                                                                        <button type="submit" class="btn btn-outline-warning btn-ft" data-toggle="tooltip" data-placement="top" title="Add To Cart" type="submit" name="btn_cart" value="{{$pro->id}}" >
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
                                                                <button class="btn btn-outline-warning btn-ft" data-toggle="tooltip" data-placement="top" title="Add To Wishlist" type="submit" name="wis" value="{{$pro->id}}" >
                                                                    <i class="ion-android-favorite-outline"></i>
                                                                </button>
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <button class="btn btn-outline-warning btn-ft" data-toggle="tooltip" data-placement="top" title="Quick View" type="button">
                                                                <a href="{{ url('singleProduct') }}?p_id={{$pro->id}}">
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
                                                                $review = DB::table('review')->select('*')->where("product_id", $pro->id)->avg('rating');
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
                                                    <h6><a class="product-name" href="#"><b>Name :</b> {{ $pro->name }}</a></h6>
                                                    <h6><a class="product-name" href="#"><b>Brand :</b> {{ $pro->brand }}</a></h6>
                                                    <h6><a class="product-name" href="#"><b>Sub-Category :</b> {{ $pro->sub_cat }}</a></h6>
                                                    <div class="price-box">
                                                        <span class="new-price"><b>Price :</b> ₹ {{ $pro->price }}.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="list-slide_item">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="{{url('singleProduct')}}?p_id={{$pro->id}}">
                                                @php $picture = explode(",", $pro->image) @endphp
                                                <img class="primary-img" src="{{url('public/image/product')}}/{{ $picture[0] }}" width="" height="200" alt="Product Image">
                                                <img class="secondary-img" src="{{url('public/image/product')}}/{{ $picture[1] }}" width="" height="200" alt="Product Image">
                                            </a>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-desc_info">
                                                <div class="rating-box">
                                                    <ul>
                                                        @php
                                                            $review = DB::table('review')->select('*')->where("product_id", $pro->id)->avg('rating');
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
                                                <div><a class="product-name" href="#"><b>Name : </b>{{ $pro->name }}</a></div>
                                                <div><a class="product-name" href="#"><b>Brand : </b>{{ $pro->brand }}</a></div>
                                                <div><a class="product-name" href="#"><b>Sub-Category : </b>{{ $pro->sub_cat }}</a></div>
                                                <div class="price-box">
                                                    <span class="new-price"><b>Price :</b> ₹ {{ $pro->price }}.00</span>
                                                </div>
                                                <div class="product-short_desc">
                                                    <p><b>Description : </b>{{ $pro->description}}</p>
                                                </div>
                                            </div>

                                            <div class="add-actions">
                                                <ul>
                                                    <li>
                                                        @php
                                                            if($pro->status == "In Stock"){
                                                                //
                                                            }else{
                                                                print('<button class="btn btn-outline-danger btn-ft" type="submit" name="btnlogin">'.$pro->status.'</button>');
                                                            }
                                                        @endphp
                                                    </li>
                                                    <li>
                                                        <?php
                                                            if($pro->status == "In Stock"){ ?>
                                                                <form action="{{ url('saveCart') }}" method="post">
                                                                @csrf
                                                                    <button type="submit" class="btn btn-outline-warning btn-ft" data-toggle="tooltip" data-placement="top" title="Add To Cart" type="submit" name="btn_cart" value="{{$pro->id}}" >
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
                                                            <button class="btn btn-outline-warning btn-ft" data-toggle="tooltip" data-placement="top" title="Add To Wishlist" type="submit" name="wis" value="{{$pro->id}}" >
                                                                <i class="ion-android-favorite-outline"></i>
                                                            </button>
                                                        </form>
                                                    </li>
                                                    <li>
                                                        <button class="btn btn-outline-warning btn-ft" data-toggle="tooltip" data-placement="top" title="Quick View" type="button">
                                                            <a href="{{ url('singleProduct') }}?p_id={{$pro->id}}">
                                                                <i class="ion-android-open"></i>
                                                            </a>
                                                        </button>
                                                    </li>
                                                </ul>
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
