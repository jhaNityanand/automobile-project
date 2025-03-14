<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\validate;

class ViewController extends Controller
{
    public function index(Request $request)
    {
        $sel_brand = DB::table("brand")->inRandomOrder()->limit(10)->where("total_product", ">", 0)->get();
        $sel_cat = DB::table("category")->inRandomOrder()->limit(10)->where("total_product", ">", 0)->get();
        $sel_pro = DB::table("product")->inRandomOrder()->limit(3)->get()->sortDesc();

        return view("welcome", ["view" => $sel_brand, "view1" => $sel_cat, "view2" => $sel_pro]);
    }

//----------------------------------------------BRAND PAGE-----------------------------------------------------------

    public function brandPage($b_id)
    {
        $sel = Db::table("brand")->where("id", $b_id)->first();
        $sel_pro = Db::table("product")->where("brand", $sel->name)->get();
        return view("home.brand", ["name" => $sel->name, "view" => $sel_pro]);
    }
    public function allBrand()
    {
        $sel = DB::table("brand")->where("total_product", ">", 0)->inRandomOrder()->get();
        return view("home.all-brand", ["view" => $sel]);
    }

//----------------------------------------------------CATEGORY PAGE---------------------------------------------------

    public function categoryPage($c_id)
    {
        $sel = Db::table("category")->where("id", $c_id)->first();
        $sel_pro = Db::table("product")->where("cat", $sel->name)->get();
        return view("home.category", ["name" => $sel->name, "view" => $sel_pro]);
    }

    public function allCategory()
    {
        $sel = Db::table("category")->inRandomOrder()->get();
        return view("home.all-category", ["view" => $sel]);
    }

//------------------------------------------------CONTACT AND ABOUT---------------------------------------------------------

    public function contact(Request $request)
    {
        $u_id = $request->session()->get("user_id_login");

        if($u_id){
            return view("home.contact");
        }else{
            return redirect("login");
        }
    }

    public function about(Request $request)
    {
        $u_id = $request->session()->get("user_id_login");
        $count_pro = DB::table("product")->count("id");
        $count_ord = DB::table("order")->count("id");
        $count_usr = DB::table("user_register")->count("id");

        if($u_id){
            return view("home.about", ["view1" => $count_pro, "view2" => $count_ord, "view3" => $count_usr]);
        }else{
            return redirect("login");
        }
    }

//------------------------------------------------SINGLE PRODUCT---------------------------------------------------------

    public function singleProduct(Request $request)
    {
        $product_id = $request->p_id;
        $single_product = DB::table("product")->where("id", $product_id)->first();

        $sel_cat = DB::table("category")->inRandomOrder()->limit(10)->where("total_product", ">", 0)->get();
        $sel_brand = DB::table("brand")->inRandomOrder()->limit(10)->where("total_product", ">", 0)->get();
        $sel_pro = DB::table("product")->inRandomOrder()->limit(10)->get();
        $count = DB::table("review")->where("product_id", $product_id)->count();
        $sel_rev = DB::table("review")->inRandomOrder()->where("product_id", $product_id)->get();

        return view("home.single", ["single" => $single_product, "view" => $sel_brand, "view1" => $sel_cat, "view2" => $sel_pro, "count" => $count, "view3" => $sel_rev]);
    }

//------------------------------------------------REVIEW---------------------------------------------------------

    public function saveReview(Request $request)
    {
        $user_name = $request->user_name;
        $product_id = $request->product_id;
        $message = $request->message;
        $rating = $request->star;

        if($user_name){
            $insert = DB::table('review')->insert([
                "user_name" => $user_name,
                "product_id" => $product_id,
                "rating" => $rating,
                "message" => $message,
            ]);
            if($insert){
                return redirect("singleProduct?p_id=$product_id")->with(["status" => "Thanks, For Review This Product"]);
            }else{
                return redirect("singleProduct?p_id=$product_id")->with(["status" => "Sorry, Somthings is Missing"]);
            }
        }else{
            return redirect("login");
        }
    }

//-----------------------------------------------CART-------------------------------------------------------------

    public function cart(Request $request)
    {
        $user_id = $request->session()->get('user_id_login');
        if($user_id){
            $select = DB::table("cart")->where("cart.user_id", $user_id)
                    ->select("cart.total_price as c_price", "cart.product_qty as c_qty", "product.id as p_id", "product.name as p_name", "product.price as p_price", "product.image as p_image", "product.status as p_status")
                    ->join("product", "cart.product_id", "=", "product.id")
                    ->orderBy('cart.id', 'desc')
                    ->get();
            $count = DB::table("cart")->where("user_id", $user_id)->count('product_id');
            $sum = DB::table("cart")->where("user_id", $user_id)->sum('total_price');

            return view("home.cart", ["data" => $select, "count_cart" => $count, "sum_cart" => $sum]);
        }else{
            return redirect("login");
        }
    }

