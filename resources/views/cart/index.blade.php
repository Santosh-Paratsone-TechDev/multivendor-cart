<x-app-layout>
    <div class="container py-4">

        <h2 class="mb-4">Your Cart</h2>

        @php
        $grouped = collect($cart)->groupBy('vendor_name');
        $totalItems = collect($cart)->sum('quantity');
        $totalPrice = collect($cart)->sum(function($item) { return $item['price'] * $item['quantity']; });
        @endphp

        <p class="mb-4"><strong>Total items:</strong> {{ $totalItems }} | <strong>Total price:</strong> ₹{{ number_format($totalPrice, 2) }}</p>

        @forelse($grouped as $vendor => $items)
        <h5 class="mt-3 mb-2">Seller: {{ $vendor ?? 'Unknown' }}</h5>

        <ul class="list-group mb-3">
            @foreach($items as $item)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <strong>{{ $item['name'] }}</strong><br>
                    <small>Price / unit: ₹{{ number_format($item['price'], 2) }} | In-Stock: {{ $item['stock'] }}</small>
                </div>

                <div class="d-flex align-items-center gap-2">
                    <!-- Quantity update form -->
                    <form class="d-flex align-items-center gap-2" method="POST" action="{{ route('cart.update', $item['product_id']) }}">
                        @csrf
                        <input type="number"
                            name="quantity"
                            value="{{ $item['quantity'] }}"
                            min="1"
                            max="{{ $item['stock'] ?? $item['quantity'] }}"
                            class="form-control form-control-sm"
                            style="width:70px;">
                        <button class="btn btn-sm btn-primary">Update</button>
                    </form>

                    <!-- Remove button -->
                    <form method="POST" action="{{ route('cart.remove', $item['product_id']) }}">
                        @csrf
                        <button class="btn btn-sm btn-danger">Remove</button>
                    </form>
                </div>
            </li>
            @endforeach
        </ul>
        @empty
        <p class="text-muted">Cart is empty</p>
        @endforelse

        @auth
        @if(auth()->user()->role === 'customer' && count($cart) > 0)
        <a href="{{ route('checkout') }}" class="btn btn-success mt-3 float-end">Proceed to Checkout</a>
        @else
        <p class="text-info">Login as a customer to proceed to checkout</p>
        @endif
        @else
        <p class="text-info">Login as a customer to proceed to checkout</p>
        @endauth

    </div>
</x-app-layout>