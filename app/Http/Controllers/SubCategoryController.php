<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use File;

class SubCategoryController extends Controller
{
    public function displaySubCategory(Request $request)
    {
        $id = $request->session()->get('id');
        if($id){
            $dis = DB::table("sub-category")->get()->sortDesc();
            $display_sub = DB::table("category")->get()->sortDesc();

            return view('category.sub-category', ['data' => $display_sub],['view' => $dis]);
        }else{
            return redirect("admin");
        }
    }

    public function viewSubCategory(Request $request)
    {
        $id = $request->session()->get('id');
        if($id){
            return view('category.sub-category');
        }else{
            return redirect("admin");
        }
    }

    public function saveSubCategory(Request $request)
    {
        $name = $request->cat;
        $cat_id = $request->cat_name;
        $sel = DB::table("sub-category")->where("name", $name)->where("cat_name", $cat_id)->count('id');

        if($sel > 0){
            echo "Sub-Category Already Exits in Your Database";
        }else{
            $inssert = SubCategory::insert(["name" => $name,"cat_name" => $cat_id]);

            if($inssert){
                echo "New Sub-Category Inserted Successfully...";
            }else{
                echo "Can't Inserted New Sub-Category???";
            }
        }
    }

    public function viewUpdateSubCategory(Request $request)
    {
        $id = $request->update_id;
        $display = DB::table("sub-category")->where("id", $id)->first();
        $request->session()->put('update_sub', $display->id);

        return array("name" => $display->name,"cat_name" => $display->cat_name);
    }

    public function updateSubCategory(Request $request)
    {
        $id = $request->session()->get("update_sub");
        $name = $request->cat_update;
        $cat_name = $request->cat_name_update;

        $delete_view = DB::table("sub-category")->where("id", $id)->first();
        $request->session()->put('update_sid', $delete_view->name);

        $sub_sid = $request->session()->get("update_sid");

        $product = DB::table("product")->where("sub_cat", $sub_sid)->update(["sub_cat" => $name]);
        $update = SubCategory::where("id", $id)->update(["name" => $name, "cat_name" => $cat_name]);

        if($update || $product){
            echo "Updated Sub-Category Successfully... <b> (" . $name . ") </b>";
            $request->session()->forget('update_sub');
            $request->session()->forget('update_sid');
        }else{
            echo "Can't Updated Sub-Category???";
        }
    }

    public function deleteSubCategory(Request $request)
    {
        $id = $request->delete_id;

        $delete_view = DB::table("sub-category")->where("id", $id)->first();
        $request->session()->put('delete_sid', $delete_view->name);

        $sub_sid = $request->session()->get("delete_sid");

        $view1 = DB::table("product")->where("sub_cat", $sub_sid)->first();
        $brand1 = $view1->image;

        foreach(explode(",",$brand1) as $pic){
            $parh = public_path("image/product/");
            file::delete($parh.$pic);
        }

        $product = DB::table("product")->where("sub_cat", $sub_sid)->delete();
        $delete = DB::table("sub-category")->where("id", $id)->delete();

        if($delete || $product){
            echo "Sub-Category Deleted Successfully... <b> (" . $delete_view->name . ") </b>";
            $request->session()->forget('delete_sid');
        }else{
            echo "Can't Deleted Sub-Category???";
        }
    }
}
