@extends('layouts.admin')
@section('title','Hóa đơn đang giao')
@section('content')
<div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading" style="text-align:center;color:red;font-size:20px">
                hóa đơn đang giao
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
                                <td>Đang giao hàng</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection