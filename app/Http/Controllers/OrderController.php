<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PDF;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $admin_id = $request->session()->get("id");
       
        if($admin_id){
            return view("product.order");
        }else{
            return redirect("admin");
        }
    }

    public function show(Request $request)
    {
        $a = $request->session()->get("user_id_login");
        $sel = DB::table("order")->where("user_id", $a) ->where("order.del_status", 0)->get()->sortDesc();
        if($a){
            return view("home.order", ["data" => $sel]);
        }else{
            return redirect("login");
        }
    }

    public function cancel(Request $request)
    {
        $a = $request->session()->get("user_id_login");
        $id = $request->id;
        $valid = $this->validate($request, [
            "reason" => "required",
        ]);
        $valid["user_id"] = $a;
        $valid["order_id"] = $id;

        $sel = DB::table("order")->where("user_id", $a)->where("id", $id)->update(["status" => 2]);
        $sel_can = DB::table("order_cancel")->insert($valid);
        if($a){
            if($sel && $sel_can){
                return redirect("myOrder");
            }else{
                //
            }
        }else{
            return redirect("login");
        }
    }

    public function return(Request $request)
    {
        $a = $request->session()->get("user_id_login");
        $id = $request->id;
        $valid = $this->validate($request, [
            "reason" => "required",
        ]);
        $valid["user_id"] = $a;
        $valid["order_id"] = $id;

        $sel = DB::table("order")->where("user_id", $a)->where("id", $id)->update(["status" => 3]);
        $sel_ret = DB::table("order_return")->insert($valid);
        if($a){
            if($sel && $sel_ret){
                return redirect("myOrder");
            }else{
                //
            }
        }else{
            return redirect("login");
        }
    }

    public function deleteOrder(Request $request, $id)
    {
        $a = $request->session()->get("user_id_login");
        $sel = DB::table("order")->where("user_id", $a)->where("id", $id)->update(["del_status" => 1]);
        if($a){
            if($sel){
                return redirect("myOrder");
            }else{
                //
            }
        }else{
            return redirect("login");
        }
    }

    //================================================================================================
    //=============================== USER PROFILE =============================================

    public function profile(Request $request)
    {
        $user_id = $request->session()->get("user_id_login");
        $user = DB::table("user_register")->where("id", $user_id)->first();
        $city = DB::table("city")->get()->sortDesc();

        if($user_id){
            return view("home.profile", ["view" => $user, "city" => $city]);
        }else{
            return redirect("login");
        }
    }

    //================================================================================================
    //=============================== ORDER RECEIVED =============================================

    public function orderReceived(Request $request)
    {
        $admin_id = $request->session()->get("id");
        $sel = DB::table("order")->where("status", 0)->get()->sortDesc();
        if($admin_id){
            return view("record.received", ["view" => $sel]);
        }else{
            return redirect("admin");
        }
    }

    public function loadReceived(Request $request)
    {
        $id = $request->session()->get("id");
        if($id){
            return redirect("orderReceived");
        }else{
            return redirect("/");
        }
    }

    //------------------------------------------------------------------------------------------------

    public function orderDelivered(Request $request)
    {
        $admin_id = $request->session()->get("id");
        $sel = DB::table("order")->where("status", 1)->get()->sortDesc();
        if($admin_id){
            return view("record.deliver", ["view" => $sel]);
        }else{
            return redirect("admin");
        }
    }

    public function loadDelivered(Request $request)
    {
        $id = $request->session()->get("id");
        if($id){
            return redirect("orderDelivered");
        }else{
            return redirect("/");
        }
    }

    //------------------------------------------------------------------------------------------------

    public function orderReturned(Request $request)
    {
        $admin_id = $request->session()->get("id");
        $sel = DB::table("order")
        ->select("order.*", "order_return.reason as reason")
        ->join("order_return", "order.id", "order_return.order_id")
        ->where("order.status", 3)->get()->sortDesc();
        if($admin_id){
            return view("record.return", ["view" => $sel]);
        }else{
            return redirect("admin");
        }
    }

    public function loadReturned(Request $request)
    {
        $id = $request->session()->get("id");
        if($id){
            return redirect("orderReturned");
        }else{
            return redirect("/");
        }
    }

    //------------------------------------------------------------------------------------------------

    public function orderCanceled(Request $request)
    {
        $admin_id = $request->session()->get("id");
        $sel = DB::table("order")
        ->select("order.*", "order_cancel.reason as reason")
        ->join("order_cancel", "order.id", "order_cancel.order_id")
        ->where("order.status", 2)->get()->sortDesc();
        if($admin_id){
            return view("record.cancel", ["view" => $sel]);
        }else{
            return redirect("admin");
        }
    }

    public function loadCanceled(Request $request)
    {
        $id = $request->session()->get("id");
        if($id){
            return redirect("orderCanceled");
        }else{
            return redirect("/");
        }
    }

    //------------------------------------------------------------------------------------------------

    public function delever(Request $request, $id)
    {
        $a = $request->session()->get("id");
        $sel = DB::table("order")->where("id", $id)->update(["status" => 1]);
        if($a){
            if($sel){
                return redirect("order")->with(["status" => "Order Delivered Successfully..."]);
            }else{
                //
            }
        }else{
            return redirect("admin");
        }
    }

    public function invoice(Request $request)
    {
        $user_id = $request->session()->get('user_id_login');
        $order_id = $request->session()->get('invoice_id');

        $sel = Order::select("order.*", "payment.method as method")
            ->leftJoin("payment", "order.payment_id", "payment.id")->where("order.id", $order_id)->first();

            $sel_user = DB::table("user_register")->select("user_register.*", "city.name as city")
            ->join("city", "user_register.city", "city.id")->where("user_register.id", $user_id)->first();

        if($user_id && $order_id){
            if($sel && $sel_user){
                $pdf = PDF:: loadView("record.invoice", ["data" => $sel, "user" => $sel_user])->setOptions(['defaultFont' => 'sans-serif']);
                return $pdf->download('invoice.pdf');
            }else{
                echo "Some Technical Error...";
            }
        }else{
            return redirect("login");
        }
    }
}
