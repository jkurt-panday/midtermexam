<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::get();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'product' => ['required', 'string', 'max:50'],
            'description' => ['required', 'string', 'max:50'],
            'unit' => ['required', 'integer', 'min:1'],
            'price' => ['required', 'numeric']
        ]);

        Products::create($validated);

        return redirect()->route('products.index')->with('success', 'Product created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Products $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Products $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Products $product)
    {
        $validated = $request->validate([
            'product' => ['required', 'string', 'max:50'],
            'description' => ['required', 'string', 'max:50'],
            'unit' => ['required', 'integer', 'min:1'],
            'price' => ['required', 'numeric']
        ]);

        dd($product);
        $product->update($validated);
        dd($product);

        return redirect()->route('products.index')->with('success', 'Product ' . $product->id . ' updated');        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Products $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted.');
    }
}
