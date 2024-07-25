@extends('layoutadmin')
@section('title')
    Thêm mới sản phẩm
@endsection
@section('content')
    <form action="" method="POST" enctype="multipart/form-data">
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
            <label class="form-label">Price</label>
            <input type="text"
                   class="form-control"
                   id="exampleFormControlInput1"
                   name="price">
        </div>
        @error('price')
        <span style="color: red">{{ $message }}</span>
    @enderror
        <div class="mb-3">
            <label class="form-label">Quantity</label>
            <input type="text"
                   class="form-control"
                   id="exampleFormControlInput1"
                   name="quantity">
        </div>
        @error('quantity')
        <span style="color: red">{{ $message }}</span>
    @enderror
        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file"
                   class="form-control"
                   id="exampleFormControlInput1"
                   name="image">
        </div>
        @error('image')
        <span style="color: red">{{ $message }}</span>
    @enderror
        <div class="mb-3">
            <label class="form-label">Category</label>
            <select class="form-select" name="category_id" aria-label="Default select example">
                <option selected>Open this select menu</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        @error('category_id')
        <span style="color: red">{{ $message }}</span>
    @enderror
    <div>
        <button type="submit" class="btn btn-success">Gửi</button>

    </div>
    </form>
@endsection