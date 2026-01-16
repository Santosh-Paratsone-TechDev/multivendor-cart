<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;

class OrderController extends Controller {
    /**
     * Display all orders with filters.
     */
    public function index(Request $request) {
        $query = Order::with(['items.product', 'user', 'vendor']);

        // Filter by vendor
        if ($request->vendor_id) {
            $query->where('vendor_id', $request->vendor_id);
        }

        // Filter by customer
        if ($request->customer_id) {
            $query->where('user_id', $request->customer_id);
        }

        // Filter by status
        if ($request->status) {
            $query->where('status', $request->status);
        }

        $orders = $query->latest()->paginate(10)->withQueryString();

        // Dropdown data
        $vendors = User::where('role', 'vendor')->get();
        $customers = User::where('role', 'customer')->get();

        return view('admin.orders.index', compact('orders', 'vendors', 'customers'));
    }

    /**
     * Show a single order with all details.
     */
    public function show(Order $order) {
        $order->load(['items.product', 'user', 'vendor']);

        return view('admin.orders.show', compact('order'));
    }
}
