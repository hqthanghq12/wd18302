@extends('layoutadmin')
@section('title')
    Danh sách sản phẩm
@endsection
@section('content')
    @if(session('success'))
        {{session('success')}}
    @endif
    @if(session('error'))
        {{session('error')}}
    @endif
    <a href="{{route('products.create')}}"
       class="btn btn-primary">Thêm mới sản phẩm</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">price</th>
            <th scope="col">quantity</th>
            <th scope="col">image</th>
            <th scope="col">category name</th>
            <th scope="col">Thao tác</th>
        </tr>
        </thead>
{{--        @dd($listPro)--}}
        <tbody>
        @foreach($listPro as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->price}}</td>
            <td>{{$item->quantity}}</td>
            <td>
                @if(!isset($item->image))
                    Không có ảnh
                @else
                    <img src="{{$item->image}}">
                @endif
            </td>
            <td>{{$item->listCate->name}}</td>
            <td>
                <button type="button" class="btn btn-danger">Xóa</button>
                <button type="button" class="btn btn-warning">Sửa</button>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{$listPro->links()}}
@endsection
