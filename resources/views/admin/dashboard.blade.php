@extends('admin.layout')

@section('content')
<h2>Admin Dashboard</h2>

<div class="row mt-4">
    <div class="col-md-3">
        <div class="card p-3">
            <h5>Total Orders</h5>
            <p>{{ $totalOrders ?? 0 }}</p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3">
            <h5>Total Customers</h5>
            <p>{{ $totalCustomers ?? 0 }}</p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3">
            <h5>Total Vendors</h5>
            <p>{{ $totalVendors ?? 0 }}</p>
        </div>
    </div>
</div>
@endsection