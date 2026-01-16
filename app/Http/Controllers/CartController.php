<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller {
    // Add product to cart
    public function add(Product $product) {
        // Stock check
        if ($product->stock < 1) {
            return back()->with('error', 'Out of stock');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            if ($cart[$product->id]['quantity'] + 1 > $product->stock) {
                return back()->with('error', 'Quantity exceeds stock');
            }
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                'product_id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'vendor_id' => $product->vendor_id,
                'vendor_name' => $product->vendor?->name,
                'quantity' => 1,
                'stock' => $product->stock,
            ];
        }

        session()->put('cart', $cart);
        //return back()->with('success', 'Product added to cart');
        return back()->with('success', "{$product->name} added to cart");
    }

    // Show cart page
    public function index() {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    // Update quantity
    public function update(Request $request, Product $product) {
        $cart = session()->get('cart', []);

        $quantity = (int) $request->quantity;

        if (!isset($cart[$product->id])) {
            return back()->with('error', 'Product not in cart');
        }

        // Use session stored stock
        $stock = $cart[$product->id]['stock'] ?? $product->stock;

        if ($quantity < 1) {
            unset($cart[$product->id]);
        } elseif ($quantity > $stock) {
            return back()->with('error', 'Quantity exceeds stock');
        } else {
            $cart[$product->id]['quantity'] = $quantity;
        }

        session()->put('cart', $cart);
        //return back()->with('success', 'Cart updated');
        return back()->with('success', "{$product->name} quantity updated");
    }

    // Remove product from cart
    public function remove(Product $product) {
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            unset($cart[$product->id]);
            session()->put('cart', $cart);
        }

        //return back()->with('success', 'Product removed from cart');
        return back()->with('success', "{$product->name} removed from cart");
    }
}
