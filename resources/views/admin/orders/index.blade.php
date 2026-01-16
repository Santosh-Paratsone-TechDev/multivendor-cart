@extends('admin.layout')

@section('content')
<h2 class="mb-4">Orders</h2>

<div class="card shadow-sm mb-4">
    <div class="card-body">

        <form method="GET" class="row g-3">

            <div class="col-md-3">
                <label class="form-label fw-semibold">Vendor</label>
                <select name="vendor_id" class="form-select">
                    <option value="">All Vendors</option>
                    @foreach($vendors as $vendor)
                    <option value="{{ $vendor->id }}" @selected(request('vendor_id')==$vendor->id)>
                        {{ $vendor->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <label class="form-label fw-semibold">Customer</label>
                <select name="customer_id" class="form-select">
                    <option value="">All Customers</option>
                    @foreach($customers as $customer)
                    <option value="{{ $customer->id }}" @selected(request('customer_id')==$customer->id)>
                        {{ $customer->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <label class="form-label fw-semibold">Status</label>
                <select name="status" class="form-select">
                    <option value="">All Status</option>
                    <option value="pending" @selected(request('status')=='pending' )>Pending</option>
                    <option value="paid" @selected(request('status')=='paid' )>Paid</option>
                </select>
            </div>

            <div class="col-md-3 d-flex align-items-end">
                <button class="btn btn-primary w-100">Apply Filters</button>
            </div>

        </form>

    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">

        <table class="table table-striped table-hover mb-0">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Vendor</th>
                    <th>Customer</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Placed On</th>
                    <th class="text-end">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->vendor->name }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>₹{{ number_format($order->total, 2) }}</td>

                    <td>
                        @if($order->status === 'pending')
                        <span class="badge bg-warning text-dark">Pending</span>
                        @elseif($order->status === 'paid')
                        <span class="badge bg-success">Paid</span>
                        @else
                        <span class="badge bg-secondary">{{ ucfirst($order->status) }}</span>
                        @endif
                    </td>

                    <td>{{ $order->created_at->format('d M Y') }}</td>

                    <td class="text-end">
                        <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-sm btn-info">
                            View
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

<div class="d-flex justify-content-end mt-3">
    {{ $orders->links('pagination::bootstrap-5') }}
</div>

@endsection