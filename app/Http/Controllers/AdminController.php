<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

session_start();

class AdminController extends Controller
{
    public function show_dashboard(){
        return view('admin\dashboard');
    }

    // new
        public function adminnew()
        {
            return view('admin.new');
        }

        public function adminnew2(Request $request)
        {
            $admin_usename = $request->admin_usename;
            $check_user = DB::table('admin')->where('admin_usename',$request->admin_usename)->count();
            if ($check_user>0)
            {
                Session::put('message','Tài khoản đã tồn tại');
                return Redirect::to('/admin-new');
            }
            else
            {
                $admin_pass = md5($request->admin_pass);
                $data = array();
                $data['admin_usename'] = $request->admin_usename;
                $data['admin_pass'] = md5($admin_pass);
        
                $pass2 = $request->admin_pass2;

                if ($pass2 == $request->admin_pass)
                {
                    DB::table('admin')->insert($data);

                    Session::put('admin_usename',$admin_usename);
                    return Redirect::to('/dashboard');
                }
                else
                {
                    Session::put('message','2 mật khẩu không khớp nhau');
                    return Redirect::to('/admin-new');
                }
            }
        }
    // end new

    // login
        public function login()
        {
            return view('admin.login');
        }

        public function log_in(Request $request)
        {
            $admin_usename = $request->admin_usename;
            $admin_pass = md5($request->admin_pass);

            $result = DB::table('admin')->where('admin_usename',$admin_usename)->where('admin_pass',$admin_pass)->first();
            if($result)
            {
                Session::put('admin_usename',$result->admin_usename);
                return Redirect::to('/dashboard');
            }
            else
            {
                Session::put('message','Xin kiểm tra lại tài khoản và mật khẩu');
                return Redirect::to('/admin-login');
            }
        }
    // end login


    public function log_out()
    {
        Session::put('admin_usename',null);
        return Redirect::to('/admin-login');
    }

    // browse cart
        public function browse_cart()
        {
            $all_cart = DB::table('cart')->where('cart_status',0)->get();
            $manager_all_cart = view('admin.cart.browse')->with('all_cart',$all_cart);
            return view('layouts.admin')->with('admin.cart.browse',$manager_all_cart);
        }

        public function duyet_cart_post(Request $res)
        {
            $data = array();
            $data['cart_status'] = 1;

            $identifier = $res->identifier;

            DB::table('cart')->where('identifier',$identifier)->update($data);

            $all_cart = DB::table('cart')->where('cart_status',0)->get();
            $manager_all_cart = view('admin.cart.browse')->with('all_cart',$all_cart);
            return view('layouts.admin')->with('admin.cart.browse',$manager_all_cart);
        }
    // end browse cart

    // delivery cart
        public function delivery_cart()
        {
            $all_cart = DB::table('cart')->where('cart_status',1)->get();
            $manager_all_cart = view('admin.cart.delivery')->with('all_cart',$all_cart);
            return view('layouts.admin')->with('admin.cart.delivery',$manager_all_cart);
        }
    // end delivery cart

    // delivered cart
        public function delivered_cart()
        {
            $all_cart = DB::table('cart')->where('cart_status',2)->get();
            $manager_all_cart = view('admin.cart.delivered')->with('all_cart',$all_cart);
            return view('layouts.admin')->with('admin.cart.delivered',$manager_all_cart);
        }
    // end delivered cart

    // account
        public function cusaccount()
        {
            $all_cart = DB::table('user')->get();
            $manager_all_cart = view('admin.Account.user')->with('all_cart',$all_cart);
            return view('layouts.admin')->with('admin.Account.user',$manager_all_cart);
        }

        public function adminaccount()
        {
            $all_cart = DB::table('admin')->get();
            $manager_all_cart = view('admin.Account.admin')->with('all_cart',$all_cart);
            return view('layouts.admin')->with('admin.Account.admin',$manager_all_cart);
        }
    // end account

    // contact
        public function cuscontact()
        {
            $all_cart = DB::table('contact')->get();
            $manager_all_cart = view('admin.contact')->with('all_cart',$all_cart);
            return view('layouts.admin')->with('admin.contact',$manager_all_cart);
        }
    // end contact
}
