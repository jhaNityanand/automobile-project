<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use File;

class CityController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->session()->get('id');
        if($id){
            return view('other.city');
        }else{
            return redirect("admin");
        }
    }

    public function cityRecord(Request $request)
    {
        $id = $request->session()->get('id');
        if($id){
            $dis = City::all();
            return view('record.city', ["view" => $dis]);
        }else{
            return redirect("admin");
        }
    }

    public function loadDataCity(Request $request)
    {
        $id = $request->session()->get('id');
        if($id){
            return redirect('display');
        }else{
            return redirect("admin");
        }
    }

    public function store(Request $request)
    {
        $name = $request->name;
        $sel = DB::table("city")->where("name", $name)->count('name');

        if($sel > 0){
            echo "City Already Exits in Your Database";
        }else{
            $insert = City::insert(["name" => $name,]);

            if($insert){
                echo " New City Inserted Successfully... <b> (" . $name . ") </b>";
            }else{
                echo "Can't Inserted New City???";
            }
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->delete_id;
        $view = City::where("id", $id)->first();
        $delete = DB::table("city")->where("id", $id)->delete();

        if($delete){
            echo "Selected City Deleted Successfully... <b> (" . $view->name . ") </b>";
        }else{
            echo "Can't Deleted City???";
        }
    }

    public function viewUpdateCity(Request $request)
    {
        $id = $request->update_id;
        $view = City::where("id", $id)->first();

        $request->session()->put("city_id", $view->id);
        echo $view->name;
    }

    public function updateCity(Request $request)
    {
        $id = $request->session()->get("city_id");
        $name = $request->cat_update;

        $update = City::where("id", $id)->update(["name" => $name]);
        if($update){
            echo "Record Updated Successfully... <b> (" . $name . ") </b>";
            $request->session()->forget("city_id");
        }else{
            //
        }
    }
}
