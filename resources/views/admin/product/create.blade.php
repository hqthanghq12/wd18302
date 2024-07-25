@extends('layouts.admin')
@section('content')
    <form action="{{route('admin.product.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text"
                   class="form-control @error('name') is-invalid @enderror"
                   id="exampleFormControlInput1"
                   name="name"
                   placeholder="Bánh Gạo">
            @error('name')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="text"
                   class="form-control @error('price') is-invalid @enderror"
                   id="exampleFormControlInput1"
                   name="price">
            @error('price')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Quantity</label>
            <input type="text"
                   class="form-control @error('quantity') is-invalid @enderror"
                   id="exampleFormControlInput1"
                   name="quantity">
            @error('quantity')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file"
                   class="form-control @error('image') is-invalid @enderror"
                   id="exampleFormControlInput1"
                   name="image">
            @error('image')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Category</label>
            <select class="form-select @error('category_id') is-invalid @enderror" name="category_id" aria-label="Default select example">
                <option selected>--Chọn danh mục--</option>
                @foreach ($listCate as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
            @error('category_id')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Gửi</button>
        <a href="{{route('admin.product.index')}}"  class="btn btn-light"> Quay lại trang chủ</a>
    </form>
@endsection