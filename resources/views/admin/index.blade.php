@extends('layouts.admin')
@section('content')
<h1>Index</h1>
<a href="{{route('admin.product.index')}}" class="btn btn-success">Danh sách sản phẩm</a>
<a href="{{route('admin.category.index')}}" class="btn btn-success">Danh sách danh mục</a>
@endsection