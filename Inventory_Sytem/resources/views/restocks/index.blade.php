@extends('layouts.adminlte')
@section('content')

<h1>Restock List</h1>
<a href="{{ route('restocks.create') }}" class="btn btn-primary">Add Restock</a>
<table class="table">
    <thead>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($restocks as $restock)
        <tr>
            <td>{{ $restock->product->name }}</td>
            <td>{{ $restock->submitted_quantity }}</td>
            <td>
                <a href="{{ route('restocks.show', $restock->id) }}" class="btn btn-info">View</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
