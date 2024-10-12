<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class productcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$products = Produk::all();
        $products = product::paginate(10);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|unique:products|max:12',
            'product_name' => 'required|unique:products|max:255',
            'description' => 'nullable',
            'retail_price' => 'required|numeric',
            'wholesale_price' => 'required|numeric',
            'origin' => 'required|max:2',
            'quantity' => 'required|numeric',
            'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //simpan image store
        product::create($validatedData);
        if ($request->hasFile('product_image')) {
            $this->store($request, $request->file('product_image'));
        }
        return redirect()->route('products.index')->with('success', 'Data Product Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = product::findOrFail($id);

        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = product::findOrFail($id);

        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'product_name' => 'required|max:255',
            'description' => 'nullable',
            'retail_price' => 'required|numeric',
            'wholesale_price' => 'required|numeric',
            'origin' => 'required|max:2',
            'quantity' => 'required|numeric',
            'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //simpan image update
        if ($request->hasFile('product_image')) {
            if ($request->product_image) {
                Storage::delete($request->product_image);
            }
            $this->store($request, $request->file('product_image'));
        }

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = product::findOrFail($id);
        if ($product->product_image) {
            Storage::delete($product->product_image);
        }
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }
}
