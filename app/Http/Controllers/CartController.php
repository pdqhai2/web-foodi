<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Cart;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

session_start();

class CartController extends Controller
{
    public function show_cart()
    {
        $cate_product = DB::table('category_product')->orderby('category_id','asc')->get();
        return view('pages\cart')->with('cate_product',$cate_product);
    }

    public function add_to_cart(Request $request)
    {
        $productid = $request->product_hidden;
        $productqty = $request->qty;
        
        $product = DB::table('product')->where('product_id',$productid)->first();

        $data['id'] = $productid;
        $data['qty'] = $productqty;
        $data['name'] = $product->product_name;
        $data['price'] = $product->product_price;
        $data['weight'] = $product->product_price;
        $data['options']['image'] = $product->product_image;

        Cart::add($data);

        return Redirect::to('/my-cart');
    }

    public function add_to_cart_2(Request $request)
    {
        $productid = $request->product_hidden;
        $productqty = 1;
        
        $product = DB::table('product')->where('product_id',$productid)->first();

        $data['id'] = $productid;
        $data['qty'] = $productqty;
        $data['name'] = $product->product_name;
        $data['price'] = $product->product_price;
        $data['weight'] = $product->product_price;
        $data['options']['image'] = $product->product_image;

        Cart::add($data);

        return Redirect::to('/my-cart');
    }

    public function delete_row($rowId)
    {
        Cart::update($rowId,0);
        return Redirect::to('/my-cart');
    }

    public function update_cart($rowId,Request $request)
    {
        $qty = $request->quantity;
        Cart::update($rowId,$qty);
        return Redirect::to('/my-cart');
    }
    
    public function save_cart($user_usename)
    {
        $date = Carbon::now('Asia/Ho_Chi_Minh');
        //Get date and time
        $stringDate = $date->toDateTimeString();

        $stringDateCart = $date->toDateString();
        $stringTimeCart = $date->toTimeString();
        
        $cartname = $user_usename.'-'.rand(0,99).'-'.$stringDate;

        $data=array();
        $data['identifier']=$cartname;
        $data['user_usename']=$user_usename;
        $data['cart_date']=$stringDateCart;
        $data['cart_time']=$stringTimeCart;

        Cart::store($cartname);
        Cart::destroy();

        DB::table('cart')->insert($data);

        Session::put('message','Đặt hàng thành công');

        return Redirect::to('/my-history-cart');
    }

    public function destroy_cart()
    {
        Cart::destroy();
        return Redirect::to('/my-cart');
    }

    public function new_cart(Request $res)
    {
        $count = Cart::count();
        if ($count>0)
        {
            $user_usename = $res->user_usename;

            $date = Carbon::now('Asia/Ho_Chi_Minh');
            //Get date and time
            $stringDate = $date->toDateTimeString();
    
            $stringDateCart = $date->toDateString();
            $stringTimeCart = $date->toTimeString();
            
            $cartname = $user_usename.'-'.rand(0,99).'-'.$stringDate;
    
            $data=array();
            $data['identifier']=$cartname;
            $data['user_usename']=$user_usename;
            $data['cart_date']=$stringDateCart;
            $data['cart_time']=$stringTimeCart;
            $data['cart_status'] = 0;
    
            Cart::store($cartname);
            Cart::destroy();
    
            DB::table('cart')->insert($data);
    
            Session::put('message','Đặt hàng thành công');
            
            $all_cart = DB::table('cart')->where('user_usename',$user_usename)->where('cart_status',0)->get();
            $manager_all_cart = view('user.cart_history')->with('all_cart',$all_cart);
            return view('layouts.user_profile')->with('user.cart_history',$manager_all_cart);
        }
        else
        {
            Session::put('message','Đơn hàng đang trống. Vui lòng kiểm tra lại đơn hàng');

            return Redirect::to('/my-cart');
        }
    }

    public function history_cart(Request $res)
    { 
        $user_usename = $res->user_usename;

        $all_cart = DB::table('cart')->where('user_usename',$user_usename)
            ->orderby('cart_date','desc')
            ->orderby('cart_time','desc')
            ->get();
        $manager_all_cart = view('user.cart_history')->with('all_cart',$all_cart);
        return view('layouts.user_profile')->with('user.cart_history',$manager_all_cart);
    }

    public function nhan_hang(Request $res)
    {
        $date = Carbon::now('Asia/Ho_Chi_Minh');
        $stringDateCart = $date->toDateString();

        $data = array();
        $data['cart_dategiao'] = $stringDateCart;
        $data['cart_status'] = 2;

        $identifier = $res->identifier;
        $user_usename = $res->user_usename;

        DB::table('cart')->where('identifier',$identifier)->update($data);

        $user_usename = $res->user_usename;
        $all_cart = DB::table('cart')->where('user_usename',$user_usename)->where('cart_status',2)->get();
        $manager_all_cart = view('user.cart_history')->with('all_cart',$all_cart);
        return view('layouts.user_profile')->with('user.cart_history',$manager_all_cart);
    }

    public function view_dangduyet(Request $res)
    { 
        $user_usename = $res->user_usename;

        $all_cart = DB::table('cart')->where('user_usename',$user_usename)->where('cart_status',0)
            ->orderby('cart_date','desc')
            ->orderby('cart_time','desc')
            ->get();
        $manager_all_cart = view('user.cart_history')->with('all_cart',$all_cart);
        return view('layouts.user_profile')->with('user.cart_history',$manager_all_cart);
    }

    public function view_danggiao(Request $res)
    { 
        $user_usename = $res->user_usename;

        $all_cart = DB::table('cart')->where('user_usename',$user_usename)->where('cart_status',1)
            ->orderby('cart_date','desc')
            ->orderby('cart_time','desc')
            ->get();
        $manager_all_cart = view('user.cart_history')->with('all_cart',$all_cart);
        return view('layouts.user_profile')->with('user.cart_history',$manager_all_cart);
    }

    public function view_dagiao(Request $res)
    { 
        $user_usename = $res->user_usename;

        $all_cart = DB::table('cart')->where('user_usename',$user_usename)->where('cart_status',2)
            ->orderby('cart_date','desc')
            ->orderby('cart_time','desc')
            ->get();
        $manager_all_cart = view('user.cart_history')->with('all_cart',$all_cart);
        return view('layouts.user_profile')->with('user.cart_history',$manager_all_cart);
    }
}
