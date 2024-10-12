@extends('layouts.template')
@section('title', 'Dashboard')

@section('body')
<div class="container mt-4">
    <h1 class="mb-4">Dashboard Product</h1>

    @php
        $totalQuantity = \App\Models\product::sum('quantity');
        $totalRetailPrice = \App\Models\product::sum('retail_price');
        $topProduct = \App\Models\product::orderBy('quantity', 'desc')->first();
    @endphp

<div class="row mb-4">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm" style="border-radius: 15px;">
            <div class="card-header text-white" style="background-color: #7ed6df; border-radius: 15px 15px 0 0;">Total Product</div>
            <div class="card-body" style="background-color: #f1f2f6;">
                <h5 class="card-title">{{ $totalQuantity }}</h5>
                <p class="card-text">Jumlah total produk yang disimpan.</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm" style="border-radius: 15px;">
            <div class="card-header text-white" style="background-color: #ff6b6b; border-radius: 15px 15px 0 0;">Total Retail Price</div>
            <div class="card-body" style="background-color: #f1f2f6;">
                <h5 class="card-title">Rp {{ number_format($totalRetailPrice, 2) }}</h5>
                <p class="card-text">Total nilai produk (retail price).</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm" style="border-radius: 15px;">
            <div class="card-header text-white" style="background-color: #f6e58d; border-radius: 15px 15px 0 0;">Produk Teratas</div>
            <div class="card-body" style="background-color: #f1f2f6;">
                @if($topProduct)
                    <h5 class="card-title">{{ $topProduct->product_name }}</h5>
                    <p class="card-text">Quantity: {{ $topProduct->quantity }}</p>
                @else
                    <p class="card-text">Belum ada produk.</p>
                @endif
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .card-header {
        font-size: 1.2rem;
        font-weight: 600;
        text-align: center;
    }

    .card-body {
        text-align: center;
    }

    .card-title {
        font-size: 2rem;
        color: #2c3e50;
    }

    .card-text {
        font-size: 1rem;
        color: #636e72;
    }
</style>




    <div class="mb-4">
        <a href="{{ route('products.index') }}" class="btn btn-primary">Lihat Data Product</a>
    </div>
</div>
@endsection
