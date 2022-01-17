@extends('layouts.frontend')
@section('title','Chi tiết sản phẩm')
@section('content')

    @foreach($product as $key => $prod)
        <h2 class="title text-center">thông tin sản phẩm</h2>
        <div class="product-details" style="padding-top:0px"><!--product-details-->
            <div class="col-sm-5">
                <img src="{{URL::to('public/upload/product/'.$prod->product_image)}}" alt="" style="width:400px" />
            </div>
            <div class="col-sm-7">
                <div class="product-information" style="padding-top:0px"><!--/product-information-->
                    <h2 class="title text-center" style="margin-bottom:10px">{{$prod->product_name}}</h2>
                    <p style="text-align:center">Mã sản phẩm : {{$prod->product_id}}</p>
                    <h3>Giá : <span style="margin:0;padding:0;color:red;">{{number_format($prod->product_price)}} VND</span></h3>
                    <div style="margin-bottom:20px">
                        <p style="text-align:justify;font-size:16px">{{$prod->product_desc}}</p>
                    </div>
                    <form action="{{route('cart.add')}}" method="POST">
                        {{ csrf_field() }}
                        <span>
                            <div style="margin-bottom:20px">
                                <label>Số lượng : </label>
                                <input type="number" name="qty" min="1" value="1">
                            </div>
                            <input type="hidden" name="product_hidden" value="{{$prod->product_id}}">
                            <button type="submit" class="btn btn-default cart" name="save">
                                <i class="fa fa-shopping-cart"></i>
                                Thêm vào giỏ hàng
                            </button>
                        </span>
                    </form>
                </div><!--/product-information-->
            </div>
        </div><!--/product-details-->


        <div class="product-details" id="reviews" style="margin-bottom:50px" >
            <h2 class="title text-center">Nhận xét của khách hàng</h2>
            <div class="col-sm-12">
                <ul>
                    <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                    <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                    <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                </ul>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                <p><b>Write Your Review</b></p>
                
                <form action="#">
                    <span>
                        <input type="text" placeholder="Your Name"/>
                        <input type="email" placeholder="Email Address"/>
                    </span>
                    <textarea name="" ></textarea>
                    <b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
                    <button type="button" class="btn btn-default pull-right">
                        Submit
                    </button>
                </form>
            </div>
        </div>

        <div class="recommended_items"><!--recommended_items-->
            <h2 class="title text-center">Sản phẩm liên quan</h2>
            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="item active">	
                        @foreach($recomend as $key => $rec)
                            <a href="{{URL::to('/view-product/'.$rec->product_id)}}">
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img style="width:200px" src="{{URL::to('public/upload/product/'.$rec->product_image)}}"/>
                                                <h2>{{number_format($rec->product_price)}} VND</h2>
                                                <h3>{{$rec->product_name}}</h3>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
                    <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                    </a>			
            </div>
        </div><!--/recommended_items-->
    @endforeach

@endsection