<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // Search by product name
        if ($request->filled('search')) {
            $query->search($request->search);
        }

        // Filter by price range
        if ($request->filled('min_price') || $request->filled('max_price')) {
            $query->priceRange($request->min_price, $request->max_price);
        }

        $products = $query->paginate(9);

        // Cookie: remember last search keyword for 7 days
        if ($request->filled('search')) {
            Cookie::queue('last_search', $request->search, 10080);
        }

        $lastSearch = $request->cookie('last_search', '');

        return view('home', compact('products', 'lastSearch'));
    }
}