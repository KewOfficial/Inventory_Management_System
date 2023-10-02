@extends('layouts.adminlte')

@section('content')

    <h1>Purchase Details</h1>
    <table class="table">
        <tbody>
            <tr>
                <th>ID:</th>
                <td>{{ $purchase->id }}</td>
            </tr>
            <tr>
                <th>Product Name:</th>
                <td>{{ $purchase->product->name }}</td>
            </tr>
            <tr>
                <th>Created At:</th>
                <td>{{ $purchase->created_at }}</td>
            </tr>
        </tbody>
    </table>
    <a href="{{ route('purchases.index') }}" class="btn btn-primary">Back to List</a>

    @endsection
