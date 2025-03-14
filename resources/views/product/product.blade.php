
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Products Records</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
      .error{
          color: red;
          font-size: 16px;
          font-weight: bold;
          font-family: 'Times New Roman', Times, serif;
      }
      #modal_btn:hover {
        background-color: black;
        color: white;
     }
     #submit:hover {
        background-color: black;
        color: white;
     }
     #btn_can:hover {
        background-color: black;
        color: white;
     }
  </style>
</head>
<body>
@include('layout-1.top')

<!-- Content Wrapper. Contains page content -->
<div id="" class="content-wrapper">

    {{-- <h1>All Product Records</h1> --}}
  <!-- Main content -->
    <section class="content">

        <div class="card">
            <div class="card-header">
              <button type="button" id="modal_btn" onclick="multiple()" class="multiple float-left btn btn-danger">
                Multiple Delete
            </button>
            <button type="button" id="modal_btn" class="float-right btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add New Product
            </button>
        </div>
        </div>

    <div class="container-fluid">
    <div id="load_data"></div>

<!-- Insert Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg">
      <form method="POST" id="myform" name="myform" autocomplete="" enctype="multipart/form-data">
      @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="sub_head"><b>Add New Products</b></h5>
            <button type="button" id="tbl_btn" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">X</button>
          </div>
          <div class="modal-body">
              <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Name : </label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Product Name">
                    <div id="name_error" class="error"></div>
                  </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Description : </label>
                      <textarea name="description" class="form-control" id="description" cols="30" rows="4" placeholder="Description"></textarea>
                      <div id="description_error" class="error"></div>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Price : </label>
                          <input type="number" name="price" class="form-control" id="price" placeholder="₹ 00.00">
                      <div id="price_error" class="error"></div>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Brand Name : </label>
                      <select name="brand" id="brand" class="form-control">
                          <option value="">Select Brand</option>
                        @foreach ($view as $sel)
                            <option id="option" value="{{$sel->name}}">{{$sel->name}}</option>
                        @endforeach
                      </select>
                      <div id="brand_error" class="error"></div>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Category Name : </label>
                      <select name="cat" id="cat" class="cat form-control">
                        <option value="">Select Category</option>
                        @foreach ($data as $sel)
                            <option id="option" value="{{$sel->name}}">{{$sel->name}}</option>
                        @endforeach
                    </select>
                      <div id="cate_error" class="error"></div>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Sub-Category Name : </label>
                      <select name="sub_cat" id="sub_cat" class="sub_cat form-control">
                        <option value="">Select Sub-Category</option>
                        @foreach ($sub as $sel)
                            <option id="option" value="{{$sel->name}}">{{$sel->name}}</option>
                        @endforeach
                    </select>
                      <div id="sub_cat_error" class="error"></div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Image : </label>
                          <input id="image" type="file" name="image[]" id="image" class="form-control" accept="image/*" multiple>
                        <div id="image_error" class="error"></div>
                      </div>

                      <div id="upload_img" class="form-group">

                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Product Status : </label>
                        <select name="status" id="status" class="form-control">
                            <option value="">Select Status</option>
                            <option value="In Stock">In Stock</option>
                            <option value="Out of Stock">Out of Stock</option>
                        </select>
                        <div id="status_error" class="error"></div>
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

    <div class="modal-dialog modal-lg">
      <form method="POST" id="myform_update" name="myform_update" autocomplete="" enctype="multipart/form-data">
      @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="sub_head"><b>Update Products</b></h5>
            <button type="button" id="tbl_btn" class="cam_up btn btn-danger" data-bs-dismiss="modal" aria-label="Close">X</button>
          </div>
          <div class="modal-body">
              <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Name : </label>
                    <input type="text" name="name_u" class="form-control" id="name_u" placeholder="Product Name">
                    <div id="name_error_u" class="error"></div>
                  </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Description : </label>
                      <textarea name="description_u" class="form-control" id="description_u" cols="30" rows="4" placeholder="Description"></textarea>
                      <div id="description_error_u" class="error"></div>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Price : </label>
                          <input type="number" name="price_u" class="form-control" id="price_u" placeholder="₹ 00.00">
                      <div id="price_error_u" class="error"></div>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Brand Name : </label>
                      <select name="brand_u" id="brand_u" class="form-control">
                        @foreach ($view as $sel)
                            <option id="option" value="{{$sel->name}}">{{$sel->name}}</option>
                        @endforeach
                      </select>
                      <select name="brand_uu" id="brand_uu" hidden>
                        @foreach ($view as $sel)
                            <option value="{{$sel->name}}">{{$sel->name}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Category Name : </label>
                      <select name="cat_u" id="cat_u" class="cat form-control">
                        @foreach ($data as $sel)
                            <option id="option" value="{{$sel->name}}">{{$sel->name}}</option>
                        @endforeach
                    </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Sub-Category Name : </label>
                      <select name="sub_cat_u" id="sub_cat_u" class="sub_cat form-control">
                        @foreach ($sub as $sel)
                            <option id="option" value="{{$sel->name}}">{{$sel->name}}</option>
                        @endforeach
                    </select>
                    <div id="sub_cat_error_u" class="error"></div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Image : </label>
                          <input type="file" name="image_u[]" id="image_u" class="form-control" accept="image/*" multiple>
                          <div id="image_error_u" class="error"></div>
                      </div>

                      <center><div id="img" class="form-group">

                      </div></center>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Product Status : </label>
                        <select name="status_u" id="status_u" class="form-control">
                            <option value="In Stock">In Stock</option>
                            <option value="Out of Stock">Out of Stock</option>
                        </select>
                      </div>
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" id="btn_can" class="cam_up btn btn-danger" data-bs-dismiss="modal">Cancle</button>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button type="submit" id="submit" class="btn btn-success">Update Products</button>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </div>
        </div>
      </form>
    </div>
    </div>
  <!-- Modal -->

        </div>
    </section>
</div>
</body>
</html>

@include('layout-1.script')

<!-- Model -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<script src="//widget.cloudinary.com/global/all.js" type="text/javascript"></script>

{{-- ---------------------------------------------------------------------------------------------------------------- --}}

<script>
    $(document).ready(function(){
        select_data();
    });
    $("#lee").click(function(){
        select_data();
    });
    $(".float-right").click(function(){
        $("#myform").trigger("reset");
        $(".error").html('');
    });
    $(".cam_up").click(function(){
        $('#exampleModalUpdate').modal('hide');
    });
    $(".cam_up").click(function(){
        $('#exampleModalUpdate').modal('hide');
    });
</script>

{{-- ---------------------------------------------------------------------------------------------------------------- --}}

<script>
    function select_data()
        {
            $.ajax({
                url: "{{url('loadData')}}",
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
    $(".cat").change(function(){
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        var cat_name = $(this).val();
        $.ajax({
                  url: "{{ url('getDataCat') }}",
                  type: "POST",
                  data: {"_token": "{{ csrf_token() }}", c_name:cat_name},
                  success: function(data){
                      $(".sub_cat").html(data);
                  }
              });
    });
</script>

{{-- ---------------------------------------------------------------------------------------------------------------- --}}

<script>
  $(document).ready(function(){
      var limit = 6;
      var min = 2;
      $("#image").change(function(){
          var files = $(this)[0].files;
          if(files.length < min){
              $("#image_error").html("Minimum 2 Files Uploaded !!!");
              $('#image').val('');
              return false;
          }
      });
      $("#image").change(function(){
          var files = $(this)[0].files;
          if(files.length > limit){
              $("#image_error").html("Maximum 6 Files Uploaded !!!");
              $('#image').val('');
              return false;
          }
      });
      $("#myform").submit(function(e){
          e.preventDefault();

          var name = $("#name").val();
          var description = $("#description").val();
          var price = $("#price").val();
          var brand = $("#brand").val();
          var cat = $("#cat").val();
          var sub_cat = $("#sub_cat").val();
          var image = $("#image").val();
          var status = $("#status").val();

          if(name == ""){
              $("#name_error").html("Product Name is Required...");
          }
          if(description == ""){
              $("#description_error").html("Product Description is Required...");
          }
          if(price == ""){
              $("#price_error").html("Product Price is Required...");
          }
          if(brand == ""){
              $("#brand_error").html("Product Brand is Required...");
          }
          if(cat == ""){
              $("#cate_error").html("Product Category is Required...");
          }
          if(sub_cat == ""){
              $("#sub_cat_error").html("Product Sub-Category is Required...");
          }
          if(image == ""){
              $("#image_error").html("Product Image is Required...");
          }
          if(status == ""){
              $("#status_error").html("Product Status is Required...");
          }

          if(name == "" || status == "" || image == "" || sub_cat == "" || cat == "" || brand == "" || price == "" || description == "")
          {
              //
          }else{
              var formData = new FormData(this);
              $.ajax({
                  url: "{{ url('saveProduct') }}",
                  type: "POST",
                  data: formData,
                  contentType: false,
                  processData: false,
                  success: function(data){
                      $("#myform").trigger("reset");
                      alert_value(data);
                      $("#btn_can").trigger("click");
                      select_data();
                  }
              });
          }
      });
    });
</script>

{{-- ---------------------------------------------------------------------------------------------------------------- --}}

<script>
    function send_del(delid){
      var delete_id = delid;
      if(confirm("Are you sure delete selected Products???"))
      {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{url("delete")}}',
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

{{-- ---------------------------------------------------------------------------------------------------------------- --}}

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
        url: '{{url("viewUpdate")}}',
        type: "POST",
        data: {"_token": "{{ csrf_token() }}", update_id:update_id},
        success: function(data){
            $("#name_u").val(data.name);
            $("#description_u").val(data.description);
            $("#price_u").val(data.price);
            $("#brand_u").val(data.brand).prop('selected', true);
            $("#brand_uu").val(data.brand).prop('selected', true);
            $("#cat_u").val(data.cat).prop('selected', true);
            $("#sub_cat_u").html(' <option id="option" value="'+data.sub_cat+'">'+data.sub_cat+'</option>');
            $("#status_u").val(data.status).prop('selected', true);

            var result=(data.image).split(',');
            var html = "";
            $.each(result, function(key, val){
               html += '<img  id="zoom" src = "public/image/product/'+val+'" width="90" height="60">&nbsp;&nbsp;&nbsp;';
            });
            $("#img").html(html);
            $('#exampleModalUpdate').modal('show');
        }
    });
    }
</script>

{{-- ---------------------------------------------------------------------------------------------------------------- --}}

<script>
    $(document).ready(function(){
        var limit = 6;
        var min = 2;
        $("#image_u").change(function(){
            var files = $(this)[0].files;
            if(files.length < min){
                $("#image_error_u").html("Minimum 2 Files Uploaded !!!");
                $('#image_u').val('');
                return false;
            }
        });
        $("#image_u").change(function(){
            var files = $(this)[0].files;
            if(files.length > limit){
                $("#image_error_u").html("Maximum 6 Files Uploaded !!!");
                $('#image_u').val('');
                return false;
            }
        });
        $("#myform_update").submit(function(e){
            e.preventDefault();

            var name_u = $("#name_u").val();
            var description_u = $("#description_u").val();
            var price_u = $("#price_u").val();
            var sub_cat_u = $("#sub_cat_u").val();
            var status_u = $("#status_u").val();

            if(name_u == ""){
                $("#name_error_u").html("Product Name is Required...");
            }
            if(description_u == ""){
                $("#description_error_u").html("Product Description is Required...");
            }
            if(price_u == ""){
                $("#price_error_u").html("Product Price is Required...");
            }
            if(sub_cat_u == ""){
                $("#sub_cat_error_u").html("Product Sub-Category is Required...");
            }
            if(status_u == ""){
                $("#status_error_u").html("Product Status is Required...");
            }

            if(name_u == "" || status_u == "" || sub_cat_u == "" || price_u == "" || description_u == "")
            {
                //
            }else{
                var formData = new FormData(this);
                $.ajax({
                    url: "{{ url('update') }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data){
                        $(".cam_up").trigger("click");
                        $('#exampleModalUpdate').modal('hide');
                        alert_value(data);
                        select_data();
                    }
                });
            }
        });
      });

</script>

  {{-- ---------------------------------------------------------------------------------------------------------------- --}}

<script>
    function multiple(){
        if(confirm("Are you sure Delete Selected Product Records???")){
            var array = [];
            $(".checkSingle:checked").each(function() {
                array.push($(this).val());
            });
            if(array.length <=0){
                var data = "Please select atleast one record to delete.";
                alert_value(data);
            }else{
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var id = array;
                $.ajax({
                    url: "{{url('multipleDelete')}}",
                    type: "POST",
                    data: {"_token": "{{ csrf_token() }}", id:id},
                    success: function(data){
                        alert_value(data);
                        select_data();
                    }
                });
            }
        }
    }
</script>
