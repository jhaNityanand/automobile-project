
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Show All Rating Records</title>
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

@include('layout-1.top')

<!-- Content Wrapper. Contains page content -->
<div id="" class="content-wrapper">
  <!-- Main content -->
    <section id="" class="content">
        <br>
        <div class="container-fluid">
            <div class="col-20">
              <div class="card">
                <div class="card-header">
                  <h2 id="center" class=""> All Rating Records </h2>
                </div> 

                <!-- /.card-header -->
                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Customer Name</th>
                      <th>Product Name</th>
                      <th>Rating</th>
                      <th>Message</th>
                      <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($view as $dis)
                    <tr>
                      <td>{{$dis->id}}</td>
                      <td>{{$dis->user_name}}</td>
                      <td>{{$dis->p_name}}</td>
                      <td style="color: green;">
                      @php
                        if($dis->rating){
                            for($i = 1 ; $i <= $dis->rating; $i++){
                            echo '<i class="ion-android-star"></i>';
                            }
                        }
                    @endphp
                      </td>
                      <td>{{$dis->message}}</td>
                      <td><button id="tbl_btn" onclick="send_del('{{$dis->id}}')" type="button" class="btn btn-danger"><span class="fas fa-trash"></span></button></td>
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

@include('layout-1.script')

@include('layout-1.datatable')

</body>
</html>

{{-- ----------------------------------------------------------------------------------------------------------------- --}}

<script>
    function send_del(delid){
      if(confirm("Are You Sure?")){
          window.location.href = "{{url('deleteRating')}}/"+delid;
      }                    
    }
</script>

{{-- ----------------------------------------------------------------------------------------------------------------- --}}

@if (Session::has('abcd'))
        <script>
            alert_value("{{Session::get('abcd')}}");
        </script>
@endif