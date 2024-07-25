@extends('layoutadmin')
@section('title')
    Sửa sản phẩm
@endsection
@section('content')
    <form action="{{ route('category.update', $category->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" value="{{ $category->name }}" name="name">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Trạng thái <span style="color:red">*</span></label>
            <select class="form-control" name="status" id="" required>
                <option {{ $category->status == 0 ? 'selected' : '' }} value="0">
                    Hoạt động
                </option>
                <option {{ $category->status == 1 ? 'selected' : '' }} value="1">
                    Không hoạt động
                </option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Gửi</button>
        <a href="{{ route('category.index') }}" class="btn btn-light"> Quay lại trang chủ</a>
    </form>
@endsection
