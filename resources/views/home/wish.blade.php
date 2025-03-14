@include("layout-2.top")

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

<br>
 <!-- Begin Uren's Breadcrumb Area -->
 <div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>Wishlist Products</h2>
        </div>
    </div>
</div>
<!-- Uren's Breadcrumb Area End Here -->
<!--Begin Uren's Wishlist Area -->
<div class="uren-wishlist_area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <form action="javascript:void(0)">
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="uren-product_remove">remove</th>
                                    <th class="uren-product_remove">Sr. No.</th>
                                    <th class="uren-product-thumbnail">images</th>
                                    <th class="cart-product-name">Product</th>
                                    <th class="uren-product-price">Unit Price</th>
                                    <th class="uren-product-stock-status">Stock Status</th>
                                    <th class="uren-cart_btn">add to cart</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $serial = 1; @endphp
                                @foreach ($data as $view)
                                <tr>
                                    <td class="uren-product_remove">
                                        <button class="btn btn-ft rounded-5 btn-outline-danger" onclick="del('{{$view->p_id}}')"><i class="fa fa-trash" title="Remove"></i></button>
                                    </td>
                                    <td class="uren-product_remove">{{$serial++;}}</td>
                                    <td class="uren-product-thumbnail">
                                        @php $picture = explode(",", $view->p_image) @endphp
                                        <img src="public/image/product/{{ $picture[0] }}" alt="Wishlist Thumbnail" width="220" height="150">
                                    </td>
                                    <td class="uren-product-name">{{$view->p_name}}</td>
                                    <td class="uren-product-price"><span class="amount">₹ {{$view->p_price}}.00</span></td>
                                    <td class="uren-product-price"><span class="amount">{{$view->p_status}}</span></td>
                                    <?php if($view->p_status == "In Stock"){ ?>
                                        <td class=""><button onclick="upd('{{$view->p_id}}')"><a href="#" class="btn btn-ft rounded-5 btn-outline-success" ><b>add to cart</b></a></button></td>
                                    <?php }else{ ?>
                                        <td><a href="" class="btn btn-ft rounded-5 btn-outline-success disabled" role="button" aria-disabled="true"><b>add to cart</b></a></td>
                                    <?php } ?>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Uren's Wishlist Area End Here -->
<br>

@include("layout-2.script")

@if (Session::has('status'))
    <script>
        alert_value("{{Session::get('status')}}");
    </script>
@endif

<script>
    function del(id){
        if(confirm("Are You Sure Delete Wishlist Selected Record?")){
            window.location.href="{{url('deleteWish')}}/"+id
        }
    }
    function upd(id){
        if(confirm("Are You Sure Add Wishlist Record in Your Cart.")){
            window.location.href="{{url('addWishCart')}}/"+id
        }
    }
</script>
