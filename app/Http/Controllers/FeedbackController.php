<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FeedbackController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->session()->get("user_id_login");

        if($id){
            return view("home.feedback");
        }else{
            return redirect("login");
        }
    }

    public function store(Request $request)
    {
        $id = $request->session()->get("user_id_login");
        $valid = $this->validate($request, [
            "comment" => "required",
        ]);
        $valid["user_id"] = $id;

        $ins = Feedback::insert($valid);
        if($ins){
            return redirect("/")->with(["status" => "Thanks For Feedback..."]);
        }else{
            //
        }
    }
}
