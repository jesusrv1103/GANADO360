<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\Farm;

class AnimalController extends Controller
{
    public function index()
    {
        $animals = Animal::all();
        return view('animals.index', compact('animals'));
    }

    public function create()
    {
        $farms = Farm::all();
        return view('animals.create', compact('farms'));
    }


    public function store(Request $request)
{
    $request->validate([
        'farm_id' => 'required|exists:farms,id',
        'tag_number' => 'required|unique:animals,tag_number',
        'species' => 'required|string|max:255',
        'breed' => 'required|string|max:255',
        'birth_date' => 'required|date',
        'gender' => 'required|string|max:10',
    ]);

    $animal = Animal::create($request->all());
    return redirect()->route('animals.show', $animal)->with('success', 'Animal created successfully.');
}



    public function show(Animal $animal)
    {
        return view('animals.show', compact('animal'));
    }

    public function edit(Animal $animal)
    {
        $farms = Farm::all();
        return view('animals.edit', compact('animal', 'farms'));
    }


    public function update(Request $request, Animal $animal)
    {
        $request->validate([
            'farm_id' => 'required|exists:farms,id',
            'tag_number' => 'required|unique:animals,tag_number,' . $animal->id,
            'species' => 'required|string|max:255',
            'breed' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'gender' => 'required|string|max:10',
        ]);

        $animal->update($request->all());
        return redirect()->route('animals.show', $animal)->with('success', 'Animal updated successfully.');
    }


    public function destroy(Animal $animal)
    {
        $animal->delete();
        return redirect()->route('animals.index');
    }
}
