@extends('layoutadmin')
@section('title')
    Chỉnh sửa sản phẩm
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
    <form action="{{route('products.update', ['id'=>$listPro->id])}}"
          method="POST"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text"
                   class="form-control"
                   id="exampleFormControlInput1"
                   name="name"
                   placeholder="Bánh Gạo" value="{{$listPro->name}}">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="text"
                   class="form-control"
                   id="exampleFormControlInput1"
                   name="price" value="{{$listPro->price}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Quantity</label>
            <input type="text"
                   class="form-control"
                   id="exampleFormControlInput1"
                   name="quantity" value="{{$listPro->quantity}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file"
                   class="form-control"
                   id="exampleFormControlInput1"
                   name="image">
            <img src="{{Storage::url($listPro->image)}}" style="width: 100px">
        </div>
        <div class="mb-3">
            <label class="form-label">Category</label>
            <select class="form-select" name="category_id" aria-label="Default select example">
                @foreach($listCate as $item)
                    <option value="{{$item->id}}"
                            @if($item->id == $listPro->category_id) selected @endif>
                        {{$item->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Gửi</button>
        <a href="{{route('products.index')}}"  class="btn btn-light"> Quay lại trang chủ</a>
    </form>
@endsection
