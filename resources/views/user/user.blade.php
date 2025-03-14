
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Show All User Records</title>
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
                  <h2 id="center" class=""> All User Records </h2>
                </div> 

                <!-- /.card-header -->
                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Gender</th>
                      <th>Email</th>
                      <th>Mobile No.</th>
                      <th>Image</th>
                      <th>City</th>
                      <th>Address</th>
                      <th>Lane</th>
                      <th>Landmark</th>
                      <th>PinCode</th>
                      <th>Status</th>
                      <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($view as $dis)
                    <tr>
                      <td>{{$dis->id}}</td>
                      <td>{{$dis->name}}</td>
                      <td>{{$dis->gender}}</td>
                      <td>{{$dis->email}}</td>
                      <td><?php if($dis->phone == "0"){echo "Empty";}else{echo $dis->phone;} ?></td>
                      <td><?php if($dis->image == "0"){echo "Empty";}else{echo $dis->image;} ?></td>
                      <td><?php if($dis->city == "0"){echo "Empty";}else{echo $dis->city;} ?></td>
                      <td><?php if($dis->address == "0"){echo "Empty";}else{echo $dis->address;} ?></td>
                      <td><?php if($dis->lane == "0"){echo "Empty";}else{echo $dis->lane;} ?></td>
                      <td><?php if($dis->landmark == "0"){echo "Empty";}else{echo $dis->landmark;} ?></td>
                      <td><?php if($dis->pincode == "0"){echo "Empty";}else{echo $dis->pincode;} ?></td>
                      <td><?php if($dis->status == "0"){echo "Not Verified";}else{echo "Verified";} ?></td>
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
          window.location.href = "{{url('deleteCustomer')}}/"+delid;
      }                    
    }
</script>

{{-- ----------------------------------------------------------------------------------------------------------------- --}}

@if (Session::has('abcd'))
        <script>
            alert_value("{{Session::get('abcd')}}");
        </script>
@endif