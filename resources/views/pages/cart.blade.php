@extends('layouts.frontend')
@section('title','Giỏ hàng của tôi')
@section('content')
	<?php
		$user_usename = Session::get('user_usename');
	?>
	<section id="cart_items"> 
		<div class="table-responsive cart_info">
			<?php
				$content = Cart::content();
			?>
			<table class="table table-condensed">
				<thead>
					<tr class="cart_menu">
						<td class="image">Hình ảnh</td>
						<td class="description">Tên</td>
						<td class="price">Giá</td>
						<td class="quantity">Số lượng</td>
						<td class="total">Giá</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					@foreach($content as $cartct)
						<tr>
							<td class="cart_product">
								<img src="{{URL::to('public/upload/product/'.$cartct->options->image)}}" alt="" style="width:100px" />
							</td>
							<td class="cart_description">
								<h4>{{$cartct->name}}</h4>
								<p>Mã sản phẩm : {{$cartct->id}}</p>
							</td>
							<td class="cart_price">
								<p>{{number_format($cartct->price).' '.'VND'}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form action="{{URL::to('update-cart-row/'.$cartct->rowId)}}" method="post">
										{{ csrf_field() }}
										<input class="cart_quantity_input" type="text" name="quantity" value="{{$cartct->qty}}" autocomplete="off" size="2">
										<input type="submit" value="Sửa số lượng" name="update_cart" style="margin-left:10px;height:29px;background-color:green;color:white;border:none;border-radius:10px">
									</form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">
									<?php
										$subtotal = $cartct->price * $cartct->qty;
										echo number_format($subtotal).' '.'VND';
									?>
								</p>
							</td>
							<td class="cart_delete">
								<a onclick="return confirm('Bạn muốn xóa sản phẩm này khỏi giỏ hàng ?')" class="cart_quantity_delete" href="{{URL::to('/delete-cart-row/'.$cartct->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</section> <!--/#cart_items-->

	<?php
		$message = Session::get('message');
		if($message) {
			echo '<span style="text-align:center;color:red;font-size:30px;font-weight:bolder;width:100%">'.$message.'</span>';
			Session::put('message',null);
		}
	?>

	<section id="do_action">
		<div class="row">
			<div class="col-sm-12">
				<div class="total_area">
					<ul>
						<li>Tổng <span>{{Cart::priceTotal()}} VND</span></li>
						<li>Phí ship <span>0 VND</span></li>
						<li style="color:red;font-size:20px">Thành tiền <span>{{Cart::subtotal()}} VND</span></li>
					</ul>
					@if(isset($user_usename))
						<div style="border: 3px solid red;margin-left:40px;color:black;padding:10px;text-align:justify">
							<h3 style="text-align:center">Chú ý : </h3>
							<p style="font-size:18px">- Đơn hàng sẽ được giao đến địa chỉ do bạn cung cấp. Nếu chưa cập nhật địa chỉ, vui lòng cập nhật <a href="{{URL::to('/edit-profile/'.$user_usename)}}">tại đây</a>.
								<br>- Vui lòng thanh toán sau khi nhận hàng.
								<br>- Shop chỉ giao hàng trong Đà Nẵng.
							</p>
						</div>
						<div style="text-align:center; margin-top:20px">
							<form action="{{route('cart.new')}}" method="post">
								{{csrf_field()}}
								<input type="hidden" name="user_usename" value="{{$user_usename}}">
								<input type="submit" value="Xác nhận mua hàng" class="btn btn-default success">
							</form>
							<a onclick="return confirm('Bạn muốn hủy đơn hàng này ?')" class="btn btn-default check_out" href="{{route('cart.destroy')}}">Hủy đơn hàng</a>
						</div>			
					@else
						<div style="border: 3px solid red;margin-left:40px;color:black;padding:10px;text-align:center">
							<h3 style="text-align:center">Chú ý : </h3>
							<p style="font-size:18px">Vui lòng <a href="{{route('us.login')}}">đăng nhập</a> để tiếp tục đặt hàng.</p>
						</div>
					@endif
				</div>
			</div>
		</div>
		<div>
			
		</div>
	</section><!--/#do_action-->
@endsection