@extends('layoutadmin')
@section('title')
   <h2 class="text-center">Thêm mới DM</h2> 
@endsection
@section('content')
    <form class="container w-50" action="{{route('categories.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <a href="{{route('categories.store')}}"><button type="submit" class="btn btn-success">Gửi</button></a>
        <a href="{{ route('categories.index') }}" class="btn btn-light"> Quay lại trang chủ</a>
    </form>
@endsection
