<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

session_start();

class ProductController extends Controller
{
    public function add_product()
    {
        $all_category_product = DB::table('category_product')->get();
        $manager_category_product = view('admin\Product\add')->with('all_category_product',$all_category_product);
        return view('layouts.admin')->with('admin\Product\add',$manager_category_product);
    }

    public function view_product()
    {
        $all_product = DB::table('product')
            ->join('category_product','category_product.category_id','=','product.category_id')
            ->get();
        $manager_product = view('admin\Product\view')->with('all_product',$all_product);
        return view('layouts.admin')->with('admin\Product\view',$manager_product);
    }

    public function save_product(Request $request)
    {
        $data = array();
        $data['category_id'] = $request->category_product_id;
        $data['product_name'] = $request->product_name;
        $data['product_desc'] = $request->product_desc;
        $data['product_price'] = $request->product_price;

        $get_image = $request->file('product_image');
        
        if($get_image)
        {
            $get_name = $get_image->getClientOriginalName();
            $name = current(explode('.',$get_name));
            $new_image = $name.'-'.rand(0,99).'.'.$get_image->getClientOriginalExtension() ;

            $get_image->move('public/upload/product',$new_image);

            $data['product_image'] = $new_image;

            DB::table('product')->insert($data);
            Session::put('message','Thêm thành công');
            return Redirect::to('/view-product');
        }

        DB::table('product')->insert($data);
        Session::put('message','Thêm thành công');
        return Redirect::to('/view-product');

        // echo '<pre>';
        // print_r($data);
        // echo '<pre>';
    }
    
    public function edit_product($product_id)
    {
        $cate_product = DB::table('category_product')->orderby('category_id','desc')->get();

        $edit_product = DB::table('product')->where('product_id',$product_id)->get();
        $manager_product = view('admin\Product\edit')
            ->with('edit_product',$edit_product)
            ->with('cate_product',$cate_product);

        return view('layouts.admin')->with('admin\Product\edit',$manager_product);
    }

    public function update_product(Request $request, $product_id)
    {
        $data = array();
        $data['category_id'] = $request->category_product_id;
        $data['product_name'] = $request->product_name;
        $data['product_desc'] = $request->product_desc;
        $data['product_price'] = $request->product_price;

        $get_image = $request->file('product_image');
        if($get_image)
        {
            $get_name = $get_image->getClientOriginalName();
            $name = current(explode('.',$get_name));
            $new_image = $name.'-'.rand(0,99).'.'.$get_image->getClientOriginalExtension() ;

            $get_image->move('public/upload/product',$new_image);

            $data['product_image'] = $new_image;

            DB::table('product')->where('product_id',$product_id)->update($data);
            Session::put('message','Cập nhật thành công');
            return Redirect::to('/view-product');
        }

        DB::table('product')->where('product_id',$product_id)->update($data);
        Session::put('message','Cập nhật thành công');
        return Redirect::to('/view-product');
    }

    public function delete_product($product_id)
    {
        DB::table('product')->where('product_id',$product_id)->delete();
        Session::put('message','Xóa thành công');
        return Redirect::to('/view-product');
    }

    public function property_product($product_id)
    {
        $product = DB::table('product')->where('product_id',$product_id)->get();
        
        foreach($product as $key => $value)
        {
            $category_id = $value->category_id;
        }
        $recomend = DB::table('product')->where('category_id',$category_id)->whereNotIn('product_id',[$product_id])->get();

        $cate_product = DB::table('category_product')->orderby('category_id','asc')->get();

        return view('pages\product')->with('cate_product',$cate_product)->with('product',$product)
        ->with('recomend',$recomend);

    }
}
