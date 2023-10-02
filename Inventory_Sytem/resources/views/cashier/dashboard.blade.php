@extends('layouts.app') <!-- Assuming you have a layout file -->

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cashier Dashboard</div>

                <div class="card-body">
                    <h1>Welcome, {{ Auth::user()->name }}</h1>

                    <!-- Display recent restocks -->
                    <h2>Recent Restocks</h2>
                    <ul>
                        @foreach ($recentRestocks as $restock)
                            <li>{{ $restock->product->name }} - Quantity: {{ $restock->quantity }}</li>
                        @endforeach
                    </ul>

                    <!-- Display recent sales -->
                    <h2>Recent Sales</h2>
                    <ul>
                        @foreach ($recentSales as $sale)
                            <li>{{ $sale->product->name }} - Quantity: {{ $sale->quantity }} - Total Price: ${{ $sale->total_price }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
