<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\validate;
use Illuminate\Support\Str;
use File;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $request->session()->forget("email");
        $request->session()->forget("code");

        $a = $request->session()->get("user_id_login");
        if($a){
            return redirect("/");
        }else{
            $view = DB::table("city")->get();
            return view("user.register", ["view" => $view]);
        }
    }

    public function login(Request $request)
    {
        $request->session()->forget("user_name_forgot");
        $request->session()->forget("user_id_forgot");

        $a = $request->session()->get("user_id_login");
        if($a){
            return redirect("/");
        }else{
            return view("user.login");
        }
    }
//----------------------------------------------------------------------------------------------------------------
    public function store(Request $request)
    {
        $rand = rand(100000,999999);

        $validation = $this->validate($request,[
            "name" => 'required',
            "gender" => 'required',
            "email" => 'required|unique:user_register,email',
            "password" => 'required|min:6|max:15',
            "con_pass" => 'required',
            "register" => 'required',
        ]);
        if($validation["con_pass"] == $validation["password"])
        {
            $request->session()->put(["email" => $validation["email"]]);
            $request->session()->put(["code" => $rand]);

            $verify = $request->session()->get('code');

            $validation["password"] =  sha1($validation["password"]);
            $validation["con_pass"] =  sha1($validation["con_pass"]);
            $validation["verify"] = $verify;

            $insert = DB::table('user_register')->insert($validation);
            if($insert){
                $abc = $validation['email'];
                return redirect("email?email=$abc&&code=$rand");
                //return redirect('login')->with(['status' => "User Registered Successfully... (" . $validation['name'] . ")"]);
            }else{
                //
            }
        }else{
            return redirect('userRegister')->with(['status' => "Password And Confirm Password Not Matched..."]);
        }
    }
//----------------------------------------------------------------------------------------------------------------
    public function email(Request $request)
    {
        $abc = $request->session()->get("email");
        if($abc){
            return view("email.email");
        }else{
            return redirect("login");
        }
    }

    public function otp(Request $request)
    {
        $abc = $request->session()->get("email");
        if($abc){
            return view("email.otp");
        }else{
            return redirect("login");
        }
    }

    public function saveOTP(Request $request)
    {
        $abc = $this->validate($request, [
            "otp" => 'required'
        ]);

        $code = $abc['otp'];
        $check = DB::table("user_register")->where("verify", $code)->first();
        if($check)
        {
            $upd = DB::table("user_register")->where("verify", $abc['otp'])->update(["status" => 1]);
            if($upd){
                $request->session()->forget("email");
                $request->session()->forget("code");
                return redirect("login")->with(["status" => "You Are Registered Successfully...(Verified User)"]);
            }else{
                $request->session()->forget("email");
                $request->session()->forget("code");
                return redirect("login")->with(["status" => "User Already Registered..."]);
            }
        }else{
            return redirect("otp")->with(["status" => "OTP is not Matched..."]);
        }
    }
//----------------------------------------------------------------------------------------------------------------
    public function saveLogin(Request $request)
    {
        $validate = $this->validate($request, [
            "email" => 'required',
            "password" => 'required',
        ]);
        $validate["password"] =  sha1($validate["password"]);

        $check = DB::table("user_register")
                ->where("email", $validate["email"])
                ->where("password", $validate["password"])
                ->where("status", 1)
                ->first();
        if($check){
            $request->session()->put(["user_name_login" => $check->name]);
            $request->session()->put(["user_id_login" => $check->id]);
            $request->session()->put(["user_status_login" => $check->register]);

            return redirect()->back()->with(["status" => "Login Successfully..."]);
        }else{
            return redirect("login")->with(["check" => "Password And Email Not Matched...", "status" => "User Not Verified..."]);
        }
    }
//----------------------------------------------------------------------------------------------------------------
    public function forgotPassword(Request $request)
    {
        $a = $request->session()->get("user_id_login");
        if($a){
            return redirect("/");
        }else{
            return view("user.forgot-password");
        }
    }

    public function saveUserForgot(Request $request)
    {
        $valid = $this->validate($request, [
            "email" => 'required'
        ]);

        $check = DB::table("user_register")
        ->where("email", $valid["email"])
        ->where("status", 1)
        ->first();
        if($check){
            $request->session()->put(["user_name_forgot" => $check->name]);
            $request->session()->put(["user_id_forgot" => $check->id]);
            return redirect("userRevcoverPassword");
        }else{
            return redirect("userForgotPassword")->with(["error" => "Email Id Not Exits in Database..."]);
        }
    }
