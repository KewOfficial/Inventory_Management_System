@extends('layouts.adminlte')
@section('content')

<h1>Restock Details</h1>
<p><strong>Product:</strong> {{ $restock->product ? $restock->product->name : 'N/A' }}</p>
<p><strong>Quantity:</strong> {{ $restock->submitted_quantity }}</p>
<form method="POST" action="{{ route('restocks.destroy', $restock->id) }}">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete</button>
</form>
<a href="{{ route('restocks.index') }}" class="btn btn-primary">Back to List</a>
@endsection
