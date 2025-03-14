@include("layout-2.top")

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

<br>
 <!-- Begin Uren's Breadcrumb Area -->
 <div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>My Orders</h2>
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
                                    <th class="uren-product_remove">Sr. No.</th>
                                    <th class="uren-product-thumbnail">Order Date & Time</th>
                                    <th class="cart-product-name">Product Name</th>
                                    <th class="uren-product-price">Product Price</th>
                                    <th class="uren-product-price">Quantity</th>
                                    <th class="uren-product-price">Total Price</th>
                                    <th class="uren-product-stock-status">Status</th>
                                    <th class="uren-cart_btn">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $serial = 1; @endphp
                                @foreach ($data as $view)
                                <tr>
                                    <td class="uren-product_remove">{{$serial++;}}</td>
                                    <td class="uren-product-name">{{date("d M Y h:i A", strtotime($view->order_date))}}</td>
                                    
                                    <td class="uren-product-name">
                                      @php $product_name = explode(",", $view->product_name); @endphp
                                      @foreach ($product_name as $product_name)
                                        {{ $product_name }} <br>
                                      @endforeach
                                    </td>
                                    <td class="uren-product-name">
                                      @php $price = explode(",", $view->price); @endphp
                                      @foreach ($price as $price)
                                        ₹ {{ $price }}.00 <br>
                                      @endforeach
                                    </td>
                                    <td class="uren-product-name">
                                      @php $quantity = explode(",", $view->quantity); @endphp
                                      @foreach ($quantity as $quantity)
                                        {{ $quantity }} <br>
                                      @endforeach
                                    </td>
                                    <td class="uren-product-name">
                                      @php $total_price = explode(",", $view->total_price); @endphp
                                      @foreach ($total_price as $total_price)
                                        ₹ {{ $total_price }}.00 <br>
                                      @endforeach
                                    </td>
                                    
                                    <?php if($view->status == 0){ ?>
                                        <td class="uren-product_remove""><label style="color: blue; font-size: 18px;"><b>Pending</b></label></td>
                                    <?php }else if($view->status == 1){ ?>
                                        <td class="uren-product_remove""><label style="color: green; font-size: 18px;"><b>Delivered</b></label></td>
                                    <?php }else if($view->status == 2){ ?>
                                        <td class="uren-product_remove""><label style="color: red; font-size: 18px;"><b>Cancled</b></label></td>
                                    <?php }else{ ?>
                                        <td class="uren-product_remove""><label style="color: red; font-size: 18px;"><b>Returned</b></label></td>
                                    <?php } ?>

                                    <?php if($view->status == 0){ ?>
                                        <td class="uren-product_remove""><button onclick="can('{{$view->id}}')" class="btn btn-ft rounded-5 btn-outline-danger"><b>Cancelled</b></button></td>
                                    <?php }else if($view->status == 1){ ?>
                                        <td class="uren-product_remove""><button onclick="ret('{{$view->id}}')" class="btn btn-ft rounded-5 btn-outline-primary"><b>Returned</b></button></td>
                                    <?php }else{ ?>
                                        <td class="uren-product_remove""><button onclick="del('{{$view->id}}')" class="btn btn-ft rounded-5 btn-outline-secondary"><b>Deleted</b></button></td>
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

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Order Return Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Product Return OR Order Return</h5>
        <button type="button" class="close ret_can" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{url('returnOrder')}}" method="POST" class="reset" autocomplete="off">
          @csrf
        <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1"><b>Reason : </b></label>
                  <input type="hidden" name="id" id="id_ret">
                  <textarea name="reason" placeholder="Product Return OR Order Return Reason" class="form-control" rows="5" required></textarea>
                  @if($errors->has('reason'))
                  <div style="color: red;">{{$errors->first('reason')}}</div>
                  @endif
                </div>
              </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-ft rounded-5 btn-outline-danger ret_can" data-dismiss="modal"><b>Cancel</b></button>
        <button type="submit" class="btn btn-ft rounded-5 btn-outline-primary"><b>Order Return</b></button>
      </div>
    </form>
    </div>
  </div>
</div>

<!-- Order Cancel Modal -->
<div class="modal fade" id="exampleModalCancel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Product Return OR Order Return</h5>
        <button type="button" class="close ret_can" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{url('cancelOrder')}}" method="POST" class="reset" autocomplete="off">
          @csrf
        <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1"><b>Reason : </b></label>
                  <input type="hidden" name="id" id="id_can">
                  <textarea name="reason" placeholder="Order Cancel Reason" class="form-control" rows="5" required></textarea>
                  @if($errors->has('reason'))
                  <div style="color: red;">{{$errors->first('reason')}}</div>
                  @endif
                </div>
              </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-ft rounded-5 btn-outline-danger ret_can" data-dismiss="modal"><b>Cancel</b></button>
        <button type="submit" class="btn btn-ft rounded-5 btn-outline-primary"><b>Order Cancel</b></button>
      </div>
    </form>
    </div>
  </div>
</div>

<!-- Model -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>

@include("layout-2.script")

@if (Session::has('status'))
    <script>
        alert_value("{{Session::get('status')}}");
    </script>
@endif

<script>
    $(".ret_can").click(function(){
        $("#exampleModal").modal("hide");
        $("#exampleModalCancel").modal("hide");
    });

    function del(id){
        if(confirm("Are You Sure?")){
            window.location.href="{{url('deleteOrder')}}/"+id
        }
    }
    function ret(id){
        if(confirm("Are You Sure?")){
            $("#id_ret").val(id);
            $(".reset").trigger("reset");
            $("#exampleModal").modal("show");
        }
    }
    function can(id){
        if(confirm("Are You Sure?")){
            $("#id_can").val(id);
            $(".reset").trigger("reset");
            $("#exampleModalCancel").modal("show");
        }
    }
</script>
