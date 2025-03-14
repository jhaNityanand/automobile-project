<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;


class PaymentController extends Controller
{    
    public function payment(Request $request)
    {
        $input = $request->all();
        $api = new Api(env('RAZOR_KEY'), env('RAZOR_SECRET'));
        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        $id = $payment->id;
        $user_id = $request->session()->get('user_id_login');
        $order_data = $request->session()->get('order_data');

        $accepted = array(
            "razorpay_payment_id" => $payment->id,
            "user_id" => $user_id,
            "amount" => substr($payment->amount, 0, -2),
            "method" => $payment->method,
            "status" => $payment->status,
            "email" => $payment->email,
            "contact" => substr($payment->contact, 3),
        );

        if($id)
        {
            $payments = payment::create($accepted);
            $order_data['payment_id'] = $payments->id;

            $order = Order::create($order_data);
            $order_id = $order->id;
            $request->session()->put(["invoice_id" => $order_id]);

            $pro = explode(",", $order_data['product_id']);
            foreach($pro as $val){
                DB::table("cart")->where("user_id", $user_id)->where("product_id", $val)->delete();
            }
            
            $sel = Order::select("order.*", "payment.method as method")
            ->join("payment", "order.payment_id", "payment.id")->where("order.id", $order_id)->first();

            $sel_user = DB::table("user_register")->select("user_register.*", "city.name as city")
            ->join("city", "user_register.city", "city.id")->where("user_register.id", $user_id)->first();

            return view("record.invoice", ["data" => $sel, "user" => $sel_user, "message" => "Payment Successfully..."]);
        }
        else{
            echo "<center><h1>Something Wrong...</h1></center>";
        }
    }
}