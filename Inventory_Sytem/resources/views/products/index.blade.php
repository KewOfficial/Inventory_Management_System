@extends('layouts.adminlte')

@section('content')
<h1>Product List</h1>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Product Description</th>
            <th>Buying Price</th>
            <th>Selling Price</th>
            <th>Quantity</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->selling_price }}</td>
            <td>{{ $product->quantity }}</td>
            <td>
                <a href="{{ route('products.show', $product->id) }}" class="btn btn-info">View</a>
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
