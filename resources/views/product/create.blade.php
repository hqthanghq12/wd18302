@extends('layout')
@section('content')

<form style="width: 500px" class="rounded p-4 shadow mx-auto mt-5" method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
    @csrf
    <h1 class="text-primary text-center fw-bold">ADD</h1>
    <div class="mb-3">
        <label class="form-label fw-bold">Name</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="name" placeholder="Bánh Gạo" value="{{old('name')}}">
        <div class="error">
            @error('name')
            {{$message}}
            @enderror
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label fw-bold">Price</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="price" value="{{old('price')}}">
        <div class="error">
            @error('price')
            {{$message}}
            @enderror
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label fw-bold">Quantity</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="quantity" value="{{old('quantity')}}">
        <div class="error">
            @error('quantity')
            {{$message}}
            @enderror
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label fw-bold">Image</label>
        <input type="file" class="form-control" id="exampleFormControlInput1" name="image" value="{{old('image')}}" accept="image/*">
        <div class="error">
            @error('image')
            {{$message}}
            @enderror
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label fw-bold">Category</label>
        <select class="form-select" name="category_id" aria-label="Default select example">
            <option selected>Open this select menu</option>
            @foreach ($categories as $key => $category )
            <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected' : ''}}>
                {{$category->name}}
            </option>
            @endforeach
        </select>
        <div class="error">
            @error('category_id')
            {{$message}}
            @enderror
        </div>
    </div>
    <button type="submit" class="btn btn-success">Gửi</button>
    <a href="{{route('product.index')}}" class="btn btn-light"> Quay lại trang chủ</a>
</form>

@endsection