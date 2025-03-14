<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use File;

class CategoryController extends Controller
{
    public function viewCategory(Request $request)
    {
        $id = $request->session()->get('id');
        if($id){
            return view('category.category');
        }else{
            return redirect("admin");
        }
    }

    public function saveCategory(Request $request)
    {
        $name = $request->cat;
        $sel = DB::table("category")->where("name", $name)->count('name');

        if($sel > 0){
            echo "Category Already Exits in Your Database";
        }else{
            $inssert = Category::insert(["name" => $name,]);

            if($inssert){
                echo "New Category Inserted Successfully... <b> (" . $name . ") </b>";
            }else{
                echo "Can't Inserted New Category???";
            }
        }
    }

    public function displayCategory(Request $request)
    {
        $id = $request->session()->get('id');
        if($id){
            $dis = DB::table("category")->get()->sortDesc();
            return view('category.category', ['view' => $dis]);
        }else{
            return redirect("admin");
        }
    }

    public function viewUpdateCategory(Request $request)
    {
        $id = $request->update_id;
        $display = DB::table("category")->where("id", $id)->first();
        echo $display->name;
        $request->session()->put('update_id', $display->id);
    }

    public function updateCategory(Request $request)
    {
        $id = $request->session()->get("update_id");
        $name = $request->cat_update;

        $update_sub = Category::where("id", $id)->first();
        $request->session()->put('update_sub', $update_sub->name);

        $update = Category::where("id", $id)->update(["name" => $name,]);

        $sub_id = $request->session()->get("update_sub");
        $sub_cat = DB::table("sub-category")->where("cat_name", $sub_id)->update(["cat_name" => $name,]);
        $product = DB::table("product")->where("cat", $sub_id)->update(["cat" => $name,]);

        if($update || $sub_cat || $product){
            echo "Updated Category Successfully... <b> (" . $update_sub->name . ") </b>";
            $request->session()->forget('update_id');
            $request->session()->forget('update_sub');
        }else{
            echo "Can't Updated Category???";
        }
    }

    public function deleteCategory(Request $request)
    {
        $id = $request->delete_id;

        $delete_view = DB::table("category")->where("id", $id)->first();
        $request->session()->put('delete_id', $delete_view->name);

        $sub_id = $request->session()->get("delete_id");

        $view1 = DB::table("product")->where("cat", $sub_id)->first();


        if($view1){
            $brand1 = $view1->image;
            foreach(explode(",",$brand1) as $pic){
                $parh = public_path("image/product/");
                file::delete($parh.$pic);
            }
        }else{
            //
        }

        $sub_cat = DB::table("sub-category")->where("cat_name", $sub_id)->delete();
        $product = DB::table("product")->where("cat", $sub_id)->delete();
        $delete = DB::table("category")->where("id", $id)->delete();

        if($delete || $sub_cat || $product){

            echo "Category Deleted Successfully... <b> (" . $delete_view->name . ") </b>";
            $request->session()->forget('delete_id');
        }else{
            echo "Can't Deleted Category???";
        }
    }
}
