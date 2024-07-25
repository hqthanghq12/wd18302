@extends('layouts.admin')
@section('content')
    <a href="{{route('admin.product.create')}}" class="btn btn-success">Thêm mới</a>
    <table class="table table-border table-shadow">
        <thead>
            <th>#</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Image</th>
            <th>Category name</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($listPro as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->image}}</td>
                    <td>{{$item->listCatagory->name}}</td>
                    <td>
                        <a href="" class="btn btn-warning">Sửa</a>|
                        <form action="" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$listPro->links()}}
@endsection