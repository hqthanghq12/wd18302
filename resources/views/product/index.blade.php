@extends('layout')
@section('content')

<div class="container p-3">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $key => $product)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$product->name}}</td>
                <td>{{$product->category_id}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->quantity}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection