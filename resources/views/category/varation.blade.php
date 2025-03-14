
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Show All Payment Type Records</title>
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
@include('layout-1.style')

<!-- Content Wrapper. Contains page content -->
<br>
<div id="" class="content-wrapper">
  <!-- Main content -->
    <section id="" class="content">
        <div class="container-fluid">

        {{-- <h1>All Payment Type Records</h1> --}}

        <div class="row justify-content-center">
          <div class="col-md-12">
          <form id="myform" name="myform" autocomplete="off">
            @csrf
            <div class="card card-info">
              <div class="card-header">
                <label style="color: white;" class="card-title">Add New Payment Type</label>
              </div>
              <div class="card-body">

            <div class="row">
              <div class="form-group col">
                  <label>Select Varation : </label>
                  <div class="input-group">
                    <select name="varation" id="varation" class="form-control">
                        <option value="">Select Varation</option>
                        <option value="Color">Color</option>
                        <option value="Size">Size</option>
                    </select>
                  </div>
                  <div id="varation_error" class="error"></div>
                </div>

                <div class="form-group col">
                    <label>Varation Name : </label>
                    <div class="input-group">
                      <input type="text" name="name" id="name" class="form-control" placeholder="Varation Name">
                    </div>
                    <div id="cat_error" class="error"></div>
                  </div>
            </div>
                <div class="form-group text-center">
                    <button type="button" id="tbl_btn" class="btn btn-danger">Cancel</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="submit" id="submit" class="btn btn-primary">Add New</button>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
          </form>
            <!-- /.card -->
          </div>
        </div>

        <div id="load_data"></div>
    </div>
    </section>
</div>

@include('layout-1.script')

</body>
</html>

<!-- Update Modal -->
<div class="modal fade" id="exampleModalUpdate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog">
      <form id="myform_update" name="myform_update" autocomplete="off">
      @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><b>Update Payment Type</b></h5>
            <button type="button" id="tbl_btn" class="cancle btn btn-danger" data-bs-dismiss="modal" aria-label="Close">X</button>
          </div>
          <div class="modal-body">
              <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Payment Type Name : </label>
                    <input type="text" name="cat_update" class="form-control" id="cat_update" placeholder="Payment Type Name">
                    <div id="cat_error" class="update error"></div>
                  </div>
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" id="tbl_btn" class="cancle btn btn-danger" data-bs-dismiss="modal">Cancle</button>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button type="submit" id="submit" class="btn btn-success">Update Payment Type</button>
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
    $(".cancle").click(function(){
        $('#exampleModalUpdate').modal('hide');
    });
</script>

{{-- ---------------------------------------------------------------------------------------------------------------- --}}

<script>
    $(document).ready(function(){
        select_data();
    });

    $("#lee").click(function(){
        select_data();
    });

    $("#tbl_btn").click(function(){
        $("#name").val("");
    });

    function select_data()
        {
            $.ajax({
                url: "{{url('loadDataPayType')}}",
                type: "POST",
                data: {"_token": "{{ csrf_token() }}"},
                success: function (data){
                    $("#load_data").html(data);
                }
            });
        }
</script>

{{-- ---------------------------------------------------------------------------------------------------------------- --}}

<script>
    $("#myform").submit(function(e){
          e.preventDefault();

          var name = $('#name').val();

          if(name == ""){
              $('#cat_error').fadeIn();
              $("#cat_error").html("Payment Type Name is Required...");
              setTimeout(function(){
						$("#cat_error").fadeOut("slow");
					}, 2000);
          }

          if(name == ''){

        }else
        {
            var formData1 = new FormData(this);
            $.ajax({
            url: "{{ url('savePayType') }}",
            type: "POST",
            data: formData1,
            contentType: false,
            processData: false,
            success: function(data){
                $("#myform").trigger("reset");
                alert_value(data);
                select_data();
            }
            });
        }
    });
</script>

{{-- ----------------------------------------------------------------------------------------------------------------- --}}

<script>
    function send_del(delid){
      var delete_id = delid;
      if(confirm("Are you sure delete selected Payment Type???"))
      {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{url("deletePayType")}}',
                type: "POST",
                data: {"_token": "{{ csrf_token() }}", delete_id:delete_id},
                success: function(data){
                    alert_value(data);
                    select_data();
                }
            });
      }
    }
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
            url: '{{url("viewUpdatePayType")}}',
            type: "POST",
            data: {"_token": "{{ csrf_token() }}", update_id:update_id},
            success: function(data){
                $("#cat_update").val(data);
                $('#exampleModalUpdate').modal('show');
            }
            });
    }
</script>

{{-- ----------------------------------------------------------------------------------------------------------------- --}}

<script>
    $("#myform_update").submit(function(e){
          e.preventDefault();

          var name_update = $('#cat_update').val();

          if(name_update == ""){
              $(".update").html("Payment Type Name is Required...");
          }

          if(name_update == ''){

        }else
        {
            var formData = new FormData(this);
            $.ajax({
            url: "{{ url('updatePayType') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data){
                alert_value(data);
                $(".cancle").trigger("click");
                select_data();
            }
            });
        }
    });
</script>

{{-- ----------------------------------------------------------------------------------------------------------------- --}}
