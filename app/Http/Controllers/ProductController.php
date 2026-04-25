<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        $products = Product::query()
            ->when($search, function ($query, $search) {
                return $query->where('product_name', 'like', '%' . $search . '%')
                         ->orWhere('product_description', 'like', '%' . $search . '%');
                })
                ->get();

        return view('products.index', compact('products', 'search'));
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
}
 