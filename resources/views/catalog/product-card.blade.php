<div class="product-card {{ $product->quantity == 0 ? 'out-of-stock' : '' }}">
    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" width="100" height="100">
    <h2>{{ $product->name }}</h2>
    <p>{{ $product->description }}</p>
    <p>Price: ${{ $product->price }}</p>
    <p>Quantity: {{ $product->quantity }}</p>
    <a href="{{ route('show-product', ['product' => json_encode($product)]) }}">Details</a>
    <form action="{{route('show-product')}}">
        <input type="hidden" value="{{ $product->name }}" name="name">
        <input type="submit" value="Add to Cart">
    </form>
</div>
