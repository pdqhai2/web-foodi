@extends('layouts.admin')
@section('title','Phản hồi')
@section('content')
<div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading" style="text-align:center;color:red;font-size:20px">
                Phản hồi
            </div>
            <div class="table-responsive">
                <table class="table table-striped b-t b-light">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Tên khách hàng</th>
                            <th>Tiêu đề</th>
                            <th>Nội dung</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($all_cart as $key => $value)
                            <tr>
                                <td></td>
                                <td>{{$value->user_name}}</td>
                                <td>{{$value->mess_subject}}</td>
                                <td>{{$value->mess_content}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection