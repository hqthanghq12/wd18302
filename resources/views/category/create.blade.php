@extends('layout')
@section('content')

<form style="width: 500px" class="rounded p-4 shadow mx-auto mt-5" method="post" action="{{route('category.store')}}">
    @csrf
    <h1 class="text-primary text-center fw-bold">Add Category</h1>
    <div class="mb-3">
        <input type="text" class="form-control" id="exampleFormControlInput1" name="name" placeholder="Enter category's name" value="{{old('name')}}">
        <div class="error">
            @error('name')
            {{$message}}
            @enderror
        </div>
    </div>
    
    <button type="submit" class="btn btn-success">Submit</button>
    <a href="{{route('category.index')}}" class="btn btn-light"> Back</a>
</form>

@endsection