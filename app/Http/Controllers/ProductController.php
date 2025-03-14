<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use File;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->session()->get("id");
        if($id){
            return view("product.product");
        }else{
            return redirect("admin");
        }
    }

    public function getDataCat(Request $request)
    {
        $cat = $request->c_name;
        $get = DB::table('sub-category')->where("cat_name", $cat)->get();
        echo '<option value="">Select Sub-Category</option>';
        foreach ($get as $sel)
        {
            echo '<option id="option" value="'.$sel->name.'">'.$sel->name.'</option>';
        }
    }

    public function store(Request $request)
    {
        $u_id =  $request->session()->get('p_user_id');
        $u_name =  $request->session()->get('p_user_name');
        $a_name =  $request->session()->get('name');
        $a_id =  $request->session()->get('id');
        if($u_id){
            $id = $u_id;
            $u_name = $u_name;
        }else{
            $id = $a_id;
            $u_name = $a_name;
        }

        $name = $request->name;
        $description = $request->description;
        $price = $request->price;
        $brand = $request->brand;
        $cat = $request->cat;
        $sub_cat = $request->sub_cat;
        $status = $request->status;

        $image = $request->file('image');

        $images = [];
        foreach($image as $file){
            $img_name = Str::random(10);
            $img_ext = strtolower($file->getClientOriginalExtension());
            $img_names = $img_name.'.'.$img_ext;
            $destination = public_path('image/product/');
            $file->move($destination , $img_names);
            $images[] = $img_names;
        }
        $image = implode(",", $images);

        $insert = Product::insert([
            "user_id" => $id,
            "name" => $name,
            "description" => $description,
            "price" => $price,
            "brand" => $brand,
            "cat" => $cat,
            "sub_cat" => $sub_cat,
            "image" => $image,
            "status" => $status,
            "user_name" => $u_name,
        ]);

        $count = DB::table("brand")->where("name", $brand)->first();
        $count = $count->total_product + 1;
        $update_brand = DB::table("brand")->where("name", $brand)->update(["total_product" => $count]);

        $count = DB::table("category")->where("name", $cat)->first();
        $count = $count->total_product + 1;
        $update_cat = DB::table("category")->where("name", $cat)->update(["total_product" => $count]);

        if($insert || $update_brand || $update_cat){
            echo "New Products Inserted Successfully... <b> (" . $name . ") </b>";
        }else{
            echo "Can't Inserted New Products???";
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->delete_id;
        $sel =Product::where("id", $id)->first();

        $count = $sel->brand;
        $count1 = DB::table("brand")->where("name", $count)->first();
        $count1 = $count1->total_product - 1;
        $update_brand = DB::table("brand")->where("name", $count)->update(["total_product" => $count1]);

        $cat = $sel->cat;
        $cat1 = DB::table("category")->where("name", $cat)->first();
        $cat1 = $cat1->total_product - 1;
        $update_cat = DB::table("category")->where("name", $cat)->update(["total_product" => $cat1]);

        $del =Product::where("id", $id)->delete();

        foreach(explode(",",$sel->image) as $pic){
            $parh = public_path("image/product/");
            file::delete($parh.$pic);
        }
        if($del || $update_cat || $update_brand){
            echo "Selected Product Deleted Successfully... <b> (" . $sel->name . ") </b>";
        }else{
            echo "Can't Deleted Selected Product???";
        }
    }

    public function update(Request $request)
    {
        $id = $request->session()->get("product_id");
        $name = $request->name_u;
        $description = $request->description_u;
        $price = $request->price_u;
        $brand = $request->brand_u;
        $old_brand = $request->brand_uu;
        $cat = $request->cat_u;
        $sub_cat = $request->sub_cat_u;
        $status = $request->status_u;
        $image_u = $request->file('image_u');

        if($image_u == "")
        {
            $update = Product::where("id", $id)->update([
                "name" => $name,
                "description" => $description,
                "price" => $price,
                "brand" => $brand,
                "cat" => $cat,
                "sub_cat" => $sub_cat,
                "status" => $status,
            ]);

            if($brand != $old_brand)
            {
                $count = DB::table("brand")->where("name", $old_brand)->first();
                $count = $count->total_product - 1;

                $count1 = DB::table("brand")->where("name", $brand)->first();
                $count1 = $count1->total_product + 1;

                DB::table("brand")->where("name", $old_brand)->update(["total_product" => $count]);
                DB::table("brand")->where("name", $brand)->update(["total_product" => $count1]);
            }

            if($update){
                echo "Products Updated Successfully... <b> (" . $name . ") </b>";
            }else{
                echo "Can't Updated Product???";
            }
        }else
        {
            $sel =Product::where("id", $id)->first();
            foreach(explode(",",$sel->image) as $pic){
                $path = public_path("image/product/");
                file::delete($path.$pic);
            }

            $images = [];
            foreach($image_u as $file){
                $img_name = Str::random(10);
                $img_ext = strtolower($file->getClientOriginalExtension());
                $img_names = $img_name.'.'.$img_ext;
                $destination = public_path('image/product/');
                $file->move($destination , $img_names);
                $images[] = $img_names;
            }
            $image = implode(",", $images);

            $update = Product::where("id", $id)->update([
                "name" => $name,
                "description" => $description,
                "price" => $price,
                "brand" => $brand,
                "cat" => $cat,
                "sub_cat" => $sub_cat,
                "image" => $image,
                "status" => $status,
            ]);
            if($update){
                echo "Products Updated Successfully... <b> (" . $name . ") </b>";
            }else{
                echo "Can't Updated Product???";
            }
        }
    }

    public function view(Request $request)
    {
        $id = $request->update_id;
        $data_u = Product::where("id", $id)->first();
        $request->session()->put('product_id', $data_u->id);
        return array(
            'name' => $data_u->name,
            'description' => $data_u->description,
            'price' => $data_u->price,
            'brand' => $data_u->brand,
            'cat' => $data_u->cat,
            'sub_cat' => $data_u->sub_cat,
            'image' => $data_u->image,
            'status' => $data_u->status,
        );
    }

//-------------------------------------------------------------------------------------------------------------------

    public function productRecord(Request $request)
    {
        $id = $request->session()->get("id");
        if($id){
            return view("record.product");
        }else{
            return redirect("/");
        }
    }

    public function productData(Request $request)
    {
        $id = $request->session()->get("id");
        if($id){
            $data = DB::table('product')->get();
            return view("record.product", ["data" => $data]);
        }else{
            return redirect("/");
        }
    }
    public function loadData(Request $request)
    {
        $id = $request->session()->get("id");
        if($id){
            return redirect("productRecord");
        }else{
            return redirect("/");
        }
    }

//-------------------------------------------------------------------------------------------------------------------

    public function get_data(Request $request)
    {
        $id = $request->session()->get('id');
        if($id){
            $brand = DB::table("brand")->get()->sortDesc();
            $cat = DB::table("category")->get()->sortDesc();
            $Sub_cat = DB::table("sub-category")->get()->sortDesc();

            return view('product.product', ['view' => $brand, 'data' => $cat, 'sub' => $Sub_cat]);
        }else{
            return redirect("admin");
        }
    }

    public function multipleDelete(Request $request)
    {
        $id = $request->id;

        foreach($id as $del){
            $sel =Product::where("id", $del)->first();
            $count = $sel->brand;
            $count1 = DB::table("brand")->where("name", $count)->first();
            $count1 = $count1->total_product - 1;

            DB::table("brand")->where("name", $count)->update(["total_product" => $count1]);
        }

        foreach($id as $del){
            $sel =Product::where("id", $del)->first();
            $count = $sel->cat;
            $count1 = DB::table("category")->where("name", $count)->first();
            $count1 = $count1->total_product - 1;

            DB::table("category")->where("name", $count)->update(["total_product" => $count1]);
        }

        foreach($id as $select){
            $del_sel = Product::where("id", $select)->first();
            foreach(explode(",",$del_sel->image) as $pic){
                $path = public_path("image/product/");
                file::delete($path.$pic);
            }
            $del =Product::where("id", $select)->delete();
            if($del)
            {
                $delete_at_id[] =  $select;
            }
        }
        $abc = implode(" , ",$delete_at_id);
        echo $abc . " Selected ID is Deleted... ";
    }
}
