
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Show All Brands Records</title>
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
        {{-- <div class="card ">
            <div class="card-header text-right">
                <button type="button" id="modal_btn" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New Brands</button>
            </div>
        </div> --}}<br>
        <div class="container-fluid">
            <div class="col-20">
              <div class="card">
                {{-- <div class="card-header">
                  <h1 id="center" class=""> All Brands Records </h1>
                </div> --}}

                <!-- /.card-header -->
                <div class="card-body">
                <button type="button" id="modal_btn" class="float-right btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New Brands</button><br><br>
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                      <th>Brand Id</th>
                      <th>Brand Name</th>
                      <th>Brand Logo</th>
                      <th>Total Products</th>
                      <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($view as $dis)
                    <tr>
                      <td>{{$dis->id}}</td>
                      <td>{{$dis->name}}</td>
                      <td><img id="zoom" src = "public/image/brand/{{$dis->logo}}" width="100" height="70"></td>
                      <td>{{$dis->total_product}}</td>
                      <td><button id="tbl_btn" onclick="send_upd('{{$dis->id}}')" type="button" class="btn btn-success"><span class="fas fa-edit"></span></button>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <button id="tbl_btn" onclick="send_del('{{$dis->id}}')" type="button" class="btn btn-danger"><span class="fas fa-trash"></span></button></td>
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

<!-- Insert Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog">
    <form method="POST" id="myform" name="myform" autocomplete="off" enctype="multipart/form-data">
    @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><b>Add New Brands</b></h5>
          <button type="button" id="tbl_btn" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">X</button>
        </div>
        <div class="modal-body">
            <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Brand Name : </label>
                  <input type="text" name="brand" class="form-control" id="brand" placeholder="Brand Name">
                  <div id="cat_error" class="error"></div>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Brand Logo : </label>
                  <input type="file" name="logo" class="form-control" id="logo" accept="image/*">
                  <div id="cat_name_error" class="error"></div>
                </div>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" id="btn_can" class="btn btn-danger" data-bs-dismiss="modal">Cancle</button>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <button type="submit" id="submit" class="btn btn-success">Add New</button>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </div>
      </div>
    </form>
  </div>
  </div>
<!-- Modal -->

<!-- Update Modal -->
<div class="modal fade" id="exampleModalUpdate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

<div class="modal-dialog">
  <form method="POST" id="myform_update" name="myform_update" autocomplete="off" enctype="multipart/form-data">
  @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Update Brands</b></h5>
        <button type="button" id="tbl_btn" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body">
          <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Brand Name : </label>
                <input type="text" name="brand_update" class="form-control" id="brand_update" placeholder="Brand Name">
                <div id="cat_error" class="error update"></div>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Brand Logo : </label>
                <input type="file" name="logo_update" class="form-control" id="logo_update" accept="image/*">
              </div>

              <div id="img" class="form-group">
              </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="btn_can" class="btn btn-danger" data-bs-dismiss="modal">Cancle</button>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button type="submit" id="submit" class="btn btn-success">Update Brand</button>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </div>
    </div>
  </form>
</div>
</div>
<!-- Modal -->

</body>
</html>

<!-- Model -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<script src="//widget.cloudinary.com/global/all.js" type="text/javascript"></script>

<script>
    $("#modal_btn").click(function(){
        $("#myform").trigger("reset");
        $(".error").html('');
    });
</script>

{{-- ----------------------------------------------------------------------------------------------------------------- --}}

<script>
    $("#myform").submit(function(e){
          e.preventDefault();

          var name = $('#brand').val();
          var logo = $('#logo').val();

          if(name == ""){
              $("#cat_error").html("Brand Name is Required...");
          }
          if(logo == ""){
              $("#cat_name_error").html("Brand Logo is Required...");
          }

          if(name == '' || logo == ''){

        }else
        {
            var formData1 = new FormData(this);
            $.ajax({
            url: "{{ url('saveBrand') }}",
            type: "POST",
            data: formData1,
            contentType: false,
            processData: false,
            success: function(data){
                $("#myform").trigger("reset");
                $("#btn_can").trigger("click");
                alert_value(data);
                setTimeout(function () {
                    location.reload(true);
                }, 3000);            }
            });
        }
    });
</script>

{{-- ----------------------------------------------------------------------------------------------------------------- --}}

<script>
    function send_upd(updid){
        $(".error").html('');
      var update_id = updid;
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
      $.ajax({
            url: '{{url("viewUpdateBrand")}}',
            type: "POST",
            data: {"_token": "{{ csrf_token() }}", update_id:update_id},
            success: function(data){
                $("#brand_update").val(data.name);
                $('#img').html('<img  id="zoom" src = "public/image/brand/'+data.logo+'" width="100" height="80">')
                $('#exampleModalUpdate').modal('show');
            }
            });
    }
</script>

{{-- ----------------------------------------------------------------------------------------------------------------- --}}

<script>
    $("#myform_update").submit(function(e){
          e.preventDefault();

          var name_update = $('#brand_update').val();

          if(name_update == ""){
              $(".update").html("Brand Name is Required...");
          }

          if(name_update == ''){

        }else
        {
            var formData = new FormData(this);
            $.ajax({
            url: "{{ url('updateBrand') }}",
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
                }, 3000);            }
            });
        }
    });
</script>

{{-- ----------------------------------------------------------------------------------------------------------------- --}}

<script>
    function send_del(delid){
      var delete_id = delid;
      if(confirm("Are you sure delete selected Brand???"))
      {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{url("deleteBrand")}}',
                type: "POST",
                data: {"_token": "{{ csrf_token() }}", delete_id:delete_id},
                success: function(data){
                     alert_value(data);
                setTimeout(function () {
                    location.reload(true);
                }, 3000);                }
            });
      }
    }
</script>

{{-- ----------------------------------------------------------------------------------------------------------------- --}}

