@extends('layouts.adminlte')


@section('content')

    <h1>Purchase List</h1>
    <a href="{{ route('purchases.create') }}" class="btn btn-primary">Add Purchase</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($purchases as $purchase)
                <tr>
                    <td>{{ $purchase->id }}</td>
                    <td>{{ $purchase->product->name }}</td>
                    <td>{{ $purchase->created_at }}</td>
                    <td>
                        <a href="{{ route('purchases.show', $purchase->id) }}" class="btn btn-info">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection