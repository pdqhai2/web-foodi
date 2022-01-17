<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

session_start();

class UserController extends Controller
{
    public function login_interface()
    {
        return view('user.login');
    }

    public function new_account(Request $request)
    {
        $check_user = DB::table('user')->where('user_usename',$request->user_usename)->count();

        if ($check_user>0)
        {
            Session::put('message','Tài khoản đã tồn tại');
            return Redirect::to('/user-login');
        }
        else
        {
            $data = array();
            $data['user_usename'] = $request->user_usename;
            $data['user_pass'] = md5($request->user_pass);
            $data['user_name'] = $request->user_usename;
    
            $pass2 = $request->user_pass2;

            if ($pass2 == $request->user_pass)
            {
                DB::table('user')->insert($data);
                Session::put('user_name',$data['user_name']);
                Session::put('user_usename',$request->user_usename);
                return Redirect::to('/');
            }
            else
            {
                Session::put('message','2 mật khẩu không khớp nhau');
                return Redirect::to('/user-login');
            }
        }
    }

    public function check_login(Request $request)
    {
        $check_user = DB::table('user')->where('user_usename',$request->user_usename)->count();

        if ($check_user>0)
        {
            $user_usename = $request->user_usename;
            $user_pass = md5($request->user_pass);

            $result = DB::table('user')->where('user_usename',$user_usename)->where('user_pass',$user_pass)->first();

            if($result)
            {
                Session::put('user_usename',$user_usename);
                Session::put('user_name',$result->user_name);
                return Redirect::to('/');
            }
            else 
            {
                Session::put('message','Tài khoản hoặc mật khẩu sai');
                return Redirect::to('/user-login');
            }
        }
        else
        {
            Session::put('message','Tài khoản không tồn tại');
            return Redirect::to('/user-login');
        }
    }

    public function log_out()
    {
        Session::put('user_name',null);
        Session::put('user_usename',null);
        return Redirect::to('/');
    }

    public function view_profile(Request $res)
    {
        $user_usename = $res->user_usename;
        $user_profile = DB::Table('user')->where('user_usename',$user_usename)->get();
        $manage_userprofile = view('user\profile')->with('user_profile',$user_profile);
        return view('layouts.user_profile')->with('user\profile',$manage_userprofile);
    }

    public function view($user_usename)
    {
        $user_profile = DB::Table('user')->where('user_usename',$user_usename)->get();
        $manage_userprofile = view('user\profile')->with('user_profile',$user_profile);
        return view('layouts.user_profile')->with('user\profile',$manage_userprofile);
    }

    // edit
        public function edit($user_usename)
        {
            $user_profile = DB::Table('user')->where('user_usename',$user_usename)->get();
            $manage_userprofile = view('user\edit_profile')->with('user_profile',$user_profile);
            return view('layouts.user_profile')->with('user\edit_profile',$manage_userprofile);
        }

        public function update(Request $request, $user_usename)
        {
            $data = array();
            $data['user_name'] = $request->user_name;
            $data['user_birthday'] = $request->user_birthday;
            $data['user_phone'] = $request->user_phone;
            $data['user_address'] = $request->user_address;
            
            DB::table('user')->where('user_usename',$user_usename)->update($data);

            $user_profile = DB::Table('user')->where('user_usename',$user_usename)->get();
            $manage_userprofile = view('user\profile')->with('user_profile',$user_profile);
            return view('layouts.user_profile')->with('user\profile',$manage_userprofile);
        }
    // end edit

    // security
        public function user_security(Request $res)
        {
            $user_usename = $res->user_usename;
            $user_profile = DB::Table('user')->where('user_usename',$user_usename)->get();
            $manage_userprofile = view('user\security')->with('user_profile',$user_profile);
            return view('layouts.user_profile')->with('user\security',$manage_userprofile);
        }

        public function changepass($user_usename)
        {
            $user_profile = DB::Table('user')->where('user_usename',$user_usename)->get();
            $manage_userprofile = view('user\edit_security')->with('user_profile',$user_profile);
            return view('layouts.user_profile')->with('user\edit_security',$manage_userprofile);
        }

        public function updatepass(Request $res)
        {
            $user_usename = $res->user_usename;
            $user_pass = md5($res->user_passcurrent);

            $result = DB::table('user')->where('user_usename',$user_usename)->where('user_pass',$user_pass)->first();

            if($result)
            {
                $passnew1 = $res->user_passnew;
                $passnew2 = $res->user_passnew2;

                if ($passnew2 == $passnew1)
                {
                    $data = array();

                    $data['user_pass'] = md5($passnew1);

                    DB::table('user')->where('user_usename',$user_usename)->update($data);

                    Session::put('user_name',null);
                    Session::put('user_usename',null);
                    Session::put('message','Đổi mật khẩu thành công, vui lòng đăng nhập lại');

                    return Redirect::to('/user-login');
                }
                else 
                {
                    Session::put('message','Vui lòng nhập 2 mật khẩu mới giống nhau');
                    return Redirect::to('/user-login');
                }
                
            }
            else 
            {
                Session::put('message','Mật khẩu hiện tại sai');
                return Redirect::to('/user-login');
            }
        }
    // end security
}
