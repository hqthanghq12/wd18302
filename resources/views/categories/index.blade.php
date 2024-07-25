@extends('layoutadmin')
@section('title')
Danh sách danh mục
@endsection
@section('content')
<a href="{{route('categories.create')}}" class="btn btn-primary">Thêm mới danh mục</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">Thao tác</th>
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

@endsection