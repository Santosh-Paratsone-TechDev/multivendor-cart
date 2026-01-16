@extends('admin.layout')

@section('content')
<h2 class="mb-4">Products</h2>

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
                <label class="form-label fw-semibold">Search Product</label>
                <input type="text" name="search" class="form-control"
                    placeholder="Product name"
                    value="{{ request('search') }}">
            </div>

            <div class="col-md-2">
                <label class="form-label fw-semibold">Min Price</label>
                <input type="number" name="min_price" class="form-control"
                    value="{{ request('min_price') }}">
            </div>

            <div class="col-md-2">
                <label class="form-label fw-semibold">Max Price</label>
                <input type="number" name="max_price" class="form-control"
                    value="{{ request('max_price') }}">
            </div>

            <div class="col-md-2 d-flex align-items-end">
                <button class="btn btn-primary w-100">Apply Filters</button>
            </div>

        </form>

    </div>
</div>

<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.products.create') }}" class="btn btn-success">
        + Add Product
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">

        <table class="table table-striped table-hover mb-0">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Vendor</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Created</th>
                    <th class="text-end">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->vendor->name }}</td>
                    <td>{{ $product->name }}</td>
                    <td>₹{{ number_format($product->price, 2) }}</td>
                    <td>{{ $product->created_at->format('d M Y') }}</td>

                    <td class="text-end">
                        <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-warning">
                            Edit
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>

    </div>
</div>

<div class="d-flex justify-content-end mt-3">
    {{ $products->links('pagination::bootstrap-5') }}
</div>

@endsection