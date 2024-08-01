@extends('layoutadmin')
@section('title')
    <h2 class="text-center">Danh Sách Sản Phẩm</h2>
@endsection
@section('content')
    <a href="{{ route('products.create') }}"><button type="button" class="btn btn-primary">Add</button></a>
    @if (session('success'))
        {{ session('success') }}
    @endif
    @if (session('error'))
        {{ session('error') }}
    @endif
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
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>
                        @if (!isset($item->image))
                            Không có ảnh
                        @else
                            <img src="{{ Storage::url($item->image) }}" style="width: 100px">
                        @endif
                    </td>
                    <td>{{ $item->listCate->name }}</td>
                    <td>
                        <form action="{{ route('products.destroy', ['id' => $item->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Delete???')"
                                class="btn btn-danger">Xóa</button>
                        </form>
                        <a class="btn btn-warning" href="{{ route('products.edit', ['id' => $item->id]) }}">Sửa</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $listPro->links() }}
@endsection
