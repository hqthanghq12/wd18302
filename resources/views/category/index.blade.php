@extends('layout')
@section('content')

<div class="container p-5">
    <a href="{{route('category.create')}}" class="btn btn-outline-success">Add</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $key => $category )
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$category->name}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection