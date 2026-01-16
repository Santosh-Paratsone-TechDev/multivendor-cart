<x-app-layout>
    <div class="container py-4">

        <h2 class="mb-4">Products</h2>

        <!-- Filters -->
        <form class="row mb-4" method="GET">
            <div class="col-md-2 position-relative">
                <input type="text" name="search" id="searchBox" class="form-control"
                    placeholder="Search products..." value="{{ request('search') }}">

                <div id="suggestions"
                    class="list-group position-absolute w-100"
                    style="z-index: 1000; display:none;">
                </div>
            </div>

            <div class="col-md-2">
                <select name="vendor_id" class="form-select">
                    <option value="">All Vendors</option>
                    @foreach($vendors as $vendor)
                    <option value="{{ $vendor->id }}" @selected(request('vendor_id')==$vendor->id)>
                        {{ $vendor->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2">
                <input type="number" name="min_price" class="form-control"
                    placeholder="Min Price" value="{{ request('min_price') }}">
            </div>

            <div class="col-md-2">
                <input type="number" name="max_price" class="form-control"
                    placeholder="Max Price" value="{{ request('max_price') }}">
            </div>

            <div class="col-md-2">
                <select name="sort" class="form-select">
                    <option value="">Sort By</option>
                    <option value="relevance" @selected(request('sort')=='relevance' )>Relevance</option>
                    <option value="price_low" @selected(request('sort')=='price_low' )>Price: Low to High</option>
                    <option value="price_high" @selected(request('sort')=='price_high' )>Price: High to Low</option>
                </select>
            </div>

            <div class="col-md-2">
                <button class="btn btn-primary w-100">Filter</button>
            </div>
        </form>

        <!-- Products -->
        <div class="row">
            @forelse($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="mb-1">Vendor: <strong>{{ $product->vendor?->name }}</strong></p>
                        <p class="mb-1">Price: ₹{{ $product->price }}</p>
                        <p class="mb-2">Stock: {{ $product->stock }}</p>

                        <form method="POST" action="{{ route('cart.add', $product) }}">
                            @csrf
                            <button class="btn btn-success btn-sm">
                                Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <p>No products found</p>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $products->links() }}
        </div>

    </div>
</x-app-layout>
<script>
    document.getElementById('searchBox').addEventListener('keyup', function() {
        let query = this.value;

        if (query.length < 2) {
            document.getElementById('suggestions').style.display = 'none';
            return;
        }

        fetch(`/product-suggest?q=${query}`)
            .then(res => res.json())
            .then(data => {
                let suggestionBox = document.getElementById('suggestions');
                suggestionBox.innerHTML = '';

                if (data.length === 0) {
                    suggestionBox.style.display = 'none';
                    return;
                }

                data.forEach(item => {
                    let div = document.createElement('a');
                    div.classList.add('list-group-item', 'list-group-item-action');
                    div.textContent = item.name;

                    div.onclick = () => {
                        document.getElementById('searchBox').value = item.name;
                        suggestionBox.style.display = 'none';
                    };

                    suggestionBox.appendChild(div);
                });

                suggestionBox.style.display = 'block';
            });
    });
</script>