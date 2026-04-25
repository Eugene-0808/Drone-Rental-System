@extends('layouts.app')

@section('title', 'Products - Drone FY')

@section('content')
<div class="product-page">
    <h1>Drones Rental - Products</h1>
    <div class="product-grid">
        @foreach ($products as $product)
        <div class="product">
            <a href="{{ route('products.show', $product) }}">
                <img src="{{ $product->product_image }}" alt="{{ $product->product_name }}">
            </a>
            <a href="{{ route('products.show', $product) }}">{{ $product->product_name }}</a>
        </div>
        @endforeach
    </div>
</div>
@endsection