<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PurchaseHistoryController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        // Authorization: admin sees all orders, user sees own
        if (Gate::allows('view-all-orders')) {
            $query = Order::with(['orderItems.product']);
        } else {
            // The user identifier in checkout table is 'id'
            $query = Order::with(['orderItems.product'])
                        ->where('id', $user->id);
        }

        // Filters (search by product name only, because there is no date column)
        if ($request->filled('search')) {
            $query->whereHas('orderItems.product', function ($q) use ($request) {
                $q->where('product_name', 'LIKE', '%' . $request->search . '%');
            });
        }

        // Order by checkout_id descending (latest orders first)
        $orders = $query->orderBy('checkout_id', 'desc')->paginate(10);

        return view('purchase-history.index', compact('orders'));
    }
}