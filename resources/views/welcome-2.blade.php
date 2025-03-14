
@include('layout-1.top')

<!-- Content Wrapper. Contains page content -->

<div id="" class="content-wrapper">

  <!-- Main content -->
  <section class="content">
    <br>
    <!-- <div class="card card-light">
        <div class="card-header text-center">
            <label for="">Admin Dashboard</label>
        </div>
    </div> -->
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->

      <div class="card card-light">
        <div class="card-header text-center">
            <label for="">General Reports</label>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
              <h3>{{ $product }}</h3>

              <p>Total Products</p>
            </div>
            <div class="icon">
              <i class="bg-primary ion ion-android-cart"></i>
            </div>
            <a href="{{url('productReport')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{ $order }}</h3>

              <p>Total Orders</p>
            </div>
            <div class="icon">
              <i class="bg-success ion ion-bag"></i>
            </div>
            <a href="{{url('orderReport')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{ $user }}</h3>

              <p>Total Users</p>
            </div>
            <div class="icon">
              <i class="bg-info ion ion-person-stalker"></i>
            </div>
            <a href="{{url('userReport')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        
      </div>

      <div class="card card-light">
        <div class="card-header text-center">
            <label for="">Order Related Reports</label>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-teal">
            <div class="inner">
              <h3>{{ $order_rec }}</h3>

              <p>Order Received</p>
            </div>
            <div class="icon">
              <i class="bg-teal ion ion-bag"></i>
            </div>
            <a href="{{url('orderStatus')}}/Received" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{ $order_del }}</h3>

              <p>Order Delivered</p>
            </div>
            <div class="icon">
              <i class="bg-warning ion ion-bag"></i>
            </div>
            <a href="{{url('orderStatus')}}/Delivered" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3>{{ $order_can }}</h3>

              <p>Order Canceled</p>
            </div>
            <div class="icon">
              <i class="bg-purple ion ion-bag"></i>
            </div>
            <a href="{{url('orderRegion')}}/Canceled" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{ $order_ret }}</h3>

              <p>Order Returned</p>
            </div>
            <div class="icon">
              <i class="bg-danger ion ion-bag"></i>
            </div>
            <a href="{{url('orderRegion')}}/Returned" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      
      <div class="card card-light">
        <div class="card-header text-center">
            <label for="">Other Reports</label>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-pink">
            <div class="inner">
              <h3>{{ $brand }}</h3>

              <p>Available Brands</p>
            </div>
            <div class="icon">
              <i class="bg-pink ion ion-ios-filing"></i>
            </div>
            <a href="{{url('brandReport')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-lime">
            <div class="inner">
              <h3>{{ $product_in }}</h3>

              <p>Product Instock</p>
            </div>
            <div class="icon">
              <i class="bg-lime ion ion-android-cart"></i>
            </div>
            <a href="{{url('productStock')}}/InStock" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              <h3>{{ $product_out }}</h3>

              <p>Product Outstock</p>
            </div>
            <div class="icon">
              <i class="bg-orange ion ion-android-cart"></i>
            </div>
            <a href="{{url('productStock')}}/OutStock" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        
      </div>

      <div class="card card-light">
        <div class="card-header text-center">
            <label for="">Display Reports in Chart</label>
        </div>
      </div>


        <div class="row">

          <div class="col-md-6">
            <!-- PIE CHART -->
            <div class="card card-purple">
              <div class="card-header">
                <h3 class="card-title">Pie Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div id="pie_brand" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <!-- PIE CHART -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Pie Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div id="pie_order" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></div>
              </div>
            </div>
          </div>

        </div>
    </div>
  </section>
</div>   

@include('layout-1.script')

@if (Session::has('abcd'))
        <script>
            alert_value("{{Session::get('abcd')}}");
        </script>
@endif

@if (Session::has('status'))
        <script>
            alert_value("{{Session::get('status')}}");
        </script>
@endif

<!-- jQuery -->
<script src="{{url('public/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{url('public/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{url('public/plugins/chart.js/Chart.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('public/assets/dist/js/adminlte.min.js')}}"></script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<script>
    $.ajax({
             url:"{{url('ajax-saveChart')}}",
             type:"post",
             data : { "_token":"{{csrf_token()}}" },
             success: function(result){
                     //alert(result['data2']);
                     drawChart(result['data1']);
                     drawChart2(result['data2']);
                 }
         });
 </script>

<script>
  google.load("visualization", "1", {packages:["corechart"]});

    function drawChart(value) 
    {
      //alert(value);
      var all = $.parseJSON(value);
      var data = google.visualization.arrayToDataTable(all["dis"]);
      var options = {
        title: 'Display Chart For ORDER',
        is3D: false,
      };
      var chart = new google.visualization.PieChart(document.getElementById('pie_order'));
      chart.draw(data, options);
    }

    function drawChart2(value) 
    {
      //alert(value);
      var all = $.parseJSON(value);
      var data = google.visualization.arrayToDataTable(all["dis2"]);
      var options = {
        title: 'Display Chart For BRAND',
        is3D: false,
      };
      var chart = new google.visualization.PieChart(document.getElementById('pie_brand'));
      chart.draw(data, options);
    }
</script>