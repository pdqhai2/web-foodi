@extends('layouts.user_profile')
@section('content')
    <div class="features_items" style="margin-bottom:30px"><!--features_items-->
		<h2 class="title text-center">chỉnh sửa thông tin cá nhân</h2>
        @foreach($user_profile as $key => $user)
            <form role="form" action="{{URL::to('/update-profile/'.$user->user_usename)}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-2">
                        <div class="panel-heading">
                            <h4 class="panel-title">Họ và tên</h4>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="panel-heading">
                            <input type="text" style="width:80%" name="user_name" value="{{$user->user_name}}" id="exampleInputEmail1">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-2">
                        <div class="panel-heading">
                            <h4 class="panel-title">Ngày sinh</h4>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="panel-heading">
                            <input type="text" style="width:80%" name="user_birthday" value="{{$user->user_birthday}}" id="exampleInputEmail1">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-2">
                        <div class="panel-heading">
                            <h4 class="panel-title">Điện thoại</h4>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="panel-heading">
                            <input type="text" style="width:80%" name="user_phone" value="{{$user->user_phone}}" id="exampleInputEmail1">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-2">
                        <div class="panel-heading">
                            <h4 class="panel-title">Địa chỉ</h4>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="panel-heading">
                            <textarea name="user_address" style="width:80%;background-color:white;border:1px solid black;color:black" rows="5">{{$user->user_address}}</textarea>
                            <!-- <input type="text" style="width:80%" name="user_address" value="{{$user->user_address}}" id="exampleInputEmail1"> -->
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top:20px">
                    <div style="text-align:center">
                        <button type="submit" name="add_product" class="btn btn-success">Cập nhật</button>
                    </div>
                </div>
            </form>
        @endforeach
	</div><!--features_items-->
@endsection