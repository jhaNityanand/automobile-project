<?php

namespace App\Http\Controllers;

use App\Models\PayType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use File;

class PayTypeController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->session()->get('id');
        if($id){
            return view('other.pay_type');
        }else{
            return redirect("admin");
        }
    }

    public function payTypeRecord(Request $request)
    {
        $id = $request->session()->get('id');
        if($id){
            $dis = PayType::all();
            return view('record.pay_type', ["view" => $dis]);
        }else{
            return redirect("admin");
        }
    }

    public function loadDataPayType(Request $request)
    {
        $id = $request->session()->get('id');
        if($id){
            return redirect('displayPayType');
        }else{
            return redirect("admin");
        }
    }

    public function store(Request $request)
    {
        $name = $request->name;
        $sel = DB::table("pay_type")->where("name", $name)->count('name');

        if($sel > 0){
            echo "PayType Already Exits in Your Database";
        }else{
            $insert = PayType::insert(["name" => $name,]);

            if($insert){
                echo " New Payment Type Inserted Successfully... <b> (" . $name . ") </b>";
            }else{
                //
            }
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->delete_id;
        $view = PayType::where("id", $id)->first();
        $delete = DB::table("pay_type")->where("id", $id)->delete();

        if($delete){
            echo "Selected Payment Type Deleted Successfully... <b> (" . $view->name . ") </b>";
        }else{
            //
        }
    }

    public function viewUpdatePayType(Request $request)
    {
        $id = $request->update_id;
        $view = PayType::where("id", $id)->first();

        $request->session()->put("PayType_id", $view->id);
        echo $view->name;
    }

    public function updatePayType(Request $request)
    {
        $id = $request->session()->get("PayType_id");
        $name = $request->cat_update;

        $update = PayType::where("id", $id)->update(["name" => $name]);
        if($update){
            echo "Record Updated Successfully... <b> (" . $name . ") </b>";
            $request->session()->forget("PayType_id");
        }else{
            //
        }
    }
}
