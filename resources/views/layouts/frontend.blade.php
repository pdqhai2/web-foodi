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
    <title>@yield('title')</title>
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
								@if(isset($user_name))
									<li><a href="{{route('cart.show')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
									<li><a href="{{URL::to('/user-profile/'.$user_usename)}}"><i class="fa fa-user"></i> {{$user_name}}</a></li>
									<li><a href="{{route('us.logout')}}">Đăng xuất</a></li>
								@else
									<li><a href="{{route('us.login')}}"><i class="fa fa-lock"></i> Đăng nhập</a></li>
								@endif
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-8">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{ route('fr.homepage')}}" class="active">Trang chủ</a></li>
								<li><a href="{{ route('fr.contact')}}">Liên hệ</a></li>
							</ul>
						</div>
					</div>
					<form action="{{route('fr.search')}}" method="post">
						{{ csrf_field() }}
						<div class="col-sm-3">
							<div class="search_box pull-right">
								<input type="text" name="keyword" style="font-size:17px;color:black" placeholder="Tìm kiếm..."/>
							</div>
						</div>
						<div class="col-sm-1">
							<input type="submit"  class="btn btn-primary btn-sm" value="Tìm"/ style="height:35px; border:none; border-radius:10px;margin-top:0;font-size:20px;padding:20px;padding-top:3px;color:white">
						</div>
					</form>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>FOODI</span></h1>
									<h2>Ăn thả ga, không lo giá</h2>
								</div>
								<div class="col-sm-6">
									<img src="{{asset('public/frontend/images/slide-1.jpg')}}" class="girl img-responsive" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>FOODI</span></h1>
									<h2>Ăn thả ga, không lo giá</h2>
								</div>
								<div class="col-sm-6">
                                    <img src="{{asset('public/frontend/images/slide-2.jpg')}}" class="girl img-responsive" alt="" />
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span>FOODI</span></h1>
									<h2>Ăn thả ga, không lo giá</h2>
								</div>
								<div class="col-sm-6">
                                    <img src="{{asset('public/frontend/images/slide-3.jpg')}}" class="girl img-responsive" alt="" />
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container" style="margin-left:2%">
			<div class="row">
				<div class="col-sm-2">
					<div class="left-sidebar">
						<h2>Danh mục</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							@foreach($cate_product as $key => $cate)
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title"><a href="{{URL::to('/cate-product/'.$cate->category_id)}}">{{ $cate->category_name }}</a></h4>
									</div>
								</div>
								<div class="panel-heading"></div>
							@endforeach
						</div><!--/category-products-->
					</div>
				</div>
				
				<div class="col-sm-10 padding-right">
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