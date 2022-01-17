@extends('layouts.admin')
@section('title','Tài khoản khách hàng')
@section('content')
<div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading" style="text-align:center;color:red;font-size:20px">
                Tài khoản khách hàng
            </div>
            <div class="table-responsive">
                <table class="table table-striped b-t b-light">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Tên tài khoản</th>
                            <th>Mật khẩu</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($all_cart as $key => $value)
                            <tr>
                                <td></td>
                                <td>{{$value->user_usename}}</td>
                                <td>*******</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection