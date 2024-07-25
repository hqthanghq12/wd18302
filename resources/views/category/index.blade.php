@extends('layoutadmin')
@section('title')
    Danh Sách Danh Mục Sản Phẩm
@endsection
@section('content')
    <a href="{{url('/categories/create')}}" class="btn btn-primary">Thêm</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NAME</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listCate as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>
                    <button type="button" class="btn btn-danger">Xóa</button>
                    <button type="button" class="btn btn-warning">Sửa</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$listCate->links()}}
@endsection
