@extends('layouts.adminlte')


@section('content')
<h1>Create Purchase</h1>
<form method="POST" action="{{ route('purchases.store') }}">
    @csrf
    <div class="form-group">
        <label for="product_id">Select a Product:</label>
        <select name="product_id" id="product_id" class="form-control">
            @foreach($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" id="quantity" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Create Purchase</button>
</form>
@endsection
