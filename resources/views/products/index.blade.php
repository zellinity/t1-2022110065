@extends('layouts.template')

@section('title', 'Daftar Product')

@section('body')
    <div class="container mt-5">
        <h2 class="mb-4">Daftar Product</h2>

        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Tambah Product</a>

        <div class="row">
            @forelse($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <img src="{{ asset('storage/' . $product->product_image) }}" class="card-img-top" alt="Gambar Product" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->product_name }}</h5>
                            <p class="card-text">
                                <strong>Harga Eceran:</strong> {{ number_format($product->retail_price, 0, ',', '.') }}<br>
                                <strong>Harga Grosir:</strong> {{ number_format($product->wholesale_price, 0, ',', '.') }}<br>
                                <strong>Asal:</strong> {{ $product->origin }}<br>
                                <strong>Kuantitas:</strong> {{ $product->quantity }}
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                {{-- Tombol Detail --}}
                                <a href="{{ route('products.show', $product->id) }}" class="btn text-white" style="background-color: teal; border-radius: 20px; padding: 8px 15px;">
                                    Detail
                                </a>

                                {{-- Tombol Edit --}}
                                <a href="{{ route('products.edit', $product->id) }}" class="btn text-white" style="background-color: orange; border-radius: 20px; padding: 8px 15px;">
                                    Edit
                                </a>

                                {{-- Tombol Hapus --}}
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn text-white" style="background-color: darkred; border-radius: 20px; padding: 8px 15px;" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <div class="alert alert-warning" role="alert">
                        Tidak ada data product yang tersedia.
                    </div>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $products->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
