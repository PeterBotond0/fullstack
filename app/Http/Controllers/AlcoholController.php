<?php

namespace App\Http\Controllers;

use App\Models\Alcohol;
use Illuminate\Http\Request;

class AlcoholController extends Controller
{
    public function index()
    {
        $alcohols = Alcohol::with('products')->get();

        return view('alcohols.index', compact('alcohols'));
    }
    public function create()
    {
        return view('alcohols.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $alcohol = Alcohol::create($validated);
        $alcohols = Alcohol::all();

        return redirect()
            ->route('alcohols.index')
            ->with('success', 'Kategória létrehozva!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Alcohol $alcohol)
    {
        return view('alcohols.edit', compact('alcohol'));
    }

    public function update(Request $request, Alcohol $alcohol)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $alcohol->update($validated);

        $alcohols = Alcohol::all();

        return redirect()
            ->route('alcohols.index')
            ->with('success', 'Kategória frissítve!');
    }

    public function destroy(Alcohol $alcohol)
    {
        $alcohol->delete();

        return redirect()
            ->route('alcohols.index')
            ->with('status', 'Kategória törölve!');
    }
}