//----------------------------------------------------------------------------------------------------------------
    public function recoverPassword(Request $request)
    {
        $b = $request->session()->get("user_name_forgot");
        if($b == ""){
            return redirect("/");
        }else{
            return view("user.recover-password");
        }
    }

    public function saveUserRecover(Request $request)
    {
        $id = $request->session()->get("user_id_forgot");
        $upd = $this->validate($request, [
            "password" => 'required|max:15|min:6',
            "con_pass" => 'required',
        ]);
        $upd["password"] = sha1($upd["password"]);
        $upd["con_pass"] = sha1($upd["con_pass"]);

        if($upd["password"] == $upd["con_pass"])
        {
            $update = DB::table('user_register')->where("id", $id)
                    ->update(["password" => $upd["password"] , "con_pass" => $upd["con_pass"]]);

            if($update){
                $request->session()->forget("user_name_forgot");
                $request->session()->forget("user_id_forgot");
                return redirect("login")->with(['status' => "Password Updated Sucessfully..."]);
            }else{
                $request->session()->forget("user_name_forgot");
                $request->session()->forget("user_id_forgot");
                return redirect("login")->with(['status' => "Old Password and New Password is Same...(Can't Updated Password)"]);
            }
        }
        else{
            return redirect("userRevcoverPassword")->with(["error" => "Password And Confirm Password Not Matched..."]);
        }
    }
//----------------------------------------------------------------------------------------------------------------
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->forget('user_name_login');
        $request->session()->forget('user_id_login');
        $request->session()->forget('user_status_login');
        return redirect('/login');
    }
//----------------------------------------------------------------------------------------------------------------
    public function data(Request $request)
    {
        $id = $request->session()->get('id');
        if($id){
            $data = DB::table('admin_register')->get();
            return view("admin.admin", ["view" => $data]);
        }else{
            return view("admin.login");
        }
    }
    public function customer(Request $request)
    {
        $id = $request->session()->get('id');
        if($id){
            $data = DB::table('user_register')->get();
            return view("user.user", ["view" => $data]);
        }else{
            return view("admin.login");
        }
    }

    public function deleteCustomer(Request $request, $delid)
    {
        $id = $request->session()->get('id');
        if($id){
            $del = DB::table("user_register")->where("id", $delid)->delete();
            if($del){
            return redirect("viewCustomer")->with(['abcd' => "Selected Customer Deleted Successfully..."]);
            }else{
                echo "Sone Technical Error...";
            }
        }else{
            return redirect("admin");
        }
    }

    //===================================================================================================

    public function updateAccount(Request $request)
    {
        $id = $request->session()->get("user_id_login");
        $valid = $this->validate($request, [
            "name" => "required",
            "phone" => "required",
            "register" => "required",
        ]);
        $upd = DB::table('user_register')->where("id", $id)->update($valid);
        if(1 || $upd){
            return redirect("profile")->with(["status" => "Account Updated Successfully..."]);
        }else{
            //
        }
    }

    public function updatePassword(Request $request)
    {
        $id = $request->session()->get("user_id_login");
        $valid = $this->validate($request, [
            "old" => "required",
            "password" => "required|min:6|max:20",
            "con_pass" => "required",
        ]);
        $valid1["password"] =  sha1($valid["password"]);
        $valid1["con_pass"] =  sha1($valid["con_pass"]);
        $valid["old"] =  sha1($valid["old"]);
        $sel = DB::table('user_register')->where("id", $id)->first();

        if($sel->con_pass == $valid["old"] || $sel->password == $valid["old"])
        {
            if($valid1["con_pass"] == $valid1["password"])
            {
                $upd = DB::table('user_register')->where("id", $id)->update($valid1);
                if(1 || $upd){
                    return redirect('profile')->with(['status' => "Password Updated Successfully..."]);
                }else{
                    //
                }
            }else{
                return redirect('profile')->with(['error' => "Password And Confirm Password Not Matched..."]);
            }
        }else{
            return redirect('profile')->with(['old' => "Old Password Not Matched..."]);
        }


    }

    public function updateProfile(Request $request)
    {
        $id = $request->session()->get("user_id_login");
        $valid = $this->validate($request, [
            "gender" => "required",
        ]);
        $img = $request->file("image");
        $sel = DB::table('user_register')->where("id", $id)->first();
        $old_image = $sel->image;
        /* dd($img);die; */
        if($img == "")
        {
            $upd = DB::table('user_register')->where("id", $id)->update($valid);
            if(1 || $upd){
                return redirect('profile')->with(['status' => "Profile Updated Successfully..."]);
            }else{
                //
            }
        }else
        {
            $path = public_path('image/user/');
            File::delete($path.$old_image);

            $ext = strtolower($img->getClientOriginalExtension());
            $img_name = Str::random(10);
            $img_name = $img_name . '.' . $ext;
            $img->move($path,$img_name);
            $valid['image'] = $img_name;

            $upd = DB::table('user_register')->where("id", $id)->update($valid);
            if($upd){
                return redirect('profile')->with(['status' => "Profile Updated Successfully..."]);
            }else{
                //
            }
        }
    }

    public function updateAddress(Request $request)
    {
        $id = $request->session()->get("user_id_login");
        $valid = $this->validate($request, [
            "address" => "required",
            "landmark" => "required",
            "pincode" => "required",
            "city" => "required",
            "lane" => "required",
        ]);
        $upd = DB::table('user_register')->where("id", $id)->update($valid);
                if(1 || $upd){
                    return redirect('profile')->with(['status' => "Address Updated Successfully..."]);
                }else{
                    //
                }
    }

    //===================================================================================================

}
