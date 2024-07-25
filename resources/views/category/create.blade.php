@extends('layoutadmin')
@section('title')
    Thêm mới sản phẩm
@endsection
@section('content')
    <form action="" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text"
                   class="form-control"
                   id="exampleFormControlInput1"
                   name="name"
                   placeholder="Bánh Gạo">
        </div>
        @error('name')
            <span style="color: red">{{ $message }}</span>
        @enderror
        <div class="mb-3">
            <label for="select" class="form-label">Status</label>
                    <select class="form-select" id="select" name="status">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
        </div>
        @error('status')
        <span style="color: red">{{ $message }}</span>
        @enderror
        <button type="submit" class="btn btn-success">Gửi</button>
        <a href="{{route('category.index')}}"  class="btn btn-light"> Quay lại trang chủ</a>
    </form>
@endsection