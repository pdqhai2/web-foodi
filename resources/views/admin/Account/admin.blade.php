@extends('layouts.admin')
@section('title','Tài khoản quản trị viên')
@section('content')
<div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading" style="text-align:center;color:red;font-size:20px">
                Tài khoản quản trị viên
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
                                <td>{{$value->admin_usename}}</td>
                                <td>*******</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{route('ad.new')}}">Đăng kí tài khoản admin</a>
            </div>
        </div>
    </div>
@endsection