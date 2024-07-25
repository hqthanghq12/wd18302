@extends('layoutadmin')
@section('title')
    Danh Sách Sản Phẩm
@endsection
@section('content')
    <a href="{{route('categories.create')}}" class="btn btn-primary">Thêm</a>
    @session('error')
                    <div class="alert alert-danger">{{ session('error') }}</div>
    @endsession
   
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NAME</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cate as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->status}}</td>
                <td>
                    <button type="button" class="btn btn-danger">Xóa</button>
                    <button type="button" class="btn btn-warning">Sửa</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$cate->links()}}
@endsection
