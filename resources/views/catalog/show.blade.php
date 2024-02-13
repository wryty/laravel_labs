@extends('layouts.app')

@section('content')
    <h1>Product Details</h1>

    @if ($product)
        <div class="product-details">
            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" width="200" height="200">
            <h2>{{ $product->name }}</h2>
            <p>{{ $product->description }}</p>
            <p>Price: ${{ $product->price }}</p>
            <p>Quantity: {{ $product->quantity }}</p>
        </div>
    @else
        <p>Product not found.</p>
    @endif

    <a href="{{ url('/catalog') }}">Back to Catalog</a>
@endsection
