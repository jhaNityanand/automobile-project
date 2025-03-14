<!DOCTYPE html>
<html lang="en">
<head>
  <title>Order 
            @if($status1->status == 1)
                Delivered
            @elseif($status1->status == 0)
                Received
            @endif
        ({{ date("d M Y") }})</title>
  
  <style>
      #section{
          width: 98%;
          margin: auto;
          margin-top: 2px;
          height: auto;
          color: black;
          font-family: 'Times New Roman', Times, serif;
          border: 7px solid gray;
          font-size: 18px;
          border-radius: 20px;
          padding-left: 10px;          
          padding-right: 10px;          
      }
      table{
          margin: auto;
          text-align: center;
          font-size: 16px;
          color: black;
          width: 98%;
          border: 2px solid black;
          border-radius: 10px;
          background-color: gray;
          padding: 1px;
      }
      tr:nth-child(even){
        background-color: rgb(255, 226, 255);
      }
      tr:nth-child(odd){
        background-color: rgb(216, 255, 255);
      }
      th{
        background-color: white;
        color: blue;
        font-size: 20px;
      }
      td{
        font-size: 16px;
        color: black;
        border: 1px solid white;
      }
      #h3{
          text-align: center;
      }
      
      hr{
        color: purple;
        height: 2px;
        width: 100%;
        background-color: red;
      }
      .right{
        float: right;
      }
      .left{
        float: left;
      }
      .width_to{
        width: 33%;
      }
      #hide{
        text-align: center;
      }
      button{
        border-radius: 10px;
        border: 2px solid white;
        background-color: lawngreen;
        font-size: 18px;
        color: red;
        font-weight: bold;
      }
      button:hover{
        color: blue;
        cursor: pointer;
        transform: scale(1.5);
      }
  </style>
</head>
<body>

<section id="section">
        <div class="left">
          <h3><b>Order 
                    @if($status1->status == 1)
                        Delivered
                    @elseif($status1->status == 0)
                        Received
                    @endif
                </b></h3>
        </div>

        <div class="right">
          @php date_default_timezone_set("Asia/Calcutta"); @endphp
          <h3><b>Date :</b> {{ date("d M Y") }}</h3>
        </div>

        <br><br>
        <hr>
                
        <h2 id="h3">Order 
                    @if($status1->status == 1)
                        Delivered
                    @elseif($status1->status == 0)
                        Received
                    @endif
                     Reports</h2>

        <table>
          <thead>
              <tr>
                <th>Sr. No.</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Date</th>
                <th>Customer Name</th>
              </tr>
          </thead>
          <tbody>
            @php $serial = 1; @endphp
            @foreach($status as $status)
            <tr>
              <td>{{ $serial++; }}</td>

              <td>
                @php $product_name = explode(",", $status->product_name); @endphp
                @php $serial = 1; @endphp
                @foreach ($product_name as $product_name)
                <b>{{ $serial++ }}.</b> {{ $product_name }} <br>
                @endforeach
              </td>
              <td>
                @php $price = explode(",", $status->price); @endphp
                @foreach ($price as $price)
                  Rs. {{ $price }}.00 <br>
                @endforeach
              </td>
              <td>
                @php $quantity = explode(",", $status->quantity); @endphp
                @foreach ($quantity as $quantity)
                  {{ $quantity }} <br>
                @endforeach
              </td>
              <td>
                @php $total_price = explode(",", $status->total_price); @endphp
                @foreach ($total_price as $total_price)
                  Rs. {{ $total_price }}.00 <br>
                @endforeach
              </td>

              <td>{{ date("d M Y (h:i a)", strtotime($status->created_at)) }}</td>
              <td>{{ $status->u_name }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>

        <br>
        <hr>

        <div>
          <center><b>Copyright &copy; 2021 - 2022 <a href="https://examtube.in">Inventory Management</a>.</b>
            All rights reserved.</center>
        </div>

        <br>

  </section>

  <br>
  <div id="hide">
    <button onclick="download()">Download</button>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <button onclick="home()">Home</button>
  </div>
  <br>

</body>
</html>

<script>
  function download(){
    window.location.href = "{{url('orderStatusDownload')}}";
  }
  function home(){
    window.location.href = "{{url('siteAdmin')}}";
  }
</script>