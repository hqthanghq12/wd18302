@extends('layoutadmin')
@section('title')
   <h2 class="text-center">Thêm mới Sản Phẩm</h2> 
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
    @if(session('success'))
        {{session('success')}}
    @endif
    @if(session('error'))
        {{session('error')}}
    @endif
    <form action="{{route('products.store')}}"
          method="POST"
          enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text"
                   class="form-control"
                   id="exampleFormControlInput1"
                   name="name"
                   placeholder="Bánh Gạo" value="{{old('name')}}">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>

            <input type="text"
                   class="form-control"
                   id="exampleFormControlInput1"
                   name="price" value="{{old('price')}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Quantity</label>
            <input type="text"
                   class="form-control"
                   id="exampleFormControlInput1"
                   name="quantity" value="{{old('quantity')}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file"
                   class="form-control"
                   id="exampleFormControlInput1"
                   name="image">
        </div>
        <div class="mb-3">
            <label class="form-label">Category</label>
            <select class="form-select" name="category_id" aria-label="Default select example">
                @foreach($listCate as $item)
                <option value="{{$item->id}}" @if($item->id == old('category_id')) selected @endif>{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Gửi</button>
        <a href="{{route('products.index')}}"  class="btn btn-light"> Quay lại trang chủ</a>
    </form>
@endsection
