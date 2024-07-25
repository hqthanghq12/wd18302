@extends('layoutadmmin');
@section('title')
them moi san pham
@endsection
@section('content')
<form action="{{route('cate.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text"
               class="form-control"
               id="exampleFormControlInput1"
               name="name"
               placeholder="BST">
               @error('name')
                   <div class="alert alert-danger">
                    {{$message}}
                   </div>
               @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">status</label>
        <input type="text"
               class="form-control"
               id="exampleFormControlInput1"
               name="status">
               @error('status')
               <div class="alert alert-danger">
                {{$message}}
               </div>
           @enderror
    </div>
    <button type="submit" class="btn btn-success">Gửi</button>
    <a href="{{route('cate.index')}}"  class="btn btn-light"> Quay lại trang chủ</a>
</form>
@endsection