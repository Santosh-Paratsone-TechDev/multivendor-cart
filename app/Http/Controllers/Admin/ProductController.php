<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

class ProductController extends Controller {
    public function index(Request $request) {
        $query = Product::with('vendor');

        // Filter by vendor
        if ($request->vendor_id) {
            $query->where('vendor_id', $request->vendor_id);
        }

        // Search by product name
        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Price range
        if ($request->min_price) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->max_price) {
            $query->where('price', '<=', $request->max_price);
        }

        $products = $query->latest()->paginate(15)->withQueryString();

        $vendors = User::where('role', 'vendor')->get();

        return view('admin.products.index', compact('products', 'vendors'));
    }

    public function create() {
        $vendors = User::where('role', 'vendor')->get();
        return view('admin.products.create', compact('vendors'));
    }

    public function store(Request $request) {
        $request->validate([
            'vendor_id' => 'required',
            'name' => 'required',
            'price' => 'required|numeric',
        ]);

        Product::create($request->all());

        return redirect()->route('admin.products.index')
            ->with('success', 'Product created successfully');
    }

    public function edit(Product $product) {
        $vendors = User::where('role', 'vendor')->get();
        return view('admin.products.edit', compact('product', 'vendors'));
    }

    public function update(Request $request, Product $product) {
        $request->validate([
            'vendor_id' => 'required',
            'name' => 'required',
            'price' => 'required|numeric',
        ]);

        $product->update($request->all());

        return redirect()->route('admin.products.index')
            ->with('success', 'Product updated successfully');
    }
}
