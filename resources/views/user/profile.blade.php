@extends('layouts.user_profile')
@section('content')
    <div class="features_items" style="margin-bottom:30px"><!--features_items-->
		<h2 class="title text-center">THÔNG TIN CÁ NHÂN</h2>
        @foreach($user_profile as $key => $user)
            <div style="text-align:center;margin-bottom:50px">
                <img style="height:170px;border-radius:100px" alt="" src="{{asset('public/upload/user/user_not_have_avatar.png')}}">
            </div>
            <div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-2">
                    <div class="panel-heading">
                        <h4 class="panel-title">Họ và tên</h4>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="panel-heading">
                        <h5 class="panel-title" style="font-family:Tahoma">{{$user->user_name}}</h5>
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
                        <h5 class="panel-title" style="font-family:Tahoma">{{$user->user_birthday}}</h5>
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
                        <h5 class="panel-title" style="font-family:Tahoma">{{$user->user_phone}}</h5>
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
                        <h5 class="panel-title" style="font-family:Tahoma">{{$user->user_address}}</h5>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top:20px">
				<div class="col-sm-9"></div>
				<div class="col-sm-3">
                    <a href="{{URL::to('/edit-profile/'.$user->user_usename)}}">Cập nhật thông tin cá nhân</a>
                </div>
            </div>
        @endforeach
	</div><!--features_items-->
@endsection