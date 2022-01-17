@extends('layouts.admin')
@section('title','Duyệt hóa đơn')
@section('content')
<div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading" style="text-align:center;color:red;font-size:20px">
                Duyệt hóa đơn
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
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($all_cart as $key => $value)
                            <tr>
                                <td></td>
                                <td>
                                    <?php
                                        $cart_name = $value->identifier;
                                        echo $cart_name;
                                    ?>
                                </td>
                                <td>{{ $value->cart_date }}</td>
                                <td>{{ $value->cart_time }}</td>
                                <td>Đang chờ duyệt</td>
                                <td> 
                                <form action="{{route('ad.browsed')}}" method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="identifier" value="{{$value->identifier}}">
                                        <input type="submit" value="Duyệt" name="update_cart" style="margin-left:10px;height:29px;background-color:green;color:white;border:none;border-radius:10px">
                                    </form> 
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection