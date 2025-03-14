<style>
    #zoom:hover{
    background-color: palegreen;
    border-radius: 7px;
    border: 1px solid blue;
    transform: scale(2);
    }
    #zoom{
    border-radius: 7px;
    border: 1px solid black;
    }
    #b{
    font-size: 18px;
    font-family: "Times New Roman", Times, serif;
    font-weight: bold;
    color: white;
    }
    #admin_name{
        font-size: 20px;
        font-family: "Times New Roman", Times, serif;
        font-weight: bold;
        color: white;
        text-decoration: underline;
    }
    #p{
        font-size: 16px;
        font-family: "Times New Roman", Times, serif;
        font-weight: bold;
        color: white;
        opacity: 0.7;
    }
    #p:hover{
        opacity: 1;
        color: white;
    }
    #p_admin{
        font-size: 16px;
        font-family: "Times New Roman", Times, serif;
        font-weight: bold;
        color: black;
        text-decoration: unset;
        opacity: 0.7;
    }
    .btn:hover {
    background-color: black;
    color: white;
    }
    #btn_can:hover {
    background-color: black;
    color: white;
    }
    #submit:hover {
    background-color: black;
    color: white;
    }
    #center{
      font-size: 40px;
      text-align: center;
      font-weight: bold;
      color: black;
      font-family: time new romen;
    }
    #cat_error{
        font-size: 18px;
      font-weight: bold;
      color: red;
      font-family: time new romen;
    }
    #cat_name_error{
      font-size: 18px;
      font-weight: bold;
      color: red;
      font-family: time new romen;
    }
    .error{
      font-size: 18px;
      font-style: italic;
      font-weight: bold;
      color: red;
      font-family: time new romen;
    }
    b{
      font-size: 16px;
      font-family: Times New Roman;
      font-weight: bold;
    }
    #modal_btn{
      font-size: 18px;
      font-family: Times New Roman;
      font-weight: bold;
      color: white;
    }
    #btn_can{
      font-size: 16px;
      font-family: Times New Roman;
      font-weight: bold;
      color: white;
    }
    #tbl_btn{
      font-size: 14px;
      font-family: Times New Roman;
      font-weight: bold;
      color: white;
    }
    #submit{
      font-size: 16px;
      font-family: Times New Roman;
      font-weight: bold;
      color: white;
    }
    label{
      color: black;
      font-size: 18px;
      font-family: Times New Roman;
      font-weight: bold;
    }
    #option{
      color: black;
      font-size: 18px;
      font-family: Times New Roman;
    }
    input{
      color: black;
      font-size: 18px;
      font-family: Times New Roman;
      font-weight: bold;
    }
    table.thead{
      color: black;
      font-size: 18px;
      font-family: Times New Roman;
      font-weight: bold;
      text-align: center;
    }
    table{
      color: black;
      font-size: 16px;
      font-family: Times New Roman;
      text-align: center;
    }
    h1{
      text-align: center;
      background-color: white;
      color: black;
    }
</style>


<!-- sweet alert -->
<link rel="stylesheet" href="{{url('public/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">

<!-- SweetAlert -->
<script src="{{url('public/plugins/sweetalert2/sweetalert2.min.js')}}"></script>

<script>
    function alert_value(data)
    {
        $(function() {
            var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
            });

            Toast.fire({
                icon: 'success',
                title: data
            });
        });
    }
</script>
