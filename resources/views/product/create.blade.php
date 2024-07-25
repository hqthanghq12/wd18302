@extends('layoutadmin')
@section('title')
Thêm mới sản phẩm
@endsection
@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleFormControlInput1" name="name" placeholder="Bánh Gạo">
    </div>
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label class="form-label">Price</label>
        <input type="text" class="form-control @error('price') is-invalid @enderror" id="exampleFormControlInput1" name="price">
    </div>
    @error('price')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label class="form-label">Quantity</label>
        <input type="text" class="form-control @error('quantity') is-invalid @enderror" id="exampleFormControlInput1" name="quantity">
    </div>
    @error('quantity')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label class="form-label">Image</label>
        <input type="file" class="form-contro " id="exampleFormControlInput1" name="image">
    </div>
    <div class="mb-3">
        <label class="form-label">Category</label>
        <select class="form-select @error('category_id') is-invalid @enderror" name="category_id" aria-label="Default select example">
            <option selected>Open this select menu</option>
            @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        @error('category_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-success">Gửi</button>
    <a href="{{route('products.index')}}" class="btn btn-light"> Quay lại trang chủ</a>
</form>
@endsection