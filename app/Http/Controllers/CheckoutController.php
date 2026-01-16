<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CheckoutService;

class CheckoutController extends Controller {

    public function checkout(CheckoutService $service) {
        // Must be logged in
        if (!auth()->check()) {
            session()->put('url.intended', url()->previous());
            return redirect('/login')->with('error', 'Please login to checkout');
        }

        // Must be customer
        if (auth()->user()->role !== 'customer') {
            return back()->with('error', 'Only customers can checkout');
        }

        $service->checkout(auth()->user());

        return redirect('/')->with('success', 'Order placed');
    }
}
