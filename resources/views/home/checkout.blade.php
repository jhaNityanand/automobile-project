
@include("layout-2.top")

<style>
.change{
    color: blue;
}
.change_name{
    color: green;
    font-weight: bold;
}
#h5{
    color: black;
}
</style>
<body class="template-color-1">
    <div class="main-wrapper">
<br>
        <!-- Begin Uren's Breadcrumb Area -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <h2>Checkout Page</h2>
                </div>
            </div>
        </div>
        <!-- Uren's Breadcrumb Area End Here -->
        <!-- Begin Uren's Checkout Area -->
        <div class="checkout-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="coupon-accordion">
                            <h3>Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3>
                            <div id="checkout_coupon" class="coupon-checkout-content">
                                <div class="coupon-info">
                                    <form action="javascript:void(0)">
                                        <p class="checkout-coupon">
                                            <input placeholder="Coupon code" type="text">
                                            <input class="coupon-inner_btn" value="Apply Coupon" type="submit">
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="{{ url('allCheckoutData') }}" method="POST" autocomplete="off">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <form action="javascript:void(0)">
                            <div class="checkbox-form">
                                <h3>Billing Details</h3>
                                <div class="row">
                                    
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label><b>Customer Name : </b><span style="color: red;" class="required">*</span></label>
                                            <input class="form-control" placeholder="Customer Name" type="text" name="name" value="{{ $user_record->name }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label><b>Email Id : </b><span style="color: red;" class="required">#</span></label>
                                            <input class="form-control" placeholder="Email Id" type="email" name="email" value="{{ $user_record->email }}" readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label><b>Mobile Number : </b><span style="color: red;" class="required">*</span></label>
                                            <input class="form-control" placeholder="Mobile Number" name="phone" type="tel" pattern="[789]{1}[0-9]{9}" value="<?php if($user_record->phone == "0"){echo "";}else{ echo $user_record->phone;} ?>" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label><b>Address : </b><span style="color: red;" class="required">*</span></label>
                                            <textarea class="form-control" name="address" rows="4" placeholder="Address" required><?php if($user_record->address == "0"){echo "";}else{ echo $user_record->address;} ?></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label><b>City : </b><span style="color: red;" class="required">*</span></label>
                                            <select class="form-control" name="city" required>
                                                <option value="" selected disabled>Select City</option>
                                                @foreach($city as $citys)
                                                    <option value="{{$citys->id}}" <?php if($user_record->city == $citys->id){echo "selected = 'selected'";} ?>>{{$citys->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label><b>Lane : </b><span style="color: red;" class="required">*</span></label>
                                            <input class="form-control" placeholder="Lane" name="lane" type="text" value="<?php if($user_record->lane == "0"){echo "";}else{ echo $user_record->lane;} ?>" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label><b>Landmark : </b><span style="color: red;" class="required">*</span></label>
                                            <input class="form-control" name="landmark" placeholder="Landmark" type="text" value="<?php if($user_record->landmark == "0"){echo "";}else{ echo $user_record->landmark;} ?>" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label><b>Pincode : </b><span style="color: red;" class="required">*</span></label>
                                            <input class="form-control" name="pincode" placeholder="Pincode" type="tel" pattern="[0-9]{6}" value="<?php if($user_record->pincode == "0"){echo "";}else{ echo $user_record->pincode;} ?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="your-order">
                            <h3>Your order</h3>
                            <div class="your-order-table table-responsive">
                                <table class="table" style="text-align: center;">
                                    <thead>
                                        <tr>
                                            <th class="cart-product-name"><b class="change">Product</b></th>
                                            <th class="cart-product-total"><b class="change">Unit Price(₹)</b></th>
                                            <th class="cart-product-total"><b class="change">Quantity</b></th>
                                            <th class="cart-product-total"><b class="change">Total Price(₹)</b></th>
                                        </tr>
                                    </thead>
                                    <thead>

                                    <?php if($qty == 0 || $pro == 0){ ?>
                                            @foreach($data as $value)
                                            <?php
                                                $pro = DB::table('product')->where("id", $value->product_id)->get();
                                            ?>
                                                <tr class="cart_item">
                                                @foreach($pro as $data)
                                                    <td class="cart-product-name change_name">{{ $data->name }}</td>
                                                    <td class="cart-product-name">₹ {{ $data->price }}.00</td>
                                                    
                                                    <input type="hidden" value="{{ $data->id }}" name="product_id[]">
                                                    <input type="hidden" value="{{ $data->name }}" name="product_name[]">
                                                    <input type="hidden" value="{{ $data->price }}" name="price[]">
                                                @endforeach
                                                    <td class="cart-product-name">{{ $value->product_qty }}</td>
                                                    <td class="cart-product-name change_name">₹ {{ $value->total_price }}.00</td>

                                                    <input type="hidden" value="{{ $value->product_qty }}" name="quantity[]">
                                                    <input type="hidden" value="{{ $value->total_price }}" name="total_price[]">
                                                </tr>
                                            @endforeach
                                    <?php  }else{ ?>
                                        <tr class="cart_item">
                                                    <td class="cart-product-name change_name">{{ $datas['name'] }}</td>
                                                    <td class="cart-product-name">₹ {{ $datas['price'] }}.00</td>
                                                    <td class="cart-product-name">{{ $datas['quentity'] }}</td>
                                                    <td class="cart-product-name change_name">₹ {{ $datas['total'] }}.00</td>
                                                </tr>
                                                <input type="hidden" value="{{ $datas['id'] }}" name="product_id[]">
                                                <input type="hidden" value="{{ $datas['name'] }}" name="product_name[]">
                                                <input type="hidden" value="{{ $datas['quentity'] }}" name="quantity[]">
                                                <input type="hidden" value="{{ $datas['price'] }}" name="price[]">
                                                <input type="hidden" value="{{ $datas['total'] }}" name="total_price[]">
                                    <?php } ?>

                                    </thead>
                                    <tfoot>
                                        <tr class="order-total">
                                            <th>Order Total</th>
                                            <td><strong><span class="amount"></span></strong></td>
                                            <td><strong><span class="amount"></span></strong></td>
                                            <?php if($qty == 0 || $pro == 0){ ?>
                                                <td><strong><span class="amount">₹ {{ $sum_cart }}.00</span></strong></td>
                                            <?php  }else{ ?>
                                                <td><strong><span class="amount">₹ {{ $datas['total'] }}.00</span></strong></td>
                                            <?php } ?>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="payment-method">
                                <div class="payment-accordion">
                                    <div id="accordion">
                                        <div class="card">
                                            <div class="card-header" id="#payment-1">
                                                <h4 id="h5" class="panel-title">Payment Type</h4>
                                            </div>
                                        </div>
                                    </div><br>
                                    <select class="form-control" name="pay_type" required>
                                        <option value="" selected disabled>Select Payment Type</option>
                                        @foreach($pay_type as $pay_type)
                                                <option value="{{$pay_type->id}}">{{$pay_type->name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="order-button-payment">
                                        <input class="btn btn-ft rounded-5 btn-outline-success" value="Place order" type="submit">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <!-- Uren's Checkout Area End Here -->

        @include("layout-2.script")

    </div>
</body>
</html>
