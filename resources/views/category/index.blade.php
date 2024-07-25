@extends('layoutadmin')
@section('title')
    Danh sách danh mục
@endsection
@section('content')
    <a href="{{ route('category.create') }}" class="btn btn-primary ">Thêm mới danh mục</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">status</th>
            <th scope="col">Thao tác</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            @foreach ($categories as $cate)
            <td>{{ $cate->id }}</td>
            <td>{{ $cate->name }}</td>
            <td>@if ($cate->status==1) 
                Active @else Inactive
            @endif</td>
            <td>
                <button type="button" class="btn btn-danger">Xóa</button>
                <button type="button" class="btn btn-warning">Sửa</button>
            </td>
        </tr>
            @endforeach
            
        </tbody>
    </table>
@endsection