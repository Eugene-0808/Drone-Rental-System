@extends('layouts.app')

@section('title', 'Products - Drone FY')

@section('content')
<div class="product-page">
    <div class="products-header">
        <h1>Drones Rental - Products</h1>
        @if(Auth::check() && Auth::user()->role === 'admin')
            <a href="{{ route('products.create') }}" class="btn btn-primary">+ Add Product</a>
        @endif
    </div>

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
            @if($product->status === 'Under Maintenance')
                <div class="product-image-container">
                    <img src="{{ asset($product->product_image) }}" alt="{{ $product->product_name }}" class="unavailable-image">
                    <div class="status-badge maintenance">Under Maintenance</div>
                </div>
            @else
                <a href="{{ route('products.show', $product) }}" class="product-link">
                    <div class="product-image-container">
                        <img src="{{ asset($product->product_image) }}" alt="{{ $product->product_name }}">
                        <div class="status-badge available">Available</div>
                    </div>
                </a>
            @endif
            
            @if($product->status === 'Under Maintenance')
                <p class="product-name unavailable">{{ $product->product_name }}</p>
            @else
                <a href="{{ route('products.show', $product) }}" class="product-name">{{ $product->product_name }}</a>
            @endif
            
            @if(Auth::check() && Auth::user()->role === 'admin')
                <div class="product-actions">
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-edit">✏️ Edit</a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete" onclick="return confirm('Are you sure?')">🗑️ Delete</button>
                    </form>
                </div>
            @endif
        </div>
        @empty
        <p>No products found.</p>
        @endforelse
    </div>
</div>

<style>
    .products-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .btn {
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
        font-size: 14px;
        display: inline-block;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-primary {
        background-color: #28a745;
        color: white;
    }

    .btn-primary:hover {
        background-color: #218838;
    }

    /* ========== ENSURE EDIT & DELETE BUTTONS ARE EQUAL SIZE ========== */
    .product-actions {
    display: flex;
    gap: 8px;
    margin-top: 12px;
    width: 100%;
}

    /* Make both children share available space equally */
    .product-actions .btn-edit,
    .product-actions .delete-form {
        flex: 1 1 0;       /* same base size, can grow/shrink equally */
        min-width: 0;      /* prevent overflow */
        display: flex;     /* make the form a flex container too */
    }

    /* Remove any default form margins */
    .product-actions .delete-form {
        margin: 0;
    }

    /* Both buttons (edit link & delete button) get identical sizing rules */
    .product-actions .btn-edit,
    .product-actions .btn-delete {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;           /* fill the parent container */
        padding: 8px 0;        /* same padding (remove horizontal diff) */
        font-size: 14px;
        font-weight: 500;
        border-radius: 4px;
        text-align: center;
        box-sizing: border-box;
        white-space: nowrap;    /* prevent text wrapping inside button */
    }

    /* Edit button specific */
    .product-actions .btn-edit {
        background-color: #007bff;
        color: white;
        text-decoration: none;
    }

    .product-actions .btn-edit:hover {
        background-color: #0056b3;
    }

    /* Delete button specific */
    .product-actions .btn-delete {
        background-color: #dc3545;
        color: white;
        border: none;
        cursor: pointer;
    }

    .product-actions .btn-delete:hover {
        background-color: #c82333;
    }
    /* =========================================================== */

    .product-image-container {
        position: relative;
        width: 100%;
        aspect-ratio: 1;
        overflow: hidden;
        border-radius: 8px;
        margin-bottom: 10px;
    }

    .product-image-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .unavailable-image {
        opacity: 0.6;
        filter: grayscale(100%);
    }

    .status-badge {
        position: absolute;
        top: 8px;
        right: 8px;
        padding: 6px 12px;
        font-size: 12px;
        font-weight: bold;
        border-radius: 4px;
        color: white;
    }

    .status-badge.available {
        background-color: rgba(40, 167, 69, 0.9);
    }

    .status-badge.maintenance {
        background-color: rgba(255, 193, 7, 0.95);
        color: #333;
    }

    .product-link {
        text-decoration: none;
    }

    .product-name {
        color: #333;
        text-decoration: none;
        font-weight: 500;
        display: block;
        margin-bottom: 10px;
        transition: color 0.3s ease;
    }

    .product-name:hover {
        color: #007bff;
    }

    .product-name.unavailable {
        color: #999;
        cursor: not-allowed;
    }

    .product-name.unavailable:hover {
        color: #999;
    }

    .product {
        display: flex;
        flex-direction: column;
    }
</style>
@endsection