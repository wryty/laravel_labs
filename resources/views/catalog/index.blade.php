@extends('layouts.app')

@section('content')
    <h1>Catalog</h1>

    @include('catalog.search-form')

    <div class="catalog">
        @foreach ($products as $product)
            @include('catalog.product-card', ['product' => $product])
        @endforeach
    </div>
@endsection
