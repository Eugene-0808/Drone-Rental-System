@extends('layouts.app')

@section('title', 'Shopping Cart')

@section('content')
<div class="cart-container">
    <h1>Shopping Cart</h1>

    @if ($cartItems->isNotEmpty())
        <table>
            <tr>
                <th>Item</th>
                <th>Price (RM)</th>
                <th>Rental Days</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
            @foreach ($cartItems as $item)
            <tr>
                <td class="cart-item">
                    <img src="{{ $item->product->product_image }}" alt="{{ $item->product->product_name }}"><br>
                    {{ $item->product->product_name }}
                </td>
                <td>{{ number_format($item->product->product_price, 2) }}</td>
                <td>{{ $item->rental_days }}</td>
                <td>RM {{ number_format($item->product->product_price * $item->rental_days, 2) }}</td>
                <td>
                    <form action="{{ route('cart.remove', $item) }}" method="POST" onsubmit="return confirm('Remove this item?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="remove-link">❌ Remove</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>

        <div class="totals">
            <p>SubTotal: RM {{ number_format($subtotal, 2) }}</p>
            <p>Shipping: {{ $shipping == 0 ? "Free" : "RM " . number_format($shipping, 2) }}</p>
            <p><b>Grand Total: RM {{ number_format($grand_total, 2) }}</b></p>
        </div>

        <button class="checkout-btn" onclick="window.location.href='{{ route('checkout.index') }}'">Check Out</button>
    @else
        <div class="empty-cart">
            <p>Your cart is empty!</p>
        </div>
    @endif

    <a href="{{ route('products.index') }}" class="back-link">⬅ Continue Shopping</a>
</div>
@endsection