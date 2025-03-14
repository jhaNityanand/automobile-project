<!DOCTYPE html>
<html lang="en">
<head>
  <title>{{ $user->name }} ({{ date("d M Y", strtotime($data->date)) }})</title>
  
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
          <h3><b>Invoice</b></h3>
          <b>Order ID : </b> ##00 {{ $data->id }}
        </div>

        <div class="right">
          <h2><b>Date :</b> {{ date("d M Y", strtotime($data->order_date)) }}</h2>
          <br>
        </div>

        <br><br><br><br><br>
        <hr>

        <div class="left width_to">
          <h3><b>From</b></h3>
          <b>Inventory Management</b> <br>
          375 , abc Place , <br>
          <b>Landmark :</b> Sky Tower , <br>
          982545 , <br>
          Surat, Gujarat <br>
        </div>

        <div class="right width_to">
          <h3><b>To</b></h3>
          <b>{{ $user->name }}</b> <br>
          <b>{{ $user->phone }}</b> , {{ $user->email }} <br>
          {{ $user->address }} , <br>
          <b>Landmark :</b> {{ $user->landmark }} , <br>
          {{ $user->city }} , {{ $user->pincode }}
        </div>
              
        <br><br><br><br><br><br><br><br><br><br><br>
        
        <h2 id="h3">Order Summary</h2>

        <table>
          <thead>
              <tr>
                <th>Sr. No.</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Sub-Total</th>
              </tr>
          </thead>
          <tbody>
            @php 
              $serial = 1;
              $name = explode(",",$data->product_name);
              $quantity = explode(",",$data->quantity);
              $price = explode(",",$data->price);
              $total = explode(",",$data->total_price);
              $count = count($quantity);
            @endphp
            @for($i = 0; $i < $count; $i++)
              <tr>
                <td>{{$serial++;}}</td>
                <td>{{$name[$i]}}</td>
                <td>{{$quantity[$i]}}</td>
                <td>Rs. {{$price[$i]}}.00</td>
                <td>Rs. {{$total[$i]}}.00</td>
              </tr>
              @endfor
          </tbody>
        </table>

        <br>

        <div class="left">
          <h3><b>Management</b></h3>
            <b>Signatute By</b> <br>
            Inventory Management<br>
        </div>

        <div class="right">
          <h3><b>Billing</b></h3>
          <b>Total Product :</b> {{ $count }} <br>
          <b>Total Quantity :</b> {{ array_sum($quantity) }} <br>
          <b>Total Amount : Rs.</b> {{ array_sum($total) }}.00 <br>
          @if($data->payment_id == 0)
          <b>Payment Method : </b> {{ 'Cash on Delivery' }} 
          @else
          <b>Payment Method : </b> {{ $data->method }}
          @endif
        </div>

        <br><br><br><br><br><br><br>
        <hr>

        <div>
          <b class="left">Copyright &copy; 2021 - 2022 <a href="https://examtube.in">Inventory Management</a>.</b>
            All rights reserved.
            @php date_default_timezone_set("Asia/Calcutta"); @endphp
            <b class="right"><a href="#">{{date("d M Y H:i")}}</a></b>
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
    window.location.href = "{{url('invoice')}}";
  }
  function home(){
      window.location.href = "{{url('/')}}";
  }
</script>