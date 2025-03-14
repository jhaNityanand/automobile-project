<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\validate;
use Illuminate\Support\Str;

class AdminController extends Controller
{
//-----------------------------------------------------------------------------------
    public function welcome(Request $request)
    {
        $request->session()->forget("invoice_id");
        return view("welcome");
    }
    public function siteAdmin(Request $request)
    {
        $id = $request->session()->get('id');

        $product = DB::table('product')->count('id');
        $product_in = DB::table('product')->where("status", "In Stock")->count('id');
        $product_out = DB::table('product')->where("status", "Out of Stock")->count('id');
        
        $brand = DB::table('brand')->count('id');
        $user = DB::table('user_register')->count('id');
        
        $order = DB::table('order')->count('id');
        $order_rec = DB::table('order')->where("status", 0)->count('id');
        $order_del = DB::table('order')->where("status", 1)->count('id');
        $order_can = DB::table('order')->where("status", 2)->count('id');
        $order_ret = DB::table('order')->where("status", 3)->count('id');

        if($id){
            return view("welcome-2", [
                "product" => $product,"product_in" => $product_in,"product_out" => $product_out,
                "brand" => $brand,"order" => $order,"user" => $user,
                "order_rec" => $order_rec,"order_del" => $order_del,"order_can" => $order_can,"order_ret" => $order_ret,
            ]);
        }else{
            return redirect("admin");
        }
    }
//-----------------------------------------------------------------------------------

public function chart(Request $request)
{
    $chart_order_data = DB::table('order')->select(DB::raw("count('id') as count"), "Order.*")
    ->groupBy('status')->get();

    $chart[] = array("Order", "Number");
    $name = array("Received", "Delivered", "Cancelled", "Returned");

    foreach($chart_order_data as $key => $value){
        $chart[$key+1] = array($name[$key], $value->count);
    }

    $chart_brand_data = DB::table('brand')->where("total_product", ">", 0)->get();

    $chart2[] = array("Brand", "Number");
    foreach($chart_brand_data as $key => $value)
    {
        $chart2[$key+1] = array($value->name, $value->total_product);
    }

    return array("data1" => json_encode(array("dis"=>$chart)), "data2" => json_encode(array("dis2"=>$chart2)));
}

//-----------------------------------------------------------------------------------
    public function feedback(Request $request)
    {
        $id = $request->session()->get('id');
        if($id){
            $sel = DB::table("feedback")->select("feedback.id as id_feedback", "feedback.comment as c_feedback", "user_register.name as n_user")
            ->join("user_register", "feedback.user_id", "=", "user_register.id")->get()->sortDesc();
            return view("admin_home.feedback", ["view" => $sel]);
        }else{
            return redirect("admin");
        }
    }

    public function deleteFeedback(Request $request, $delid)
    {
        $id = $request->session()->get('id');
        if($id){
            $del = DB::table("feedback")->where("id", $delid)->delete();
            if($del){
            return redirect("viewFeedback")->with(['abcd' => "Selected Feedback Deleted Successfully..."]);
            }else{
                echo "Sone Technical Error...";
            }
        }else{
            return redirect("admin");
        }
    }
//-----------------------------------------------------------------------------------
    public function rating(Request $request)
    {
        $id = $request->session()->get('id');
        if($id){
            $sel = DB::table("review")->select("review.*", "product.name as p_name")
            ->join("product", "review.product_id", "=", "product.id")->get()->sortDesc();
            return view("admin_home.rating", ["view" => $sel]);
        }else{
            return redirect("admin");
        }
    }

    public function deleteRating(Request $request, $delid)
    {
        $id = $request->session()->get('id');
        if($id){
            $del = DB::table("review")->where("id", $delid)->delete();
            if($del){
            return redirect("viewRating")->with(['abcd' => "Selected Rating Deleted Successfully..."]);
            }else{
                echo "Sone Technical Error...";
            }
        }else{
            return redirect("admin");
        }
    }
//-----------------------------------------------------------------------------------

