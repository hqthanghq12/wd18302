@extends('layouts.admin')
@section('content')
    <form action="{{route('admin.category.store')}}" method="POST" enctype="multipart/form-data">
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
        <button type="submit" class="btn btn-success">Gửi</button>
        <a href="{{route('admin.category.index')}}"  class="btn btn-light"> Quay lại trang chủ</a>
    </form>
@endsection