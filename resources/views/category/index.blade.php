
@extends('layoutadmin')
@section('title')
    Danh Sách Danh Mục
@endsection
@section('content')
    <a href="{{route('categories.create')}}"><button type="button" class="btn btn-primary">Add</button></a>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>  
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
      {{-- {{$listCate->links()}} --}}
@endsection
