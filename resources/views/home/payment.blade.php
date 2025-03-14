
<style>
    input[type="submit" i] {
    appearance: auto;
    user-select: none;
    white-space: pre;
    align-items: flex-start;
    text-align: center;
    cursor: default;
    box-sizing: border-box;
    background-color: -internal-light-dark(rgb(239, 239, 239), rgb(59, 59, 59));
    color: -internal-light-dark(black, white);
    padding: 1px 6px;
    border-width: 2px;
    border-style: outset;
    border-color: -internal-light-dark(rgb(118, 118, 118), rgb(133, 133, 133));
    border-image: initial;
    margin-top: 25%;
    margin-left: 45%;
    cursor: pointer;
    transform: scale(3);
}
</style>

<?php
$a1 = $data['total_price'];
$a2 = $data['name'];
$a3 = $data['email'];
$a4 = $data['phone'];

if($a1 && $a2 && $a3 && $a4)
{
?>

<div class="card-body text-center">
    <form action="{{ route('payment') }}" method="POST" id="submit">
    @csrf
    <script src="https://checkout.razorpay.com/v1/checkout.js"
            data-key="{{ env('RAZOR_KEY') }}"
            data-amount="{{$data['total_price']}}"
            data-currency="INR"
            data-buttontext="Pay Now"
            data-name="Inventory Management"
            data-description="Selling Only Automobile Parts / Sphare Parts"
            data-image="{{ url('public/image/logo.webp') }}"
            data-prefill.name="{{$data['name']}}"
            data-prefill.email="{{$data['email']}}"
            data-prefill.contact="{{$data['phone']}}"
            data-theme.color="#ff752950">
    </script>
    </form>
</div>

<script>
    var a = "{{$data['total_price']}}";
    var b = "{{$data['name']}}";
    var c = "{{$data['email']}}";
    var d = "{{$data['phone']}}";
</script>

<?php
}else{
    echo "<center><h1>Something Wrong...</h1></center>";
}
?>
<script>
    $(document).ready(function(){
        $("#submit").submit();
    });
</script>

