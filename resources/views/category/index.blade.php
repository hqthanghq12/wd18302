@extends('layoutadmin')
@section('title')
    Danh Sach Danh Muc
@endsection
@section('content')
    <a href="{{ url('category/create') }}" class="btn btn-primary">Thêm</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NAME</th>
                <th scope="col">STATUS</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listCate as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->status == 0 ? 'Hoạt dộng' : 'Không hoạt động' }}</td>
                    <td>
                        <a href="{{ route('category.destroy', $item->id) }}" class="btn btn-danger">Xóa</a>
                        <a href="{{ route('category.edit', $item->id) }}" class="btn btn-warning">Sửa</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $listCate->links() }}
@endsection
