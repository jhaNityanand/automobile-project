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
  <style>
    #tbl_btn:hover {
        background-color: black;
        color: white;
    }
    #btn_can1{
      font-size: 16px;
      font-family: Times New Roman;
      font-weight: bold;
      color: white;
    }
    #btn_can1:hover {
        background-color: black;
        color: white;
    }
  </style>
</head>
<body>
<div class="">
<section id="" class="content">
    <div class="container-fluid">
        <div class="col-20">
          <div class="card">
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                    <th>City Id</th>
                    <th>City Name</th>
                    <th>Total User</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($view as $view)
                    <tr>
                        <td>{{$view->id}}</td>
                        <td>{{$view->name}}</td>
                        <td>{{$view->total_user}}</td>
                        <td>
                        <button id="tbl_btn" onclick="send_upd('{{$view->id}}')" type="button" class="btn btn-success"><span class="fas fa-edit"></span></button>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <button id="tbl_btn" onclick="send_del('{{$view->id}}')" type="button" class="btn btn-danger"><span class="fas fa-trash"></span></button>
                        </td>
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
