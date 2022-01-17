<?php
	$user_usename = Session::get('user_usename');
	$user_name = Session::get('user_name');
	// $user_id = Session::get('user_id');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{{$user_name}}</title>
    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend//css/main.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{asset('public/frontend/images/icon.png')}}">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<!-- <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li> -->
								<li><a href="#"><i class="fa fa-envelope"></i> foodi0516@vku.udn.vn</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://mail.google.com/mail"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a class="nav-link" href="{{ route('fr.homepage')}}"><img src="{{asset('public/frontend/images/logo.png')}}" class="logo" alt=""></a>
						</div>
					</div>

					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="{{route('cart.show')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
								<li><a href="{{URL::to('/user-profile/'.$user_usename)}}"><i class="fa fa-user"></i> {{$user_name}}</a></li>
								<li><a href="{{route('us.logout')}}">Đăng xuất</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		
	</header><!--/header-->

	<section>
		<div class="container" style="margin-left:2%">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<!-- <h2>Danh mục</h2> -->
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                            <div class="panel panel-default">
                                <div class="panel-heading">
									<h4 class="panel-title">
										<form action="{{route('us.profile')}}" method="post">
											{{ csrf_field() }}
											<input type="hidden" name="user_usename" value="{{$user_usename}}">
											<input type="submit" value="THÔNG TIN CÁ NHÂN" style="background-color:white;border:none">
										</form>
									</h4>
                                </div>								
                                <div class="panel-heading"></div>
                                <div class="panel-heading"></div>
                                <div class="panel-heading">
									<h4 class="panel-title">
										<form action="{{route('us.baomat')}}" method="post">
											{{ csrf_field() }}
											<input type="hidden" name="user_usename" value="{{$user_usename}}">
											<input type="submit" value="BẢO MẬT TÀI KHOẢN" style="background-color:white;border:none">
										</form>
									</h4>
                                </div>
								<div class="panel-heading"></div>
                                <div class="panel-heading"></div>
                                <div class="panel-heading">
                                    <h4 class="panel-title">
										<form action="{{route('cart.ls')}}" method="post">
											{{ csrf_field() }}
											<input type="hidden" name="user_usename" value="{{$user_usename}}">
											<input type="submit" value="LỊCH SỬ MUA HÀNG" style="background-color:white;border:none">
										</form>
									</h4>
                                </div>
                            </div>
						</div>
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					@yield('content')
				</div>
			</div>
		</div>
	</section>
    
	<!-- footer -->
	
	<footer id="footer">		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						<div class="single-widget">
							<h2>GIỚI THIỆU</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Về chúng tôi</a></li>
								<li><a href="#">Tin tức - sự kiện</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="single-widget">
							<h2>CHĂM SÓC KHÁCH HÀNG</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Hướng dẫn mua hàng</a></li>
								<li><a href="#">Chính sách bán hàng</a></li>
								<li><a href="#">Chính sách bảo mật</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="single-widget">
							<h2>THÔNG TIN LIÊN HỆ</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Facebook</a></li>
								<li><a href="#">Email</a></li>
								<li><a href="#">Địa chỉ : 07 Bạch Đằng, Hải Châu, Đà Nẵng</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="single-widget">
							<a class="nav-link" href="{{ route('fr.homepage')}}"><img src="{{asset('public/frontend/images/logo.png')}}" class="footerlogo" alt=""></a>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2021 FOODI Inc. All rights reserved.</p>
					<p class="pull-right"><a href="{{ route('ad.login')}}" style="font-weight:bolder;color:red">Đăng nhập với tư cách admin</a></p>
				</div>
			</div>
		</div>
		
	</footer>
	<!--/Footer-->
	

  
    <script src="{{asset('public/frontend/js/jquery.js')}}"></script>
	<script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/price-range.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/frontend/js/main.js')}}"></script>
</body>
</html>