<!-- resources/views/cart/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Cart</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <ul>
            @foreach($cart as $productId => $quantity)
                <li>
                    Product ID: {{ $productId }} - Quantity: {{ $quantity }}
                    <!-- Add forms to update or remove items -->
                    <form action="{{ route('cart.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $productId }}">
                        <input type="number" name="quantity" value="{{ $quantity }}">
                        <button type="submit">Update</button>
                    </form>
                    <form action="{{ route('cart.remove') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $productId }}">
                        <button type="submit">Remove</button>
                    </form>
                </li>
            @endforeach
        </ul>

        <form action="{{ route('cart.clear') }}" method="POST">
            @csrf
            <button type="submit">Clear Cart</button>
        </form>
    </div>
</body>
</html>
