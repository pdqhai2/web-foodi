@extends('layouts.user_profile')
@section('content')
    <?php
        $user_usename = Session::get('user_usename');
    ?>
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading" style="text-align:center;color:red;font-size:20px">
                Lịch sử mua hàng
            </div>
            <div style="text-align:center;padding:10px">
                <?php
                    $message = Session::get('message');
                    if($message) {
                        echo '<span style="text-align:center;color:green;font-weight:bolder;width:100%">'.$message.'</span>';
                        Session::put('message',null);
                    }
                ?>
            </div>

            <div class="row" style="padding:20px">
                <div class="col-sm-2">
                    <h4>Loại hóa đơn</h4>
                </div>
                <div class="col-sm-2">
                    <form action="{{route('cart.dangduyet')}}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="user_usename" value="{{$user_usename}}">
                        <input type="submit" value="Chờ xác nhận..." name="update_cart" style="height:29px;background-color:red;color:white;border:1px solid black;border-radius:10px">
                    </form>
                </div>

                <div class="col-sm-2">
                    <form action="{{route('cart.danggiao')}}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="user_usename" value="{{$user_usename}}">
                        <input type="submit" value="Đang giao hàng..." name="update_cart" style="height:29px;background-color:white;color:black;border:1px solid black;border-radius:10px">
                    </form>
                </div>

                <div class="col-sm-2">
                    <form action="{{route('cart.dagiao')}}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="user_usename" value="{{$user_usename}}">
                        <input type="submit" value="Đã giao hàng" name="update_cart" style="height:29px;background-color:green;color:white;border:1px solid black;border-radius:10px">
                    </form>
                </div>

                <div class="col-sm-2">
                    <form action="{{route('cart.ls')}}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="user_usename" value="{{$user_usename}}">
                        <input type="submit" value="XEM TOÀN BỘ" style="background-color:white;border:2px solid black;border-radius:10px">
                    </form>
                </div>
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
                            <th></th>
                            <th>Mã hóa đơn</th>
                            <th>Ngày mua hàng</th>
                            <th>Giờ mua hàng</th>
                            <th>Tình trạng</th>
                            <th>Ngày nhận hàng</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($all_cart as $key => $value)
                            <tr>
                                <td></td>
                                <td>
                                    <?php
                                        $cart_name = $value->identifier;
                                        echo $cart_name[0]; echo $cart_name[1]; echo '*******'; echo $cart_name[strlen($cart_name)-2];echo $cart_name[strlen($cart_name)-1];
                                    ?>
                                </td>
                                <td>{{ $value->cart_date }}</td>
                                <td>{{ $value->cart_time }}</td>
                                @if($value->cart_status == 0)
                                    <td style="color:red;font-weight:bolder">Chờ xác nhận...</td>
                                    <td></td>
								@endif
								@if($value->cart_status == 1)
                                    <td>Đang giao hàng</td>
                                    <td> 
                                        <form action="{{route('cart.nhanhang')}}" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="identifier" value="{{$value->identifier}}">
                                            <input type="hidden" name="user_usename" value="{{$user_usename}}">
                                            <input type="submit" value="Tôi đã nhận được hàng" name="update_cart" style="height:29px;background-color:lightblue;color:black;border:none;border-radius:10px">
                                        </form> 
                                    </td>
								@endif
                                @if($value->cart_status == 2)
                                    <td style="color:green;font-weight:bolder">Đã nhận hàng</td>
                                    <td>{{$value->cart_dategiao}}</td>
								@endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection