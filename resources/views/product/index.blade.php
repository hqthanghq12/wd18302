@extends('layoutadmin')
@section('title')
    Danh Sách Sản Phẩm
@endsection
@section('content')
    <a href="{{route('products.create')}}"><button type="button" class="btn btn-primary">Add</button></a>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">quantity</th>
            <th scope="col">image</th>
            <th scope="col">category name</th>
            <th scope="col">Thao tác</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($listPro as $item) 
          <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->price}}</td>
            <td>{{$item->quantity}}</td>
            <td>
                @if (!isset($item->image))
                    khong co anh
                    @else
                    <img src="{{$item->image}}" alt="">
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