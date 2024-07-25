@extends('layoutadmin')
@section('title')
    Danh Sách Sản Phẩm
@endsection
@section('content')
    <a href="{{ route('product.create') }}" class="btn btn-primary">Thêm</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NAME</th>
                <th scope="col">PRICE</th>
                <th scope="col">QUANTITY</th>
                <th scope="col">IMAGE</th>
                <th scope="col">CATEGORY NAME</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listPro as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>
                        @if (!isset($item->image))
                            khong co anh
                        @else
                            <img src="{{ $item->image }}" alt="">
                        @endif
                    </td>
                    <td>{{ $item->category_name }}</td>
                    <td>
                        <a href="{{ route('product.destroy', $item->id) }}" class="btn btn-danger">Xóa</a>
                        <a href="{{ route('product.edit', $item->id) }}" class="btn btn-warning">Sửa</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $listPro->links() }}
@endsection
