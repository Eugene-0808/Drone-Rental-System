@extends('layouts.app')

@section('title', $product->product_name . ' - Details')

@section('content')
<div class="product-detail-page">
    <div class="detail-container">
        <img src="{{ $product->product_image }}" alt="{{ $product->product_name }}">
        <div class="detail-info">
            <h2>{{ $product->product_name }}</h2>
            <p>{{ $product->product_description }}</p>
            <p class="price">RM{{ $product->product_price }}/day</p>

            <form action="{{ route('cart.add') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">

                <label for="duration">Select rental duration:</label>
                <select id="duration" name="rental_days">
                    @for ($i = 1; $i <= 7; $i++)
                        <option value="{{ $i }}">{{ $i }} Day{{ $i > 1 ? 's' : '' }}</option>
                    @endfor
                </select>

                <div class="buttons">
                    <button type="submit" class="add-cart">Add to Cart</button>
                    <a class="book-now" href="{{ route('checkout.index', ['product_id' => $product->id, 'rental_days' => 1]) }}">Book Now</a>
                </div>
            </form>

            <a class="back-link" href="{{ route('products.index') }}">Back to Products</a>
        </div>
    </div>
</div>
@endsection