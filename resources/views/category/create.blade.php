@extends('layoutadmin')
@section('title')
    Thêm mới sản phẩm
@endsection
@section('content')
    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="name" placeholder="Bánh Gạo">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        <div class="mb-3">
            <label class="form-label">status</label>
            <select class="form-select" name="category_id" aria-label="Default select example">
                    <option value="1">Hoat dong</option>
                    <option value="0">khong hoat dong</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Gửi</button>
        <a href="{{ route('categories.index') }}" class="btn btn-light"> Quay lại trang chủ</a>
    </form>
@endsection
