@extends('layouts.adminlte')

@section('content')
<h1>Create Product</h1>
<form action="{{ route('products.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name" required>
    </div>
    <div class="form-group">
        <label for="description">Product Description</label>
        <textarea class="form-control" name="description" id="description" rows="3"></textarea>
    </div>
    <div class="form-group">
        <label for="price">Buying Price</label>
        <input type="number" class="form-control" name="price" id="price" required>
    </div>
    <div class="form-group">
        <label for="selling_price">Selling Price</label>
        <input type="number" class="form-control" name="selling_price" id="selling_price">
    </div>
    <div class="form-group">
        <label for="quantity">Quantity</label>
        <input type="number" class="form-control" name="quantity" id="quantity" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
