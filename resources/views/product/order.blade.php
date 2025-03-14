
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Show All Order Records</title>
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
      #head{
          text-align: center;
          font-family: 'Times New Roman', Times, serif;
          color: black;
      }
      .btn:hover{
        background-color: black;
        color: white;
        border: blue;
      }
  </style>

@include('layout-1.top')

<!-- Content Wrapper. Contains page content -->
<div id="" class="content-wrapper">
  <!-- Main content -->
    <section id="" class="content">
        <br>
        <div class="card">
            <div class="card-header">
              <button onclick="rec()" type="button" id="modal_btn" class="btn btn-success">
                Received
            </button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button onclick="del()" type="button" id="modal_btn" class="btn btn-primary">
               Delivered
            </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button onclick="can()" type="button" id="modal_btn" class="btn btn-info">
                Canceled
            </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button onclick="ret()" type="button" id="modal_btn" class="btn btn-danger">
                Returned
            </button>
        </div>
        </div>
        <div class="container-fluid">
          <div id="load_data"></div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
      </section>
    </div>

@include('layout-1.script')

@include('layout-1.datatable')

</body>
</html>
<script>
      function received()
      {
          $.ajax({
              url: "{{url('loadReceived')}}",
              type: "POST",
              data: {"_token": "{{ csrf_token() }}"},
              success: function (data){
                  $("#load_data").html(data);
              }
          });
      }

      function delivered()
      {
          $.ajax({
              url: "{{url('loadDelivered')}}",
              type: "POST",
              data: {"_token": "{{ csrf_token() }}"},
              success: function (data){
                  $("#load_data").html(data);
              }
          });
      }

      function canceled()
      {
          $.ajax({
              url: "{{url('loadCanceled')}}",
              type: "POST",
              data: {"_token": "{{ csrf_token() }}"},
              success: function (data){
                  $("#load_data").html(data);
              }
          });
      }

      function returned()
      {
          $.ajax({
              url: "{{url('loadReturned')}}",
              type: "POST",
              data: {"_token": "{{ csrf_token() }}"},
              success: function (data){
                  $("#load_data").html(data);
              }
          });
      }

      function rec(){
        received();
      }

      function del(){
        delivered();
      }

      function can(){
        canceled();
      }

      function ret(){
        returned();
      }

      function delver(id){
          if(confirm("Are You Sure?")){
              window.location.href="{{url('delever')}}/"+id
          }
      }
      $(document).ready(function(){
        received();
      });
</script>
@if (Session::has('status'))
    <script>
        alert_value("{{Session::get('status')}}");
    </script>
@endif