<?php


namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller {
    // public function index(Request $request) {
    //     $vendors = User::where('role', 'vendor')->get();

    //     $products = Product::with('vendor')
    //         ->when($request->vendor_id, function ($q) use ($request) {
    //             $q->where('vendor_id', $request->vendor_id);
    //         })
    //         ->when($request->min_price, function ($q) use ($request) {
    //             $q->where('price', '>=', $request->min_price);
    //         })
    //         ->when($request->max_price, function ($q) use ($request) {
    //             $q->where('price', '<=', $request->max_price);
    //         })
    //         ->paginate(6)
    //         ->withQueryString();

    //     return view('products.index', compact('products', 'vendors'));
    // }

    public function index(Request $request) {
        $query = Product::query();

        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->vendor_id) {
            $query->where('vendor_id', $request->vendor_id);
        }

        if ($request->min_price) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->max_price) {
            $query->where('price', '<=', $request->max_price);
        }

        // Sorting
        if ($request->sort === 'price_low') {
            $query->orderBy('price', 'asc');
        }

        if ($request->sort === 'price_high') {
            $query->orderBy('price', 'desc');
        }

        if ($request->sort === 'relevance') {
            // Relevance = match search term first
            if ($request->search) {
                $query->orderByRaw("CASE 
            WHEN name LIKE ? THEN 0 
            ELSE 1 
        END", ["%{$request->search}%"]);
            }
        }

        $products = $query->paginate(9)->withQueryString();

        $vendors = User::where('role', 'vendor')->get();

        return view('products.index', compact('products', 'vendors'));
    }

    public function suggest(Request $request) {
        $search = $request->get('q');

        $products = Product::where('name', 'like', "%{$search}%")
            ->limit(5)
            ->get(['id', 'name']);

        return response()->json($products);
    }
}
