@extends('layoutadmin')
@section('title', 'Danh sách sản phẩm')
@section('content')
<a href="{{ route('categories.create') }}" class="btn btn-primary">Thêm mới sản phẩm</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>
                <button type="button" class="btn btn-danger">Xóa</button>
                <button type="button" class="btn btn-warning">Sửa</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection