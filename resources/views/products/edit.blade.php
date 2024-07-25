@extends('layouts.master')

@section('title')
    Cập nhật products: {{ $product->name }}
@endsection

@section('content')
    <form action="{{ route('products.update', $product) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">SKU</label>
            <input name="sku" value="{{ $product->sku }}" type="text" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Category</label>
            <select class="form-control" name="category_id" id="">
                @foreach ($categories as $id => $name)
                    <option @selected($id == $product->category_id) value="{{ $id }}">{{ $name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input type="text" name="name" value="{{ $product->name }}" class="form-control"
                id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">IMAGE</label>
            <input type="file" name="image" class="form-control" id="exampleFormControlInput1">
            <img width="100px" src="{{ Storage::url($product->image) }}" alt="">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">PRICE</label>
            <input type="number" min="0" name="price" value="{{ $product->price }}" class="form-control"
                id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">QUANTITY</label>
            <input type="number" min="0" name="quantity" value="{{ $product->quantity }}" class="form-control"
                id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">DESCRIPSION</label>
            <textarea class="form-control" name="description" id="" cols="30" rows="5">{{ $product->description }}</textarea>
        </div>
        <button class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
@endsection
