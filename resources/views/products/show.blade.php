@extends('layouts.template')

@section('title', 'Product Details')

@section('body')

<h2>Product Details</h2>

    <p>ID: {{ $product->id }}</p>
    <p>Product Name: {{ $product->product_name }}</p>
    <p>Retail Price: {{ number_format($product->retail_price, 0, ',', '.') }}</p>
    <p>Wholesale Price: {{ number_format($product->wholesale_price, 0, ',', '.') }}</p>
    <p>Quantity: {{ $product->quantity }}</p>
    <p>
        <img src="{{ asset('storage/' . $product->image) }}" alt="Gambar Product" class="img-thumbnail" width="200">
    </p>

@endsection
