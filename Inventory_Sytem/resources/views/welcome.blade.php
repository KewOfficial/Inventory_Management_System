<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Inventory</title>
    <style>
        /* Background Supernova */
        body {
            background: radial-gradient(ellipse at center, #2e0077 0%, #000000 100%);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            background-blur: 20px;
            color: #fff;
        }

        /* Add your CSS styles here */
        .header-links {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding: 20px;
        }

        .header-links a {
            text-decoration: none;
            margin-left: 10px;
            padding: 8px 16px;
            border-radius: 4px;
            background-color: #007BFF;
            color: #fff;
            transition: background-color 0.3s;
        }

        .header-links a:hover {
            background-color: #0056b3;
        }

        /* Product Grid Styling */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* Adjust the number of columns as needed */
            gap: 20px;
            padding: 20px;
            justify-content: center;
            align-items: center;
        }

        .product-card {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            transition: transform 0.2s, background-color 0.3s;
        }

        .product-card:hover {
            transform: scale(1.05);
            background-color: rgba(255, 255, 255, 1);
        }

        .product-image {
            max-width: 100%;
            height: auto;
        }

        .product-name {
            font-size: 1.2rem;
            font-weight: bold;
            margin: 10px 0;
            color: #000; /* Black font color */
        }

        .product-link {
            text-decoration: none;
            background-color: #007BFF;
            color: #fff;
            padding: 8px 16px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .product-link:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center; padding-top: 20px;">Welcome to Explore Our Wide Range of Products</h1>
    
    <!-- Header Links (Login, Register, About, Contact) -->
    <div class="header-links">
        <a href="{{ route('login') }}">Login</a>
        <a href="#" class="btn btn-primary" onclick="openRegistrationForm()">Register</a>
        <a href="{{ route('about') }}">About</a>
        <a href="{{ route('contact') }}">Contact</a>
    </div>

    <!-- Hidden Registration Form -->
    <form id="register-form" action="{{ route('register') }}" method="GET" style="display: none;">
        @csrf
    </form>

    <div class="product-grid">
        <!-- Product 1 -->
        <div class="product-card">
            <img class="product-image" src="{{ asset('adminlte/img/hp.jpg') }}" alt="Product 1">
            <h2 class="product-name">Hp Pavilion G5</h2>
            <a class="product-link" href="{{ route('products.single', ['product_id' => 1]) }}">View Details</a>
        </div>

        <!-- Product 2 -->
        <div class="product-card">
            <img class="product-image" src="{{ asset('adminlte/img/samsung.jpg') }}" alt="Product 2">
            <h2 class="product-name">Samsung Laptop</h2>
            <a class="product-link" href="{{ route('products.single', ['product_id' => 2]) }}">View Details</a>
        </div>

        <!-- Product 3 -->
        <div class="product-card">
            <img class="product-image" src="adminlte/img/lenovo.avif" alt="Product 3">
            <h2 class="product-name">Lenovo Thinkpad</h2>
            <a class="product-link" href="{{ route('products.single', ['product_id' => 3]) }}">View Details</a>
        </div>

        <!-- Product 4 -->
        <div class="product-card">
            <img class="product-image" src="adminlte/img/ipad.png" alt="Product 4">
            <h2 class="product-name">Apple Tablet</h2>
            <a class="product-link" href="{{ route('products.single', ['product_id' => 4]) }}">View Details</a>
        </div>

        <!-- Product 5 -->
        <div class="product-card">
            <img class="product-image" src="adminlte/img/Toshiba.png" alt="Product 5">
            <h2 class="product-name">Toshiba Laptop</h2>
            <a class="product-link" href="{{ route('products.single', ['product_id' => 5]) }}">View Details</a>
        </div>

        <!-- Product 6 -->
        <div class="product-card">
            <img class="product-image" src="adminlte/img/apple.png" alt="Product 6">
            <h2 class="product-name">Apple TV</h2>
            <a class="product-link" href="{{ route('products.single', ['product_id' => 6]) }}">View Details</a>
        </div>

        <!-- Add more products here -->
        <!-- Product 7 -->
        <div class="product-card">
            <img class="product-image" src="adminlte/img/oppo.jpg" alt="Product 7">
            <h2 class="product-name">Oppo Smartphones</h2>
            <a class="product-link" href="{{ route('products.single', ['product_id' => 7]) }}">View Details</a>
        </div>

        <!-- Product 8 -->
        <div class="product-card">
            <img class="product-image" src="adminlte/img/iphone 14.webp" alt="Product 8">
            <h2 class="product-name">Iphone 14 </h2>
            <a class="product-link" href="{{ route('products.single', ['product_id' => 8]) }}">View Details</a>
        </div>

        <!-- Product 9 -->
        <div class="product-card">
            <img class="product-image" src="adminlte/img/tecno.jpg" alt="Product 9">
            <h2 class="product-name">Tecno Pova 5</h2>
            <a class="product-link" href="{{ route('products.single', ['product_id' => 9]) }}">View Details</a>
        </div>
    </div>

    <script>
        function openRegistrationForm() {
            document.getElementById('register-form').submit();
        }
    </script>
</body>
</html>
