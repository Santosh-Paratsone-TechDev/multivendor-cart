@extends('admin.layout')

@section('content')
<h2 class="mb-4">Edit Product</h2>

<div class="card shadow-sm">
    <div class="card-body">

        <form method="POST" action="{{ route('admin.products.update', $product) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label fw-semibold">Vendor</label>
                <select name="vendor_id" class="form-select">
                    @foreach($vendors as $vendor)
                    <option value="{{ $vendor->id }}" @selected($product->vendor_id == $vendor->id)>
                        {{ $vendor->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Product Name</label>
                <input type="text" name="name" class="form-control" value="{{ $product->name }}">
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Price</label>
                <input type="number" name="price" class="form-control" step="0.01" value="{{ $product->price }}">
            </div>

            <button class="btn btn-success">Update Product</button>
        </form>

    </div>
</div>

@endsection