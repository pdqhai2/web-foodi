@extends('layouts.admin')
@section('title','Cập nhật sản phẩm')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật sản phẩm
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        @foreach($edit_product as $key => $prod)
                            <form role="form" action="{{URL::to('/update-product/'.$prod->product_id)}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Danh mục sản phẩm</label>
                                    <select class="form-control input-lg m-bot15" name="category_product_id">
                                        @foreach($cate_product as $key => $cate_prod)
                                            @if($cate_prod->category_id == $prod->category_id)
                                                <option selected value="{{ $cate_prod->category_id }}">{{ $cate_prod->category_name }}</option>
                                            @else
                                                <option value="{{ $cate_prod->category_id }}">{{ $cate_prod->category_name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" class="form-control" name="product_name" id="exampleInputEmail1" value="{{ $prod->product_name }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mô tả sản phẩm</label>
                                    <textarea class="form-control" name="product_desc" rows="5">{{ $prod->product_desc }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm (vnd)</label>
                                    <input type="text" class="form-control" name="product_price" id="exampleInputEmail1" value="{{ $prod->product_price }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hình ảnh sản phẩm</label>
                                    <input type="file" class="form-control" name="product_image" id="exampleInputEmail1">
                                </div>
                                <div style="text-align:center;padding:30px">
                                    <button type="submit" name="add_product" class="btn btn-success">Cập nhật</button>
                                </div>
                            </form>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection