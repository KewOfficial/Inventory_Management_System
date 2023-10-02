@extends('layouts.adminlte')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Create Sale</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('sales.store') }}">
            @csrf
            <div class="form-group">
                <label for="product_name">Product Name</label>
                <select name="product_name" id="product_name" class="form-control" required>
                    <option value="" disabled selected>Select a product</option>
                    @foreach($products as $product)
                        @php
                            $productLabel = $product->name . ' (' . $product->quantity . ')';
                            $disabled = $product->quantity === 0 ? 'disabled' : '';
                        @endphp
                        <option value="{{ $product->name }}" {{ $disabled }} data-selling-price="{{ $product->price }}">{{ $productLabel }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="quantity_sold">Quantity Sold</label>
                <input type="number" name="quantity_sold" id="quantity_sold" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="price_per_unit">Price Per Unit</label>
                <input type="number" step="0.01" name="price_per_unit" id="price_per_unit" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="total_price">Total Price</label>
                <input type="number" name="total_price" id="total_price" class="form-control" readonly>
            </div>
            <button type="submit" class="btn btn-primary">Create Sale</button>
        </form>
    </div>
</div>

<script>
    // Calculate and update the total price when quantity or price per unit changes
    const quantityInput = document.getElementById('quantity_sold');
    const priceInput = document.getElementById('price_per_unit');
    const totalInput = document.getElementById('total_price');
    const productDropdown = document.getElementById('product_name');

    // Populate the price field when a product is selected
    productDropdown.addEventListener('change', function() {
        const selectedOption = productDropdown.options[productDropdown.selectedIndex];
        const sellingPrice = selectedOption.getAttribute('data-selling-price');

        if (sellingPrice) {
            priceInput.value = sellingPrice;
        } else {
            priceInput.value = '';
        }
    });

    quantityInput.addEventListener('input', updateTotalPrice);
    priceInput.addEventListener('input', updateTotalPrice);

    function updateTotalPrice() {
        const quantity = parseFloat(quantityInput.value);
        const price = parseFloat(priceInput.value);

        if (!isNaN(quantity) && !isNaN(price)) {
            const totalPrice = quantity * price;
            totalInput.value = totalPrice.toFixed(2); // Display with two decimal places
        } else {
            totalInput.value = '';
        }
    }

    // Disable the product dropdown when quantity is 0
    quantityInput.addEventListener('input', function() {
        const selectedProduct = productDropdown.options[productDropdown.selectedIndex];
        const isDisabled = parseFloat(selectedProduct.textContent.match(/\((\d+)\)/)[1]) === 0;

        productDropdown.disabled = isDisabled;
    });
</script>
@endsection
