@extends('layouts.adminlte')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Sale</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('sales.update', $sale->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="product_id">Product Name</label>
                    <select class="form-control" name="product_id" id="product_id">
                        @foreach($products as $product)
                            <option value="{{ $product->id }}" data-selling-price="{{ $product->selling_price }}" @if($product->id == $sale->product_id) selected @endif>{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="quantity_sold">Quantity Sold</label>
                    <input type="number" name="quantity_sold" class="form-control" value="{{ $sale->quantity_sold }}" required>
                </div>
                <div class="form-group">
                    <label for="price_per_unit">Price Per Unit</label>
                    <input type="number" step="0.01" name="price_per_unit" id="price_per_unit" class="form-control" value="{{ $sale->product->selling_price }}" required readonly>
                </div>
                <div class="form-group">
                    <label for="total_price">Total Price</label>
                    <input type="number" step="0.01" name="total_price" class="form-control" value="{{ $sale->total_price }}" readonly>
                </div>
                <button type="submit" class="btn btn-primary">Update Sale</button>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            // Function to update the Price Per Unit field based on the selected product
            function updatePricePerUnit() {
                var selectedProductId = $('#product_id').val();
                var sellingPrice = parseFloat($('option:selected', '#product_id').data('selling-price')) || 0;
                $('#price_per_unit').val(sellingPrice.toFixed(2));
                calculateTotalPrice();
            }

            // Calculate the Total Price when Quantity Sold changes
            $('input[name="quantity_sold"]').on('input', calculateTotalPrice);
            $('#product_id').change(updatePricePerUnit);

            function calculateTotalPrice() {
                var quantitySold = parseFloat($('input[name="quantity_sold"]').val()) || 0;
                var pricePerUnit = parseFloat($('input[name="price_per_unit"]').val()) || 0;
                var totalPrice = quantitySold * pricePerUnit;
                $('input[name="total_price"]').val(totalPrice.toFixed(2));
            }

            // Initial setup
            updatePricePerUnit();
        });
    </script>
@endsection
