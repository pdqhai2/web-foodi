@extends('layouts.admin')
@section('title','Sửa danh mục')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật danh mục sản phẩm
                </header>
                <div style="text-align:center;padding:30px">
                    <?php
                        $message = Session::get('message');
                        if($message) {
                            echo '<span style="text-align:center;color:green;font-weight:bolder;width:100%">'.$message.'</span>';
                            Session::put('message',null);
                        }
                    ?>
                </div>
                <div class="panel-body">
                    @foreach($edit_category_product as $key => $edit_value)
                        <div class="position-center">
                            <form role="form" action="{{URL::to('/update-category/'.$edit_value->category_id)}}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" value="{{ $edit_value->category_name }}" class="form-control" name="category_product_name" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea style="resize:none" row="3" name="category_product_desc" class="form-control" id="exampleInputPassword1" placeholder="Password">{{ $edit_value->category_desc }}</textarea>
                                </div>
                                <div style="text-align:center;padding:30px">
                                    <button type="submit" name="update_category_product" class="btn btn-success">Cập nhật</button>
                                </div>
                            </form>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>
@endsection