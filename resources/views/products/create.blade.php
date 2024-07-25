@extends('layoutadmin')
@section('title')
Thêm mới sản phẩm
@endsection
@section('content')
<!-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif -->
<form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="name" placeholder="Bánh Gạo">
    </div>
    @error('name')
        <div class="text-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label class="form-label">Price</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="price">
    </div>
    @error('price')
        <div class="text-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label class="form-label">Quantity</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="quantity">
    </div>
    @error('quantity')
        <div class="text-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label class="form-label">Image</label>
        <input type="file" class="form-control" id="exampleFormControlInput1" name="image">
    </div>
    @error('image')
        <div class="text-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label class="form-label">Category</label>
        <select class="form-select" name="category_id" aria-label="Default select example">
            @foreach ($listCate as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-success">Gửi</button>
    <a href="{{route('products.index')}}" class="btn btn-light"> Quay lại trang chủ</a>
</form>
@endsection