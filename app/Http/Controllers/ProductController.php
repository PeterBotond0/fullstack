<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Alcohol;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $validated = $request->validate([
            'search' => ['nullable', 'string', 'max:255'],
            'alcohol_id' => ['nullable', 'integer', 'exists:alcohols,id'],
            'category' => ['nullable', 'in:beer,wine,spirits,cocktails'],
        ]);
        $search = trim($validated['search'] ?? '');
        $alcoholId = $validated['alcohol_id'] ?? null;
        $category = $validated['category'] ?? null;
        $groups = [
            'beer' => ['Sör', 'Sörök'],
            'wine' => ['Bor', 'Borok'],
            'spirits' => ['Rövidital', 'Röviditalok', 'Pálinka', 'Gin', 'Vodka', 'Whiskey', 'Whisky', 'Rum'],
            'cocktails' => ['Koktél', 'Koktélok', 'Koktélalapanyagok'],
        ];
        $groupLabels = ['beer' => 'Sörök', 'wine' => 'Borok', 'spirits' => 'Röviditalok', 'cocktails' => 'Koktélok'];
        $alcohols = Alcohol::all();
        $products = Product::with('alcohol')
            ->when($search !== '', fn ($query) => $query->where('name', 'like', '%' . $search . '%'))
            ->when($alcoholId, fn ($query) => $query->where('alcohol_id', $alcoholId))
            ->when(!$alcoholId && $category, fn ($query) => $query->whereHas('alcohol',
                fn ($parent) => $parent->whereIn('name', $groups[$category])))
            ->get();

        return view('products.index', compact('products', 'alcohols', 'search', 'alcoholId', 'category', 'groupLabels'));
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