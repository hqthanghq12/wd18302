@extends('layouts.master')

@section('title')
    Thêm mới products
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

    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">SKU</label>
            <input name="sku" value="{{ strtoupper(Str::random(8)) }}" type="text" class="form-control"
                id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Category</label>
            <select class="form-control" name="category_id" id="">
                @foreach ($categories as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input type="text" name="name" value="{{ old('name') }}"
                class="form-control @error('name') is-invalid @enderror" id="exampleFormControlInput1">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">IMAGE</label>
            <input type="file" name="image" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">PRICE</label>
            <input type="number" min="0" name="price" value="{{ old('price') }}" class="form-control"
                id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">QUANTITY</label>
            <input type="number" min="0" name="quantity" value="{{ old('quantity') }}" class="form-control"
                id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">DESCRIPSION</label>
            <textarea class="form-control" name="description" id="" cols="30" rows="5">{{ old('description') }}</textarea>
        </div>
        <button class="btn btn-primary">Thêm mới</button>
    </form>
@endsection
