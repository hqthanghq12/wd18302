@extends('layoutadmin');
@section('title')
them moi san pham
@endsection
@section('content')
<form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text"
               class="form-control"
               id="exampleFormControlInput1"
               name="name"
               placeholder="Bánh Gạo">
               @error('name')
                   <div class="alert alert-danger">
                    {{$message}}
                   </div>
               @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Trạng thái</label>
                <select name="status" id="" class="form-control">
                    <option value="0" {{old('status')==0?'selected':false}}>Chưa kích hoạt</option>
                    <option value="0" {{old('status')==1?'selected':false}}>Kích hoạt</option>
                </select>
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