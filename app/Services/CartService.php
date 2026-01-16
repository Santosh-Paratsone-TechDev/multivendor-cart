<?php

namespace App\Services;

use App\Models\Product;
use App\Models\User;

class CartService {
    public function add(User $user, Product $product, int $qty) {
        if ($qty > $product->stock) {
            throw new \Exception('Quantity exceeds stock');
        }

        $cart = $user->cart()->firstOrCreate([]);

        $item = $cart->items()->where('product_id', $product->id)->first();

        if ($item) {
            if ($item->quantity + $qty > $product->stock) {
                throw new \Exception('Total quantity exceeds stock');
            }
            $item->increment('quantity', $qty);
        } else {
            $cart->items()->create([
                'product_id' => $product->id,
                'quantity' => $qty
            ]);
        }
    }
}
