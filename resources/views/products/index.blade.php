@extends('layouts.master')

@section('title')
    Danh sách products
@endsection

@section('content')
    <a href="{{ route('products.create') }}" class="btn btn-primary">Thêm mới</a>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>SKU</th>
            <th>NAME</th>
            <th>CATEGORY</th>
            <th>IMAGE</th>
            <th>PRICE</th>
            <th>QUANTITY</th>
            <th>DESCRIPSION</th>
            <th></th>
        </tr>
        @foreach ($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->sku }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->category->name }}</td>
                <td>
                    @if ($item->image && Storage::exists($item->image))
                        <img width="100px" src="{{ Storage::url($item->image) }}" alt="">
                    @else
                        Không có
                    @endif
                </td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->description }}</td>
                <td>
                    <form class="d-inline" action="{{ route('products.destroy', $item) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('chắc chắn xóa?')" class="btn btn-danger">Xóa</button>
                    </form>
                    <a href="{{ route('products.edit', $item) }}" class="btn btn-info">Sửa</a>
                    {{-- <a href="" class="btn btn-danger">Sửa</a> --}}
                </td>
            </tr>
        @endforeach
    </table>

    {{ $data->links() }}
@endsection
