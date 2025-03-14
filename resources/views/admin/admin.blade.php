
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Show All Admin Records</title>
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

                <div class="card-body">
                <div class="text-center">
                    <h1 id="hide">All Admin Records</h1>
                    <a href="{{url('register')}}" class="hide"><button type="button" id="modal_btn" class="float-right btn btn-primary">Add New Admin</button></a>
                </div>
                <br><br>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th></th>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Gender</th>
                      <th>Mobile Number</th>
                      <th>Email</th>
                      <th>Status</th>
                      <th><label class="hide">Action</label></th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $serial = 1;
                        @endphp
                        @foreach ($view as $dis)
                    <tr>
                        <td></td>
                      <td>{{$serial++;}}</td>
                      <td>{{$dis->name}}</td>
                      <td>{{$dis->gender}}</td>
                      <td>{{$dis->phone}}</td>
                      <td>{{$dis->email}}</td>
                      <td><?php if($dis->status == "0"){echo "In-Active";}else{echo "Active";} ?></td>
                      <td class="hide"><button id="tbl_btn" onclick="send_del('{{$dis->id}}')" type="button" class="hide btn btn-danger"><span class="fas fa-trash"></span></button></td>
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

@if(Session::has('mesg'))
<script>alert_value('{{Session::get("mesg")}}')</script>
@endif

{{-- ----------------------------------------------------------------------------------------------------------------- --}}

<script>
    $(document).ready(function(){
       /*  $(".hide").hide(); */
    });

    var a = "{{session('id')}}";

    if(a == 1){
        $("#hide").hide();
        $(".hide").show();
    }else{
        $(".hide").hide();
    }

    function send_del(delid){
      if(confirm("Are you sure delete selected Brand???"))
      {
          window.location.href = "{{url('deleteAdmin')}}/"+delid
      }
    }
</script>

{{-- ----------------------------------------------------------------------------------------------------------------- --}}

