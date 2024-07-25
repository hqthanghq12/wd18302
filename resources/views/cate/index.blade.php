@extends('layoutadmin');
@section('title')
@endsection
@section('content')
<a href="{{route('cate.create')}}" class="btn btn-primary mb-3">them</a>
<table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Name</th>
        <th scope="col">Status</th>
        <th scope="col">Thời gian tạo</th>
        <th scope="col">Thời gian cập nhập</th>
        <th scope="col">thao tac</th>
      </tr>
    </thead>
    <tbody>
      @if(!@empty($listPro))
      @foreach ($listPro as $key => $item)          
      <tr>
        <td>{{$key+1}}</td>
        <td >{{$item->name}}</td>
        <td >{!!$item->status==1?'<button class="btn btn-success">Kích hoạt</button>':'<button class="btn btn-warning">Chưa kích hoạt</button>'!!}</td>
        <td >{{$item->created_at}}</td>
        <td >{{$item->updated_at}}</td>
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