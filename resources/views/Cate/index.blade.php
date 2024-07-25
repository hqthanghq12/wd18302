@extends('layoutadmmin');
@section('title')
nolwafnhfiowahnfiowaf
@endsection
@section('content')
<a href="{{route('cate.create')}}" class="btn btn-primary">them</a>
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Name</th>
        <th scope="col">status</th>
      </tr>
    </thead>
    <tbody>
      @if(!@empty($listCate))
      @foreach ($listCate as $key => $item)          
      <tr>
        <td>{{$key+1}}</td>
        <td >{{$item->name}}</td>
        <td >{{$item->status}}</td>
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