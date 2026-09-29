<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Alcohol;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('alcohol')->get();

        return view('products.index', compact('products'));
    }

    public function create()
    {
        $alcohols = Alcohol::all();

        return view('products.create', compact('alcohols'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'int', 'min:0'],
            'alcohol_id' => ['required', 'exists:alcohols,id'],
        ]);

        Product::create($validated);

        return redirect()
            ->route('products.index')
            ->with('status', 'Termék létrehozva!');
    }

    public function show(Product $product)
    {
        
    }

    public function edit(Product $product)
    {
        $alcohols = Alcohol::all();

    return view('products.edit', compact('product', 'alcohols'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'int', 'min:0'],
            'alcohol_id' => ['required', 'exists:alcohols,id'],
        ]);

        $product->update($validated);

        return redirect()
            ->route('products.index')
            ->with('status', 'Termék frissítve!');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('status', 'Termék törölve!');
    }
}