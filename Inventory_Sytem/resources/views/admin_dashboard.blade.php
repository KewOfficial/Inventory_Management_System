@extends('layouts.adminlte')

@section('content')
<div class="container-fluid">
    <!-- Main content header -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Admin Dashboard</h3>
                </div>
                <div class="card-body">
                    <!-- Add your admin-specific dashboard content here -->
                    
                    <!-- Example: Product Management Section -->
                    <h4>Product Management</h4>
                    <ul>
                        <li><a href="{{ route('products.index') }}">Product List</a></li>
                        <li><a href="{{ route('products.create') }}">Create Product</a></li>
                    </ul>

                    <!-- Example: Sales Reports Section -->
                    <h4>Sales Reports</h4>
                    <ul>
                        <li><a href="{{ route('sales.index') }}">Sales List</a></li>
                        <li><a href="{{ route('sales.create') }}">Create Sale</a></li>
                    </ul>

                    <!-- Example: Purchases Section -->
                    <h4>Purchases</h4>
                    <ul>
                        <li><a href="{{ route('purchases.index') }}">Purchase List</a></li>
                        <li><a href="{{ route('purchases.create') }}">Create Purchase</a></li>
                        <!-- Add more purchase-related links as needed -->
                    </ul>

                    <!-- Example: Restock Section -->
                    <h4>Restock Requests</h4>
                    <ul>
                        <li><a href="{{ route('restocks.index') }}">Restock List</a></li>
                        <!-- Add more restock-related links as needed -->
                    </ul>

                    <!-- Display Remaining Products -->
                    <h4>Remaining Products</h4>
                    <ul>
                        @foreach ($remainingProducts as $product)
                            <li>{{ $product->name }} - Remaining Quantity: {{ $product->quantity }}</li>
                        @endforeach
                    </ul>
                    
                    <!-- Add more sections and links for admin-specific functionalities -->
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
