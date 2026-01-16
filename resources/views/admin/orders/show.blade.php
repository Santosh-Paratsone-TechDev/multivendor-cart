@extends('admin.layout')

@section('content')
<h2>Order #{{ $order->id }}</h2>

<p><strong>Vendor:</strong> {{ $order->vendor->name }}</p>
<p><strong>Customer:</strong> {{ $order->user->name }}</p>
<p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
<p><strong>Total:</strong> ₹{{ $order->total }}</p>

<hr>

<h4>Items</h4>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Subtotal</th>
        </tr>
    </thead>

    <tbody>
        @foreach($order->items as $item)
        <tr>
            <td>{{ $item->product->name }}</td>
            <td>₹{{ $item->price }}</td>
            <td>{{ $item->quantity }}</td>
            <td>₹{{ $item->price * $item->quantity }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection