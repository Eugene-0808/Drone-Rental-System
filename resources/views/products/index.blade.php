@extends('layouts.app')

@section('title', 'Products - Drone FY')

@section('content')
<div class="product-page">
    <h1>Drones Rental - Products</h1>

    <form action="{{ route('products.index') }}" method="GET" class="search-form">
        <input 
            type="text" 
            name="search" 
            placeholder="Search drones..." 
            value="{{ request('search') }}"
            class="search-input"
        >
        <button type="submit" class="search-btn">🔍 Search</button>
    </form>

    <div class="product-grid">
        @forelse ($products as $product)
        <div class="product">
            <a href="{{ route('products.show', $product) }}">
                <img src="{{ asset('photo/' . basename($product->product_image)) }}" alt="{{ $product->product_name }}">
            </a>
            <a href="{{ route('products.show', $product) }}">{{ $product->product_name }}</a>
        </div>
        @empty
        <p>No products found.</p>
        @endforelse
    </div>
</div>
@endsection 