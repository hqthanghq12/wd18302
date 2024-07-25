@extends('layoutadmmin');
@section('title')
nolwafnhfiowahnfiowaf
@endsection
@section('content')
<a href="{{route('products.create')}}" class="btn btn_primary">them</a>
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Name</th>
        <th scope="col">Price</th>
        <th scope="col">quantity</th>
        <th scope="col">image</th>
        <th scope="col">category_name</th>
        <th scope="col">thao tac</th>
      </tr>
    </thead>
    <tbody>
      @if(!@empty($listPro))
      @foreach ($listPro as $key => $item)          
      <tr>
        <td>{{$key+1}}</td>
        <td >{{$item->name}}</td>
        <td >{{$item->price}}</td>
        <td >{{$item->quantity}}</td>
        <td >{{$item->image}}</td>
        <td >{{$item->listCate->name}}</td>
        <td >
           <a href="" class="btn btn-warning">Sua</a> 
           <a href="" class="btn btn-danger">Xoa</a> 
        </td>
      </tr>
      @endforeach
      @else
      <tr>
        <td colspan="7" class="text-center">No data</td>
      </tr>
      @endif
    </tbody>
  </table>

@endsection