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
    #border{
        border: 1.5px solid black;
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
                  <th><input type="checkbox" name="check[]" id="checkedAll">All</th>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Price</th>
                  <th>Brand</th>
                  <th>Category</th>
                  <th>Sub-Category</th>
                  <th>Image</th>
                  <th>Status</th>
                  <th>User Name</th>
                  <th>Action</th>
                </tr>
                </thead>
               {{--  @php $serial = 1; @endphp --}}
                <tbody>
                @foreach ($data as $view)
                <tr>
                <td><input type="checkbox" name="check[]" class="checkSingle" value = "{{$view->id}}"> </td>
                  <td>{{/* $serial++; */ $view->id}}</td>
                  <td>{{$view->name}}</td>
                  <td><i title="Product Description" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#exampleDesc{{$view->id}}"> <b class="fas fa-eye"></b></i>
                    <!-- Insert Modal -->
                    <div class="modal fade" id="exampleDesc{{$view->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><b>View Product Description</b></h5>
                                <button type="button" id="btn_can1" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">X</button>
                            </div>
                            <div class="modal-body">
                                <h5>{{$view->description}}</h5>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="btn_can1" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    </td>
                  <td>₹ {{$view->price}}</td>
                  <td>{{$view->brand}}</td>
                  <td>{{$view->cat}}</td>
                  <td>{{$view->sub_cat}}</td>
                  <td><i title="Product Image" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#exampleView{{$view->id}}"><b class="fas fa-eye"></b></i>
                    <!-- Insert Modal -->
                    <div class="modal fade" id="exampleView{{$view->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><b>View Product Images</b></h5>
                                <button type="button" id="btn_can1" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">X</button>
                            </div>
                            <div class="modal-body">
                                <center><?php foreach (explode(",", $view->image) as $value) { ?>
                                    <img id="zoom" src="public/image/product/{{$value}}" width="160" height="130">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php } ?></center>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="btn_can1" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    </td>
                  <td>{{$view->status}}</td>
                  <td>{{$view->user_name}}</td>
                  <td><button id="tbl_btn" onclick="send_upd('{{$view->id}}')" type="button" class="btn btn-success"><span class="fas fa-edit"></span></button>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button id="tbl_btn" onclick="send_del('{{$view->id}}')" type="button" class="btn btn-danger"><span class="fas fa-trash"></span></button></td>
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

<script>
    $(document).ready(function() {
			$("#checkedAll").change(function() {
				if (this.checked) {
					$(".checkSingle").each(function() {
						this.checked=true;
					});
				} else {
					$(".checkSingle").each(function() {
						this.checked=false;
					});
				}
			});

			$(".checkSingle").click(function () {
				if ($(this).is(":checked")) {
					var isAllChecked = 0;

					$(".checkSingle").each(function() {
						if (!this.checked)
							isAllChecked = 1;
					});

					if (isAllChecked == 0) {
						$("#checkedAll").prop("checked", true);
					}
				}
				else {
					$("#checkedAll").prop("checked", false);
				}
			});
			});
</script>
