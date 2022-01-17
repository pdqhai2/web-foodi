@extends('layouts.admin')
@section('title','Thêm danh mục')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm danh mục sản phẩm
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{route('cate.save')}}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên danh mục</label>
                                <input type="text" class="form-control" name="category_product_name" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả danh mục</label>
                                <textarea style="resize:none" row="3" name="category_product_desc" class="form-control" id="exampleInputPassword1" placeholder="Password"></textarea>
                            </div>
                            <div style="text-align:center;padding:30px">
                                <button type="submit" name="add_category_product" class="btn btn-success">Thêm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection