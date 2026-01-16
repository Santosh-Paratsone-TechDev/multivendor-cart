<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;

class CheckoutService {

    public function checkout($user) {
        $cart = collect(session()->get('cart', []));

        if ($cart->isEmpty()) {
            throw new \Exception('Your cart is empty');
        }

        // Group by vendor
        $grouped = $cart->groupBy('vendor_id');

        DB::transaction(function () use ($grouped, $user) {

            foreach ($grouped as $vendorId => $items) {

                $order = Order::create([
                    'user_id' => $user->id,
                    'vendor_id' => $vendorId,
                    'total' => 0,
                    'status' => 'paid',
                ]);

                $total = 0;

                foreach ($items as $item) {

                    // STOCK LOCKING (critical)
                    $product = Product::where('id', $item['product_id'])
                        ->lockForUpdate()
                        ->first();

                    if (!$product || $product->stock < $item['quantity']) {
                        throw new \Exception("Stock changed for {$item['name']}");
                    }

                    // Use relationship to create order items
                    $order->items()->create([
                        'product_id' => $product->id,
                        'price' => $product->price,
                        'quantity' => $item['quantity'],
                    ]);

                    // Safe stock decrement
                    $product->decrement('stock', $item['quantity']);

                    $total += $product->price * $item['quantity'];
                }

                $order->update(['total' => $total]);

                Payment::create([
                    'order_id' => $order->id,
                    'status' => 'paid',
                ]);
            }
        });

        session()->forget('cart');
    }
}
