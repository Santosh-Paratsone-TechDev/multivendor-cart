@extends('admin.layout')

@section('content')
<h2 class="mb-4">Add Product</h2>

<div class="card shadow-sm">
    <div class="card-body">

        <form method="POST" action="{{ route('admin.products.store') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-semibold">Vendor</label>
                <select name="vendor_id" class="form-select">
                    @foreach($vendors as $vendor)
                    <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Product Name</label>
                <input type="text" name="name" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Price</label>
                <input type="number" name="price" class="form-control" step="0.01">
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Stock</label>
                <input type="number" name="stock" class="form-control" step="0.01">
            </div>

            <button class="btn btn-success float-end">Create Product</button>
        </form>

    </div>
</div>

@endsection