@extends('layouts.adminlte')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Sales List</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Quantity Sold</th>
                        <th>Price Per Unit</th>
                        <th>Total price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sales as $sale)
                        <tr>
                            <td>{{ $sale->id }}</td>
                            <td>
                                @if ($sale->product)
                                    {{ $sale->product->name }}
                                @else
                                    {{ $sale->product_name }}
                                @endif
                            </td>
                            <td>{{ $sale->quantity_sold }}</td>
                            <td>{{ $sale->price_per_unit }}</td>
                            <td>{{ $sale->total_price }}</td>
                            <td>
                                <a href="{{ route('sales.edit', ['id' => $sale->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                                {{ $sale->id }} <!-- Add this line for debugging -->
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
