@extends('layouts.user_profile')
@section('content')
    <div class="features_items" style="margin-bottom:30px"><!--features_items-->
		<h2 class="title text-center">BẢO MẬT THÔNG TIN CÁ NHÂN</h2>
        @foreach($user_profile as $key => $user)
            <form action="{{route('us.doipass')}}" method="post">
            {{ csrf_field() }}

                <div style="text-align:center;margin-bottom:50px">
                    <img style="height:170px;border-radius:100px" alt="" src="{{asset('public/upload/user/user_not_have_avatar.png')}}">
                </div>
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-4">
                        <div class="panel-heading">
                            <h4 class="panel-title">Tên đăng nhập</h4>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="panel-heading">
                            <input type="hidden" name="user_usename" value="{{$user->user_usename}}">
                            <h5 class="panel-title" style="font-family:Tahoma">{{$user->user_usename}}</h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-4">
                        <div class="panel-heading">
                            <h4 class="panel-title">Mật khẩu hiện tại</h4>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="panel-heading">
                            <input type="password" style="width:80%" name="user_passcurrent" id="exampleInputEmail1">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-4">
                        <div class="panel-heading">
                            <h4 class="panel-title">Mật khẩu mới</h4>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="panel-heading">
                            <input type="password" style="width:80%" name="user_passnew" id="exampleInputEmail1">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-4">
                        <div class="panel-heading">
                            <h4 class="panel-title">Xác nhận mật khẩu mới</h4>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="panel-heading">
                            <input type="password" style="width:80%" name="user_passnew2" id="exampleInputEmail1">
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