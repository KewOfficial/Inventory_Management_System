@extends('layouts.adminlte')

@section('content')
<h1>Edit Product</h1>
<form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ $product->name }}" required>
    </div>
    <div class="form-group">
        <label for="description">Product Description</label>
        <textarea class="form-control" name="description" id="description" rows="3">{{ $product->description }}</textarea>
    </div>
    <div class="form-group">
        <label for="price">Buying Price</label>
        <input type="number" class="form-control" name="price" id="price" value="{{ $product->price }}" required>
    </div>
    <div class="form-group">
        <label for="selling_price">Selling Price</label>
        <input type="number" class="form-control" name="selling_price" id="selling_price" value="{{ $product->selling_price }}">
    </div>
    <div class="form-group">
        <label for="quantity">Quantity</label>
        <input type="number" class="form-control" name="quantity" id="quantity" value="{{ $product->quantity }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
