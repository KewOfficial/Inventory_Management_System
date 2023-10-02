@extends('layouts.adminlte')

@section('content')
<h1>Create Restock</h1>
<form method="POST" action="{{ route('restocks.store') }}">
    @csrf
    <div class="form-group">
        <label for="product_id">Product</label>
        <select name="product_id" id="product_id" class="form-control">
            @foreach($products as $product)
            <option value="{{ $product->id }}">{{ $product->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="quantity">Quantity</label>
        <input type="number" name="quantity" id="quantity" class="form-control" required>
    </div>
    <!-- Add the 'name' input field -->
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>
<a href="{{ route('restocks.index') }}" class="btn btn-secondary">Back to List</a>
@endsection
