@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-5">Product Details</h1>
    <table class="table table-bordered mt-4">
        <tr>
            <th class="w-25">Name:</th>
            <td>{{ $product->name }}</td>
        </tr>
        <tr>
            <th>Product Description:</th>
            <td>{{ $product->description }}</td>
        </tr>
        <tr>
            <th>Selling Price:</th>
            <td>{{ $product->selling_price }}</td>
        </tr>
    </table>
</div>
@endsection
