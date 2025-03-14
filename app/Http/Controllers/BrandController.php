<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use File;

class BrandController extends Controller
{
    public function viewBrand(Request $request)
    {
        $id = $request->session()->get('id');
        if($id){
            return view('category.brand');
        }else{
            return redirect("admin");
        }
    }

    public function saveBrand(Request $request)
    {
        $name = $request->brand;
        $logo = $request->file('logo');

        $sel = DB::table("brand")->where("name", $name)->count('name');

        if($sel > 0){
            echo "Brand Already Exits in Your Database";
        }else{
            $path = public_path('image/brand/');
            $ext = strtolower($logo->getClientOriginalExtension());
            $img_name = Str::random(10);
            $logo_name = $img_name . '.' . $ext;
            $logo->move($path,$logo_name);

            $insert = Brand::insert(["name" => $name, "logo" => $logo_name,]);

            if($insert){
                echo "New Brand Inserted Successfully...";
            }else{
                echo "Can't Inserted New Brand???";
            }
        }
    }

    public function displayBrand(Request $request)
    {
        $id = $request->session()->get('id');
        if($id){
            $dis = DB::table("brand")->get()->sortDesc();
            return view('category.brand', ['view' => $dis]);
        }else{
            return redirect("admin");
        }
    }

    public function viewUpdateBrand(Request $request)
    {
        $id = $request->update_id;
        $display = DB::table("brand")->where("id", $id)->first();
        $request->session()->put('brand_id', $display->id);

        return array("name" => $display->name, "logo" => $display->logo);
    }

    public function updateBrand(Request $request)
    {
        $id = $request->session()->get("brand_id");
        $name = $request->brand_update;
        $logo = $request->file("logo_update");

        $get = Brand::where("id", $id)->first();

        if($logo == ""){
            $update = Brand::where("id", $id)->update(["name" => $name,]);
            $update1 = DB::table("product")->where("brand", $get->name)->update(["brand" => $name,]);

            if($update || $update1){
                echo "Updated Brand Successfully...";
                $request->session()->forget('brand_id');
            }else{
                echo "Can't Updated Brand???";
            }
        }else{
            $view = DB::table("brand")->where("id", $id)->first();

            $path = public_path('image/brand/');
            File::delete($path.$view->logo);

            if($view){
                $path = public_path("image/brand/");
                $ext = $logo->getClientOriginalExtension();
                $img_name = Str::random(10);
                $logo_name = $img_name . "." . $ext;
                $logo->move($path,$logo_name);

                $update = Brand::where("id", $id)->update(["name" => $name, "logo" => $logo_name]);
                $update1 = DB::table("product")->where("brand", $get->name)->update(["brand" => $name,]);

                if($update || $update1){
                    echo "Updated Brand Successfully...";
                    $request->session()->forget('brand_id');
                }else{
                    echo "Can't Updated Brand???";
                }
            }else{
                echo "Brand Logo Not Found...";
            }
        }
    }

    public function deleteBrand(Request $request)
    {
        $id = $request->delete_id;
        $view = DB::table("brand")->where("id", $id)->first();
        $brand = $view->name;

        $view1 = DB::table("product")->where("brand", $brand)->first();
        $brand1 = $view1->image;

        foreach(explode(",",$brand1) as $pic){
            $parh = public_path("image/product/");
            file::delete($parh.$pic);
        }

        $path = public_path('image/brand/');
        File::delete($path.$view->logo);

        if($view || $view1){
            $delete = DB::table("brand")->where("id", $id)->delete();
            $delete1 = DB::table("product")->where("brand", $brand)->delete();

            if($delete || $delete1){
                echo "Brand Deleted Successfully...";
            }else{
                echo "Can't Deleted Brand???";
            }
        }else{
            echo "Brand Logo Not Found...";
        }
    }
}
