@include("layout-2.top")

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

<br>
 <!-- Begin Uren's Breadcrumb Area -->
 <div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>Cart Products</h2>
        </div>
    </div>
</div>
<!-- Uren's Breadcrumb Area End Here -->
<!--Begin Uren's Wishlist Area -->
<div class="uren-wishlist_area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="uren-product_remove">remove</th>
                                    <th class="uren-product_remove">Sr. No.</th>
                                    <th class="uren-product-thumbnail">images</th>
                                    <th class="cart-product-name">Product</th>
                                    <th class="uren-product-price">Unit Price</th>
                                    <th class="uren-product-stock-status">Quantity</th>
                                    <th class="uren-cart_btn">Total</th>
                                    <th class="uren-product_remove">Update</th>
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
                                    <td class="uren-product_remove">{{$view->c_qty}}</td>
                                    <td class="uren-product-price"><span class="amount" id="amount">₹ {{$view->c_price}}.00</span></td>
                                    <td class="uren-product_remove">
                                        <button class="btn btn-ft rounded-5 btn-outline-success" onclick="upd('{{$view->p_id}}')"><i class="fa fa-edit" title="Update"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-5 ml-auto">
                <div class="cart-page-total">
                    <h2>Cart totals</h2>
                    <ul>
                        <li>Total Product : <span>{{ $count_cart }}</span></li>
                        <li>Total Price : <span>₹ {{ $sum_cart }}.00</span></li>
                    </ul><br>
                    <button class="btn btn-ft rounded-5 btn-outline-success" id="btn_chk" type="button"><b>Proceed to checkout</b></button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Uren's Wishlist Area End Here -->

@include("layout-2.script")

@if (Session::has('status'))
    <script>
        alert_value("{{Session::get('status')}}");
    </script>
@endif

<!-- Update Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog">
      <form id="myform" name="myform" autocomplete="off">
      @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><b>Update Cart</b></h5>
            <button type="button" id="tbl_btn" class="btn btn-ft rounded-5 btn-outline-danger" data-bs-dismiss="modal" aria-label="Close"><b>X</b></button>
          </div>
          <div class="modal-body">
                <center><b><label id="name_d"></label></b></center>
            <div class="card-body">
                <div class="form-group">
                  <b><label for="exampleInputEmail1">Quantity : </label></b>
                  <input type="number" class="form-control" name="qty" id="qty" placeholder="Quantity" required>
                </div>
                <div class="form-group">
                  <b><label for="exampleInputEmail1">Price(₹) : </label></b>
                  <input type="text" class="form-control" name="price_d" id="price_d" disabled>
                  <input type="hidden" class="form-control" name="id" id="id">
                  <input type="hidden" class="form-control" name="price" id="price">
                  <input type="hidden" class="form-control" name="name" id="name">
                </div>
            </div>
        </div>
          <div class="modal-footer">
            <button type="button" id="btn_can" class="btn btn-ft rounded-5 btn-outline-danger" data-bs-dismiss="modal"><b>Cancel</b></button>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button type="submit" id="submit" class="btn btn-ft rounded-5 btn-outline-success"><b>Update Cart</b></button>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </div>
        </div>
      </form>
    </div>
    </div>
  <!-- Modal -->

<!-- Model -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function del(id){
        if(confirm("Are You Sure Delete Wishlist Selected Record?")){
            window.location.href="{{url('deleteCart')}}/"+id
        }
    }
    function upd(pid){
        $.ajax({
            url: "{{ url('updateCart') }}",
            type: "POST",
            data: {"_token": "{{ csrf_token() }}", pid:pid},
            success: function(data){
                $('#name_d').html(data.name);
                $('#price_d').val("₹ "+data.price+".00                                                      (Per Product)");
                $('#id').val(data.id);
                $('#price').val(data.price);
                $('#name').val(data.name);
                $('#qty').val(data.qty);
                $('#exampleModal').modal('show');
            }
        });
    }

    $(document).ready(function(){
        $("#btn_chk").click(function(){
            var qty = 0;
            var pro = 0;
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
