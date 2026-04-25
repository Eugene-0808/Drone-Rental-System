<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);
        $cartItems = $cart->items()->with('product')->get();

        $subtotal = 0;
        foreach ($cartItems as $item) {
            $subtotal += $item->product->product_price * $item->rental_days;
        }
        $shipping = 30;
        $grand_total = $subtotal + $shipping;

        return view('cart.index', compact('cartItems', 'subtotal', 'shipping', 'grand_total'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'rental_days' => 'required|integer|min:1|max:7',
        ]);

        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);

        CartItem::create([
            'cart_id' => $cart->id,
            'product_id' => $request->product_id,
            'rental_days' => $request->rental_days,
        ]);

        return redirect()->route('cart.index');
    }

    public function remove(CartItem $cartItem)
    {
        // Ensure the cart item belongs to the authenticated user's cart
        if ($cartItem->cart->user_id !== Auth::id()) {
            abort(403);
        }
        $cartItem->delete();
        return redirect()->route('cart.index');
    }
}