    public function saveCart(Request $request)
    {
        $user_id = $request->session()->get('user_id_login');
        $product_id = $request->btn_cart;
        $pro = DB::table("product")->where("id", $product_id)->first();
        $total_price = $pro->price;

        if($user_id){
            $select = DB::table('cart')->where("user_id", $user_id)->where("product_id", $product_id)->count('product_id');
            if($select < 1){
                $insert = DB::table('cart')->insert([
                    "user_id" => $user_id,
                    "product_id" => $product_id,
                    "total_price" => $total_price,
                ]);
                if($insert){
                    return redirect()->back()->with(["status" => "Product Add in Your Cart Successfully.."]);
                }else{
                    //
                }
            }else{
                return redirect()->back()->with(["status" => "Product Already Exits in Your Cart.."]);
            }
        }else{
            return redirect("login");
        }
    }

    public function deleteCart($id)
    {
        $del = DB::table('cart')->where("product_id", $id)->delete();
        if($del){
            return redirect()->back()->with(["status" => "Product Deleted in Your Cart Successfully.."]);
        }else{
            //
        }
    }

    public function updateCart(Request $request)
    {
        $user_id = $request->session()->get('user_id_login');
        $pid = $request->pid;
        $sel = DB::table("cart")->where("product_id", $pid)->where("user_id", $user_id)->first();
        $sel_p = DB::table("product")->where("id", $pid)->first();
        return array("qty" => $sel->product_qty, "name" => $sel_p->name, "price" => $sel_p->price, "id" => $pid);
    }

    public function saveUpdateCart(Request $request)
    {
        $user_id = $request->session()->get('user_id_login');
        $n = $request->name;
        $p = $request->price;
        $q = $request->qty;
        $i = $request->id;
        $total_p = $p * $q;

        $upd = DB::table("cart")->where("product_id", $i)->where("user_id", $user_id)->update([
            "product_qty" => $q,
            "total_price" => $total_p
        ]);
        if($upd){
            echo "Cart Product Updated Successfully...(".$n.")";
        }else{
            echo "Cart Product Not Change.";
        }
    }

//-------------------------------------------------WISHLIST-------------------------------------------------------

    public function wish(Request $request)
    {
        $user_id = $request->session()->get('user_id_login');
        if($user_id){
            $select = DB::table("wish")->where("wish.user_id", $user_id)
                    ->select("product.id as p_id", "product.name as p_name", "product.price as p_price", "product.image as p_image", "product.status as p_status")
                    ->join("product", "wish.product_id", "=", "product.id")
                    ->orderBy('wish.id', 'desc')
                    ->get();
            return view("home.wish", ["data" => $select]);
        }else{
            return redirect("login");
        }
    }

    public function saveWish(Request $request)
    {
        $user_id = $request->session()->get('user_id_login');
        $product_id = $request->wis;

        if($user_id){
            $select = DB::table('wish')->where("user_id", $user_id)->where("product_id", $product_id)->count('product_id');
            if($select < 1){
                $insert = DB::table('wish')->insert([
                    "user_id" => $user_id,
                    "product_id" => $product_id,
                ]);
                if($insert){
                    return redirect()->back()->with(["status" => "Product Add in Your Wishlist Successfully.."]);
                }else{
                    //
                }
            }else{
                return redirect()->back()->with(["status" => "Product Already Exits in Your Wishlist.."]);
            }
        }else{
            return redirect("login");
        }
    }

    public function deleteWish($id)
    {
        $del = DB::table('wish')->where("product_id", $id)->delete();
        if($del){
            return redirect()->back()->with(["status" => "Product Deleted in Your Wishlist Successfully.."]);
        }else{
            //
        }
    }

