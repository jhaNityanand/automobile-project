<?php

namespace App\Http\Controllers;

use FontLib\Table\Type\name;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class ReportController extends Controller
{
    public function product_stock(Request $request, $name)
    {
        $id = $request->session()->get('id');
        
        if($name == "InStock"){
            $stock = "In Stock";
        }
        else {
            $stock = "Out of Stock";
        }
        $request->session()->put('stock', $stock);

        $status = DB::table('product')->where("status", $stock)->get();
        $status1 = DB::table('product')->where("status", $stock)->first();

        if($id){
            if(count($status) > 0 && $status1){
                return view("report.product_stock", ["status" => $status, "status1" => $status1]);
            }else{
                return redirect()->back()->with(["status" => "No Record Found..."]);
            }
        }else{
            return redirect("admin");
        }
    }

    public function product_stock_download(Request $request)
    {
        $id = $request->session()->get('id');
        $stock = $request->session()->get('stock');

        $status = DB::table('product')->where("status", $stock)->get();
        $status1 = DB::table('product')->where("status", $stock)->first();

        if($id){
            if($status && $status1){
                $pdf = PDF:: loadView("report.product_stock", ["status" => $status, "status1" => $status1])->setOptions(['defaultFont' => 'sans-serif']);
                return $pdf->download('Product-Stock-Details.pdf');
            }else{
                echo "Some Technical Error...";
            }
        }else{
            return redirect("admin");
        }
    }

    //-----------------------------------PRODUCT STOCK END----------------------------------------------------

    public function order_region(Request $request, $name)
    {
        $id = $request->session()->get('id');
        $request->session()->put('stock', $name);
        
        if($name == "Returned"){
            $status = DB::table('order_return')
            ->select("order_return.*", "user_register.name as u_name", "order.product_name as p_name")
            ->join("user_register", "order_return.user_id", "user_register.id")
            ->join("order", "order_return.order_id", "order.id")
            ->get();
        $status1 = DB::table('order')->where("status", 3)->first();
        }
        else if($name == "Canceled"){
            $status = DB::table('order_cancel')
            ->select("order_cancel.*", "user_register.name as u_name", "order.product_name as p_name")
            ->join("user_register", "order_cancel.user_id", "user_register.id")
            ->join("order", "order_cancel.order_id", "order.id")
            ->get();
        $status1 = DB::table('order')->where("status", 2)->first();
        }
        else {
            //
        }

        if($id){
            if(count($status) > 0 && $status1){
                return view("report.order_region", ["status" => $status, "status1" => $status1]);
            }else{
                return redirect()->back()->with(["status" => "No Record Found..."]);
            }
        }else{
            return redirect("admin");
        }
    }

    public function order_region_download(Request $request)
    {
        $id = $request->session()->get('id');
        $stock = $request->session()->get('stock');

        if($stock == "Returned"){
            $status = DB::table('order_return')
            ->select("order_return.*", "user_register.name as u_name", "order.product_name as p_name")
            ->join("user_register", "order_return.user_id", "user_register.id")
            ->join("order", "order_return.order_id", "order.id")
            ->get();
        $status1 = DB::table('order')->where("status", 3)->first();
        }
        else if($stock == "Canceled"){
            $status = DB::table('order_cancel')
            ->select("order_cancel.*", "user_register.name as u_name", "order.product_name as p_name")
            ->join("user_register", "order_cancel.user_id", "user_register.id")
            ->join("order", "order_cancel.order_id", "order.id")
            ->get();
        $status1 = DB::table('order')->where("status", 2)->first();
        }
        else {
            //
        }

        if($id){
            if($status && $status1){
                $pdf = PDF:: loadView("report.order_region", ["status" => $status, "status1" => $status1])->setOptions(['defaultFont' => 'sans-serif']);
                return $pdf->download('Order-Region-Details.pdf');
            }else{
                echo "Some Technical Error...";
            }
        }else{
            return redirect("admin");
        }
    }

    //-----------------------------------ORDER REGION END----------------------------------------------------

    public function order_status(Request $request, $name)
    {
        $id = $request->session()->get('id');
        
        if($name == "Received"){
            $stock = 0;
        }
        else if($name == "Delivered"){
            $stock = 1;
        }
        else {
            //
        }
        $request->session()->put('stock', $stock);

        $status = DB::table('order')
            ->select("order.*", "user_register.name as u_name")
            ->join("user_register", "order.user_id", "user_register.id")
            ->where("order.status", $stock)->get();

        $status1 = DB::table('order')->where("status", $stock)->first();

        if($id){
            if(count($status) > 0 && $status1){
                return view("report.order_rec_del", ["status" => $status, "status1" => $status1]);
            }else{
                return redirect()->back()->with(["status" => "No Record Found..."]);
            }
        }else{
            return redirect("admin");
        }
    }

    public function order_status_download(Request $request)
    {
        $id = $request->session()->get('id');
        $stock = $request->session()->get('stock');

        $status = DB::table('order')
            ->select("order.*", "user_register.name as u_name")
            ->join("user_register", "order.user_id", "user_register.id")
            ->where("order.status", $stock)->get();

        $status1 = DB::table('order')->where("status", $stock)->first();

        if($id){
            if($status && $status1){
                $pdf = PDF:: loadView("report.order_rec_del", ["status" => $status, "status1" => $status1])->setOptions(['defaultFont' => 'sans-serif']);
                return $pdf->download('Order-Status-Details.pdf');
            }else{
                echo "Some Technical Error...";
            }
        }else{
            return redirect("admin");
        }
    }

    //-----------------------------------ORDER STATUS END----------------------------------------------------

    public function order_report(Request $request)
    {
        $id = $request->session()->get('id');
        
        $status = DB::table('order')
            ->select("order.*", "user_register.name as u_name")
            ->join("user_register", "order.user_id", "user_register.id")
            ->get();

        if($id){
            if(count($status) > 0){
                return view("report.order", ["status" => $status]);
            }else{
                return redirect()->back()->with(["status" => "No Record Found..."]);
            }
        }else{
            return redirect("admin");
        }
    }

    public function order_report_download(Request $request)
    {
        $id = $request->session()->get('id');

        $status = DB::table('order')
            ->select("order.*", "user_register.name as u_name")
            ->join("user_register", "order.user_id", "user_register.id")
            ->get();

        if($id){
            if($status){
                $pdf = PDF:: loadView("report.order", ["status" => $status])->setOptions(['defaultFont' => 'sans-serif']);
                return $pdf->download('Order-Report.pdf');
            }else{
                echo "Some Technical Error...";
            }
        }else{
            return redirect("admin");
        }
    }

    //-----------------------------------ORDER REPORTS END----------------------------------------------------

    public function product_report(Request $request)
    {
        $id = $request->session()->get('id');
        
        $status = DB::table('product')->get();

        if($id){
            if(count($status) > 0){
                return view("report.product", ["status" => $status]);
            }else{
                return redirect()->back()->with(["status" => "No Record Found..."]);
            }
        }else{
            return redirect("admin");
        }
    }

    public function product_report_download(Request $request)
    {
        $id = $request->session()->get('id');

        $status = DB::table('product')->get();

        if($id){
            if($status){
                $pdf = PDF:: loadView("report.product", ["status" => $status])->setOptions(['defaultFont' => 'sans-serif']);
                return $pdf->download('Product-Report.pdf');
            }else{
                echo "Some Technical Error...";
            }
        }else{
            return redirect("admin");
        }
    }

    //-----------------------------------PRODUCT REPORTS END----------------------------------------------------

    public function brand_report(Request $request)
    {
        $id = $request->session()->get('id');
        
        $status = DB::table('brand')->orderBy("total_product", "DESC")->get();

        if($id){
            if(count($status) > 0){
                return view("report.brand", ["status" => $status]);
            }else{
                return redirect()->back()->with(["status" => "No Record Found..."]);
            }
        }else{
            return redirect("admin");
        }
    }

    public function brand_report_download(Request $request)
    {
        $id = $request->session()->get('id');

        $status = DB::table('brand')->get();

        if($id){
            if($status){
                $pdf = PDF:: loadView("report.brand", ["status" => $status])->setOptions(['defaultFont' => 'sans-serif']);
                return $pdf->download('Brand-Report.pdf');
            }else{
                echo "Some Technical Error...";
            }
        }else{
            return redirect("admin");
        }
    }

    //-----------------------------------BRAND REPORTS END----------------------------------------------------

    public function user_report(Request $request)
    {
        $id = $request->session()->get('id');
        
        $status = DB::table('user_register')->get();

        if($id){
            if(count($status) > 0){
                return view("report.user", ["status" => $status]);
            }else{
                return redirect()->back()->with(["status" => "No Record Found..."]);
            }
        }else{
            return redirect("admin");
        }
    }

    public function user_report_download(Request $request)
    {
        $id = $request->session()->get('id');

        $status = DB::table('user_register')->get();

        if($id){
            if($status){
                $pdf = PDF:: loadView("report.user", ["status" => $status])->setOptions(['defaultFont' => 'sans-serif']);
                return $pdf->download('User-Report.pdf');
            }else{
                echo "Some Technical Error...";
            }
        }else{
            return redirect("admin");
        }
    }

    //-----------------------------------USER REPORTS END----------------------------------------------------

}