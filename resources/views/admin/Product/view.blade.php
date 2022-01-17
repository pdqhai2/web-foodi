@extends('layouts.admin')
@section('title','Danh sách sản phẩm')
@section('content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Danh sách sản phẩm
            </div>
            <!-- <div class="row w3-res-tb">
                <div class="col-sm-5 m-b-xs">
                    <select class="input-sm form-control w-sm inline v-middle">
                    <option value="0">Bulk action</option>
                    <option value="1">Delete selected</option>
                    <option value="2">Bulk edit</option>
                    <option value="3">Export</option>
                    </select>
                    <button class="btn btn-sm btn-default">Apply</button>                
                </div>
                <div class="col-sm-4"></div>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input type="text" class="input-sm form-control" placeholder="Search">
                        <span class="input-group-btn">
                            <button class="btn btn-sm btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div> -->
            <div style="text-align:center;padding:10px">
                <?php
                    $message = Session::get('message');
                    if($message) {
                        echo '<span style="text-align:center;color:green;font-weight:bolder;width:100%">'.$message.'</span>';
                        Session::put('message',null);
                    }
                ?>
            </div>
            <div class="table-responsive">
                <table class="table table-striped b-t b-light">
                    <thead>
                        <tr>
                            <!-- <th style="width:20px;">
                                <label class="i-checks m-b-none">
                                    <input type="checkbox"><i></i>
                                </label>
                            </th> -->
                            <th>Danh mục</th>
                            <th>Tên</th>
                            <th>Giá (vnd)</th>
                            <th>Hình ảnh</th>
                            <th style="width:100px;"></th>
                            <th style="width:70px;"></th>

                        </tr>
                    </thead>

                    <tbody>
                        @foreach($all_product as $key => $prod)
                            <tr>
                                <!-- <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td> -->
                                <td>{{ $prod->category_name }}</td>
                                <td>{{ $prod->product_name }}</td>
                                <td>{{ $prod->product_price }}</td>
                                <td><img src="public/upload/product/{{ $prod->product_image }}" alt="" style="height:100px"></td>
                                <td>
                                    <a href="{{URL::to('/edit-product/'.$prod->product_id)}}" class="active editing" ui-toggle-class="">Cập nhật</a>
                                    <!-- <p>Cập nhật</p> -->
                                </td>
                                <td>
                                    <a onclick="return confirm('Chắc chắn muốn xóa ?')" href="{{URL::to('/delete-product/'.$prod->product_id)}}" class="active deleting" ui-toggle-class="" style="color:red">Xóa</a>
                                    <!-- <p>Xóa</p> -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <footer class="panel-footer">
                <div class="row">
                    <div class="col-sm-5 text-center">
                        <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                    </div>
                    <div class="col-sm-7 text-right text-center-xs">                
                        <ul class="pagination pagination-sm m-t-none m-b-none">
                            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                            <li><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                            <li><a href="">4</a></li>
                            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection