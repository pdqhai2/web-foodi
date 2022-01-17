<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

session_start();

class CategoryController extends Controller
{
    // add interface
        public function add()
        {
            return view('admin\CategoryProduct\add');
        }
    // end add interface


    // save to DB
        public function save(Request $request)
        {
            $data = array();
            $data['category_name'] = $request->category_product_name;
            $data['category_desc'] = $request->category_product_desc;

            // echo '<pre>';
            // print_r($data);
            // echo '<pre>';

            DB::table('category_product')->insert($data);
            Session::put('message','Thêm thành công');
            return Redirect::to('/view-category');
        }
    // end save to DB


    // view
        public function view()
        {
            $all_category_product = DB::table('category_product')->orderby('category_id','asc')->get();
            $manager_category_product = view('admin\CategoryProduct\view')->with('all_category_product',$all_category_product);
            return view('layouts.admin')->with('admin\CategoryProduct\view',$manager_category_product);
        }
    // end view


    // edit
        public function edit($category_id)
        {
            $edit_category_product = DB::table('category_product')->where('category_id',$category_id)->get();
            $manager_category_product = view('admin\CategoryProduct\edit')->with('edit_category_product',$edit_category_product);
            return view('layouts.admin')->with('admin\CategoryProduct\edit',$manager_category_product);
        }

        public function update(Request $request, $category_id)
        {
            $data = array();
            $data['category_name'] = $request->category_product_name;
            $data['category_desc'] = $request->category_product_desc;
            
            DB::table('category_product')->where('category_id',$category_id)->update($data);
            Session::put('message','Cập nhật thành công');
            return Redirect::to('/view-category');
        }
    // end edit


    // delete
        public function delete($category_id)
        {
            DB::table('category_product')->where('category_id',$category_id)->delete();
            Session::put('message','Xóa thành công');
            return Redirect::to('/view-category');
        }
    // end delete
}