    public function login(Request $request)
    {
        $request->session()->forget('user_id');
        $request->session()->forget('user_name');
        $id = $request->session()->get('id');
        if($id){
            return redirect("siteAdmin");
        }else{
            return view("admin.login");
        }
    }
    public function saveLogin(Request $request)
    {
        $abc = $this->validate($request,[
            'email' => 'required',
            'password' => 'required',
        ]);

        $ac = sha1($abc['password']);
        $ad = $abc['email'];

        $x = DB::table('admin_register')->where('email', $ad)->where('password', $ac)->get();
        if(count($x) > 0)
        {
            $tab = DB::table('admin_register')->where('email', $ad)->where('password', $ac)/* ->where(['status' => 0]) */->first();
            if($tab)
            {
                $u = $tab->id;
                DB::table('admin_register')->where('id', $u)->update(["status" => "1"]);
                $request->session()->put('id', $x[0]->id);
                $request->session()->put('name', $x[0]->name);
                return redirect('siteAdmin')->with(['abcd' => "Login Successfully..."]);
            }else{
                return redirect('siteAdmin')->with(['abcd' => "User Already Active..."]);
            }
        }else{
            return redirect('admin')->with(['error' => 'Email and password not matched...']);
        }
    }
//-----------------------------------------------------------------------------------
    public function forgotPassword(Request $request)
    {
        $id = $request->session()->get('id');
        if($id){
            return redirect("siteAdmin");
        }else{
            return view("admin.forgot-password");
        }
    }
    public function saveForgot(Request $request)
    {
        $a = $this->validate($request,[
            'email' => 'required',
        ]);
        $x = Admin::where('email', $a)->get();
        if(count($x) > 0){
            $request->session()->put('user_id', $x[0]->id);
            $request->session()->put('user_name', $x[0]->name);
            return redirect('recoverPassword');
        }else{
            return redirect('forgotPassword')->with(['error' => 'Email not found...']);
        }
    }
//-----------------------------------------------------------------------------------
    public function recoverPassword(Request $request)
    {
        $user_name = $request->session()->get("user_name");
        if($user_name){
            return view("admin.recover-password");
        }else{
            return redirect('admin');
        }
    }
    public function saveRecover(Request $request)
    {
        $abc = $this->validate($request,[
            'password' => 'required|string|max:12|min:6',
            'con_pass' => 'required',
        ]);

        $ac = sha1($abc['password']);
        $ad = sha1($abc['con_pass']);
        $abc['con_pass'] = $ad;
        $abc['password'] = $ac;

        if($ac == $ad){
            $id = $request->session()->get('user_id');
            $x = Admin::where('id', $id)->update($abc);
            if($x){
                $request->session()->forget('user_id');
                $request->session()->forget('user_name');
                return redirect('admin')->with(['saveRecover' => "Password Updated Successfully..."]);
            }else{
                return with(['saveRecover' => "Can't Password Updated..."]);
            }
        }else{
            return redirect('recoverPassword')->with(['error' => 'Password and Confirm password not match...']);
        }
    }
//-----------------------------------------------------------------------------------
    public function register(Request $request)
    {
        $id = $request->session()->get("id");
        if($id == 1){
            return view("admin.register");
        }else{
            return redirect("admin");
        }
    }
    public function saveRegister(Request $request)
    {
        $abc = $this->validate($request,[
            'name' => 'required|string',
            'gender' => 'required',
            'phone' => 'required',
            'email' => 'required|string|email|max:50|unique:admin_register,email',
            'password' => 'required|max:15|min:6|string',
            'con_pass' => 'required',
        ]);

        $ac = sha1($abc['password']);
        $ad = sha1($abc['con_pass']);
        $abc['con_pass'] = $ad;
        $abc['password'] = $ac;

            if($ac == $ad)
            {
                $a = Admin::insert($abc);
                if($a){
                    return redirect('adminData')->with(['mesg' => "Registered New Admin Successfully..."]);
                }else{
                    //
                }
            }else{
                return redirect('register')->with(['error' => 'Password and Confirm password not match...']);
            }
    }
//-----------------------------------------------------------------------------------
    public function logout(Request $request)
    {
        Auth::logout();
        $u = $request->session()->get('id');
        Admin::where('id', $u)->update(["status" => "0"]);
        $request->session()->forget('id');
        $request->session()->forget('name');
        return redirect('/admin');
    }
//-----------------------------------------------------------------------------------

    public function adminData(Request $request)
    {
        $id = $request->session()->get('id');
        if($id){
            $data = DB::table('admin_register')->get();
            return view("admin.admin", ["view" => $data]);
        }else{
            return view("admin.login");
        }
    }
//-----------------------------------------------------------------------------------

    public function deleteAdmin($id)
    {
        DB::table('admin_register')->where("id", $id)->delete();
        return redirect("adminData")->with(["mesg" => "Admin Deleted SuccessFully..."]);
    }
//-----------------------------------------------------------------------------------

}
