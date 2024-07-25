@extends('layoutadmin')
@section('title')
    Thêm mới danh mục
@endsection
@section('content')
    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="name" placeholder="">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select class="form-select" name="status" aria-label="Default select example">
                <option value="0">Không hoạt động</option>
                <option value="1" selected>Hoạt động</option>
            </select>
            @error('status')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Gửi</button>
        <a href="{{ route('categories.index') }}" class="btn btn-light"> Quay lại trang chủ</a>
    </form>
@endsection