    public function addWishCart(Request $request, $id)
    {
        $user_id = $request->session()->get('user_id_login');
        $product_id = $id;

        if($user_id){
            $sel = DB::table('product')->where("id", $product_id)->first();
            $select = DB::table('cart')->where("user_id", $user_id)->where("product_id", $product_id)->count('product_id');
            if($select < 1){
                $del = DB::table("wish")->where("user_id", $user_id)->where("product_id", $id)->delete();
                $insert = DB::table('cart')->insert([
                    "user_id" => $user_id,
                    "product_id" => $product_id,
                    "total_price" => $sel->price,
                ]);
                if($insert && $del){
                    return redirect()->back()->with(["status" => "Product Add in Your Cart Successfully.."]);
                }else{
                    //
                }
            }else{
                return redirect()->back()->with(["status" => "Product Already Exits in Your Cart.."]);
            }
        }else{
            return redirect("login");
        }
    }

//--------------------------------------------------CHECKOUT------------------------------------------------------
    
    public function checkout(Request $request, $qty, $pro)
    {
        $user_id = $request->session()->get('user_id_login');

        $sel_user = DB::table("user_register")->where("id", $user_id)
                    ->select("name", "phone", "email", "address", "city", "lane", "landmark", "pincode")
                    ->first();
        $city = DB::table("city")->get();
        $pay_type = DB::table("pay_type")->get();

        if($user_id){
            if($qty == 0 && $pro == 0)
            {
                $sum = DB::table("cart")->where("user_id", $user_id)->sum('total_price');
                $sel = DB::table("cart")->where("user_id", $user_id)->get();
                return view("home.checkout")->with(["data" => $sel, "sum_cart" => $sum, "qty" => $qty, "pro" => $pro, "user_record" => $sel_user, "city" => $city, "pay_type" => $pay_type]);
            }else{
                $product = DB::table("product")->where("id", $pro)->first();

                $datas =array(
                    "name" => $product->name,
                    "quentity" => $qty,
                    "id" => $product->id,
                    "price" => $product->price,
                    "total" => $product->price * $qty,
                );
                
                return view("home.checkout")->with(["datas" => $datas, "qty" => $qty, "pro" => $pro, "user_record" => $sel_user, "city" => $city, "pay_type" => $pay_type]);
                }
        }else{
            return redirect("login");
        }
    }

//---------------------------------------------checkout--------------------------------------------------

    public function allCheckoutData(Request $request)
    {
        $user_id = $request->session()->get('user_id_login');
        
        $user = $this->validate($request, [
            "name" => "required",
            "email" => "required",
            "phone" => "required",
            "address" => "required",
            "city" => "required",
            "lane" => "required",
            "landmark" => "required",
            "pincode" => "required",
        ]);

        $order = $this->validate($request, [
            "pay_type" => "required",
            "product_id" => "required",
            "product_name" => "required",
            "quantity" => "required",
            "price" => "required",
            "total_price" => "required",
        ]);
        $order['user_id'] = $user_id;

        date_default_timezone_set("Asia/Kolkata");
        $in = array();
        $in['product_id'] = implode(",", $order['product_id']);
        $in['product_name'] = implode(",", $order['product_name']);
        $in['quantity'] = implode(",", $order['quantity']);
        $in['price'] = implode(",", $order['price']);
        $in['total_price'] = implode(",", $order['total_price']);
        $in['pay_type'] = $order['pay_type'];
        $in['user_id'] = $order['user_id'];
        $in['order_date'] = date("Y-m-d h:i");

        $request->session()->put(["order_data" => $in]);

        $data = array(
            "total_price" => array_sum($order['total_price']).'00',
            "phone" => $user['phone'],
            "email" => $user['email'],
            "name" => $user['name'],
        );

        User::where("id", $user_id)->update($user);

        if($order['pay_type'] == 7)
        {
            foreach($order['product_id'] as $val){
                DB::table("cart")->where("user_id", $user_id)->where("product_id", $val)->delete();
            }
            $order = Order::create($in);
            $order_id = $order->id;
            $request->session()->put(["invoice_id" => $order_id]);

            $sel = Order::where("id", $order_id)->first();
            $sel_user = DB::table("user_register")->select("user_register.*", "city.name as city")
            ->join("city", "user_register.city", "city.id")->where("user_register.id", $user_id)->first();

            return view("record.invoice", ["data" => $sel, "user" => $sel_user, "message" => "Successfully..."]);
        }
        else
        {
            return view("home.payment", ["data" => $data]);
        }
    }

//--------------------------------------------------SEARCH------------------------------------------------------

    public function search(Request $request)
    {
        $names = $request->search;
        $request->session()->put("search", $names);
        $name = $request->session()->get("search");

        $product = DB::table("product")->where("name", "like", "%".$name."%")->get();

        if(count($product) > 0){
            return view("home.search", ["view" => $product]);
        }else{
            return redirect("/")->with(["status" => "No Product Found...(".$name.")"]);
        }
    }
}
