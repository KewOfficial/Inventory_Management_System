@extends('layouts.adminlte')

@section('content')
<h1>Product Details</h1>
<table class="table">
    <tr>
        <th>Name</th>
        <td>{{ $product->name }}</td>
    </tr>
    <tr>
        <th>Product Description</th>
        <td>{{ $product->description }}</td>
    </tr>
    <tr>
        <th>Buying Price</th>
        <td>{{ $product->price }}</td>
    </tr>
    <tr>
        <th>Selling Price</th>
        <td>{{ $product->selling_price }}</td>
    </tr>
    <tr>
        <th>Quantity</th>
        <td>{{ $product->quantity }}</td>
    </tr>
</table>
<a href="{{ route('products.index') }}" class="btn btn-primary">Back to List</a>
@endsection
