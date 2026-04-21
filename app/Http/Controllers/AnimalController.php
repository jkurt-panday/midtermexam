<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $animals = Animal::all();

        return view('animals.index', compact('animals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('animals.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'species' => ['required', 'string', 'max:50'],
            'age' => ['required', 'integer'],
            'habitat' => ['required', 'string', 'max:50'],
        ]);

        Animal::create($validated);

        return redirect()->route('animals.index')->with('success', 'New Animal Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Animal $animal)
    {
        return view('animals.show', compact('animal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Animal $animal)
    {
        return view('animals.edit', compact('animal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Animal $animal)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'species' => ['required', 'string', 'max:50', Rule::unique('animals')->ignore($animal->id)],
            'age' => ['required', 'integer'],
            'habitat' => ['required', 'string', 'max:50'],
        ]);

        $animal->update($validated);

        return redirect()->route('animals.index')->with('success', 'An Animal was Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Animal $animal)
    {
        $animal->delete();

        return redirect()->route('animals.index')->with('success', 'An Animal was Deleted');
    }
}
