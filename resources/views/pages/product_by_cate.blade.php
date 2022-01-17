<?php
    $category_name = Session::get('cate_productbycate');
    $category_desc = Session::get('catedesc_productbycate');

?>
@extends('layouts.frontend')
@section('title','Foodi - Ăn thả ga, vô tư giá')
@section('content')
	<div class="features_items"><!--features_items-->
		<h2 class="title text-center">{{$category_name}}</h2>
        <h4 style="text-align:center;margin-bottom:50px">{{$category_desc}}</h4>

		@foreach($all_product as $key => $prod)
			<div class="col-sm-3">
				<div class="product-image-wrapper">
					<a href="{{URL::to('/view-product/'.$prod->product_id)}}">

					<div class="single-products">
							<div class="productinfo text-center">
								<img src="{{URL::to('public/upload/product/'.$prod->product_image)}}"/>
								<h2>{{number_format($prod->product_price)}} VND</h2>
								<h4>{{$prod->product_name}}</h4>
							</div>
					</div>
					<!-- <div class="choose">
						<ul class="nav nav-pills nav-justified">
							<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
							<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
						</ul>
					</div> -->
					</a>
					<form action="{{route('cart.add2')}}" method="POST">
                        {{ csrf_field() }}
                        <span>
                            <input type="hidden" name="product_hidden" value="{{$prod->product_id}}">
                            <button type="submit" class="btn btn-default cart" name="save">
                                <i class="fa fa-shopping-cart"></i>
                                Thêm vào giỏ hàng
                            </button>
                        </span>
                    </form>
				</div>
			</div>
		@endforeach
	</div><!--features_items-->
@endsection