@extends('layouts.frontend')
@section('title','Liên hệ')
@section('content')
	<?php
		$user_name = Session::get('user_name');
	?>
    <div class="contact-form">
        <h2 class="title text-center">liên hệ với chúng tôi</h2>
        <?php
            $message = Session::get('message');
            if($message) {
                echo '<span style="text-align:center;color:green;font-weight:bolder;width:100%;font-size:30px">'.$message.'</span>';
                Session::put('message',null);
            }
        ?>
        <div class="status alert alert-success" style="display: none"></div>
        <form id="main-contact-form" class="contact-form row" name="contact-form" action="{{route('fr.sendcontact')}}" method="post">
        {{ csrf_field() }}
            @if(isset($user_name))
                <div class="form-group col-md-6">
                    <input type="text" value="{{$user_name}}" readonly="true" name="user_name" class="form-control" required="required" placeholder="Tên">
                </div>
            @else
                <div class="form-group col-md-6">
                    <input type="text" name="user_name" class="form-control" required="required" placeholder="Họ và tên">
                </div>
            @endif
            <div class="form-group col-md-6">
                <input type="text" name="mess_subject" class="form-control" required="required" placeholder="Tiêu đề">
            </div>
            <div class="form-group col-md-12">
                <textarea name="mess_content" required="required" class="form-control" rows="8" placeholder="Nội dung"></textarea>
            </div>                        
            <div class="form-group col-md-12" style="text-align:center">
                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Gửi">
            </div>
        </form>
    </div>
	
	<div class="contact-info">
        <h2 class="title text-center">Thông tin liên hệ</h2>
        <address>
            <p>Foodi Inc.</p>
            <p><b>Địa chỉ :</b> 07 Bạch Đằng, Hải Châu, Đà Nẵng</p>
            <p><b>Email :</b> foodi0516@vku.udn.vn</p>
        </address>
        <div class="social-networks">
            <h2 class="title text-center">Mạng xã hội</h2>
            <ul>
                <li>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-google-plus"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-youtube"></i></a>
                </li>
            </ul>
        </div>
    </div>
@endsection