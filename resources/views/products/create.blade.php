@extends('layouts.app')

@section('title', 'Create Product - Drone FY')

@section('content')
<div class="product-form-container">
    <h2>Create New Product</h2>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="product-form">
        @csrf

        <div class="form-group">
            <label for="product_name">Product Name *</label>
            <input 
                type="text" 
                id="product_name" 
                name="product_name" 
                class="form-control @error('product_name') is-invalid @enderror"
                value="{{ old('product_name') }}"
                required>
            @error('product_name')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="product_description">Description *</label>
            <textarea 
                id="product_description" 
                name="product_description" 
                class="form-control @error('product_description') is-invalid @enderror"
                rows="5"
                required>{{ old('product_description') }}</textarea>
            @error('product_description')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="product_price">Price (RM) *</label>
            <input 
                type="number" 
                id="product_price" 
                name="product_price" 
                class="form-control @error('product_price') is-invalid @enderror"
                step="0.01"
                min="0"
                value="{{ old('product_price') }}"
                required>
            @error('product_price')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="status">Status *</label>
            <select 
                id="status" 
                name="status" 
                class="form-control @error('status') is-invalid @enderror"
                required>
                <option value="">Select Status</option>
                <option value="Available" {{ old('status') === 'Available' ? 'selected' : '' }}>Available</option>
                <option value="Under Maintenance" {{ old('status') === 'Under Maintenance' ? 'selected' : '' }}>Under Maintenance</option>
            </select>
            @error('status')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="product_image">Product Image</label>
            <input 
                type="file" 
                id="product_image" 
                name="product_image" 
                class="form-control @error('product_image') is-invalid @enderror"
                accept="image/*">
            @error('product_image')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Create Product</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>

<style>
    .product-form-container {
        max-width: 600px;
        margin: 30px auto;
        padding: 20px;
        background: #f9f9f9;
        border-radius: 8px;
    }

    .product-form-container h2 {
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 14px;
    }

    .form-control:focus {
        outline: none;
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
    }

    .is-invalid {
        border-color: #dc3545;
    }

    .error {
        color: #dc3545;
        font-size: 12px;
        margin-top: 5px;
        display: block;
    }

    .form-actions {
        display: flex;
        gap: 10px;
        margin-top: 20px;
    }

    .btn {
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
        text-decoration: none;
        display: inline-block;
    }

    .btn-primary {
        background-color: #28a745;
        color: white;
    }

    .btn-primary:hover {
        background-color: #218838;
    }

    .btn-secondary {
        background-color: #6c757d;
        color: white;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
    }
</style>
@endsection
