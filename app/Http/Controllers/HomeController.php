<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

session_start();

class HomeController extends Controller
{
    public function index()
    {
        $cate_product = DB::table('category_product')->orderby('category_id','asc')->get();

        $all_product = DB::table('product')->orderby('product_id','desc')->limit(8)->get();

        return view('pages\home')->with('cate_product',$cate_product)->with('all_product',$all_product);
    }

    public function product_by_cate($category_id)
    {
        $cate_product = DB::table('category_product')->orderby('category_id','asc')->get();

        $all_product = DB::table('product')->where('category_id',$category_id)->get();

        $result = DB::table('category_product')->where('category_id',$category_id)->first();

        Session::put('cate_productbycate',$result->category_name);
        Session::put('catedesc_productbycate',$result->category_desc);

        return view('pages\product_by_cate')->with('cate_product',$cate_product)->with('all_product',$all_product);
    }

    public function search(Request $res)
    {
        $key = $res->keyword;

        $cate_product = DB::table('category_product')->orderby('category_id','asc')->get();

        $all_product = DB::table('product')->orderby('product_id','desc')->where('product_name','like','%'.$key.'%')->get();

        return view('pages\search')->with('cate_product',$cate_product)->with('all_product',$all_product);
    }

    public function contact()
    {
        $cate_product = DB::table('category_product')->orderby('category_id','asc')->get();

        return view('pages\contact')->with('cate_product',$cate_product);
    }

    public function sendcontact(Request $res)
    {
        $cate_product = DB::table('category_product')->orderby('category_id','asc')->get();

        $data = array();
        $data['user_name']=$res->user_name;
        $data['mess_subject']=$res->mess_subject;
        $data['mess_content']=$res->mess_content;

        DB::table('contact')->insert($data);

        Session::put('message','Gửi thành công');

        return view('pages\contact')->with('cate_product',$cate_product);
    }
}
