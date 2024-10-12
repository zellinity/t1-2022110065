@extends('layouts.template')

@section('title', 'Create New Product')

@section('body')

<h2>Create New Product</h2>

<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label>ID:</label>
        <input type="text" name="id" required class="form-control @error('id') is-invalid @enderror">
        @error('id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label>Nama Product:</label>
        <input type="text" name="product_name" required class="form-control @error('product_name') is-invalid @enderror">
        @error('product_name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label>Harga Eceran:</label>
        <input type="number" name="retail_price" required class="form-control @error('retail_price') is-invalid @enderror">
        @error('retail_price')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label>Harga Grosir:</label>
        <input type="number" name="wholesale_price" required class="form-control @error('wholesale_price') is-invalid @enderror">
        @error('wholesale_price')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label>Asal Negara:</label>
        <input type="text" name="origin" required class="form-control @error('origin') is-invalid @enderror">
        @error('origin')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label>Quantity:</label>
        <input type="number" name="quantity" required class="form-control @error('quantity') is-invalid @enderror">
        @error('quantity')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-6 mt-2 mb-2">
        <label class="form-label" for="photo">Photo</label>
        <input class="form-control @error('photo') is-invalid @enderror" type="file" name="photo" id="photo">
        @error('photo')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection
