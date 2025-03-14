<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('public/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ url('public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ url('public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ url('public/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('public/assets/dist/css/adminlte.min.css') }}">
</head>
<body>
<div class="">
<section id="" class="content">
    <div class="container-fluid">
        <div class="col-20">
          <div class="card">
            <div class="card-header">
                <h3 id="head" class=""> Order Delivered Records </h3>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
              <thead>
                    <tr>
                      <th>Id</th>
                      <th>Order Date</th>
                      <th>Customer</th>
                      <th>Product</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Delivered Date</th>
                      <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($view as $dis)
                    @php
                        $user = DB::table("user_register")->where("id", $dis->user_id)->get();
                    @endphp
                    <tr>
                      <td>{{$dis->id}}</td>
                      <td>{{date('d M Y', strtotime($dis->order_date))}}</td>
                      @foreach ($user as $user)
                        <td>{{$user->name}}</td>
                      @endforeach

                      <td>
                        @php $product_name = explode(",", $dis->product_name); @endphp
                        @php $serial = 1; @endphp
                        @foreach ($product_name as $product_name)
                        <b>{{ $serial++ }}.</b> {{ $product_name }} <br>
                        @endforeach
                      </td>
                      <td>
                        @php $price = explode(",", $dis->price); @endphp
                        @foreach ($price as $price)
                          ₹ {{ $price }}.00 <br>
                        @endforeach
                      </td>
                      <td>
                        @php $quantity = explode(",", $dis->quantity); @endphp
                        @foreach ($quantity as $quantity)
                          {{ $quantity }} <br>
                        @endforeach
                      </td>

                      <td style="color: green;">{{date('d M Y', strtotime($dis->updated_at))}}</td>
                      <td><b>{{$dis->status == 1 ? "Success" : ""}}</b></td>
                      </tr>
                        @endforeach
                    </tbody>
              </table>
              </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
  </section>
</div>
</body>
</html>

<!-- jQuery -->
<script src="{{ url('public/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('public/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

@include("layout-1.datatable")
