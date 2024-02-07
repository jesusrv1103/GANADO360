<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\WeightRecord;

class WeightRecordController extends Controller
{
    public function index()
    {
        $weightRecords = WeightRecord::all();
        return view('weight_records.index', compact('weightRecords'));
    }

    public function create()
    {
        $animals = Animal::all();
        return view('weight_records.create', compact('animals'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'animal_id' => 'required|exists:animals,id',
            'weight' => 'required|numeric|min:0',
            'date' => 'required|date',
        ]);

        $weightRecord = WeightRecord::create($request->all());
        return redirect()->route('weight_records.show', $weightRecord)->with('success', 'Weight Record created successfully.');
    }

    public function show(WeightRecord $weightRecord)
    {
        return view('weight_records.show', compact('weightRecord'));
    }

    public function edit(WeightRecord $weightRecord)
    {
        $animals = Animal::all();
        return view('weight_records.edit', compact('weightRecord', 'animals'));
    }

    public function update(Request $request, WeightRecord $weightRecord)
    {
        $request->validate([
            'animal_id' => 'required|exists:animals,id',
            'weight' => 'required|numeric|min:0',
            'date' => 'required|date',
        ]);

        $weightRecord->update($request->all());
        return redirect()->route('weight_records.show', $weightRecord)->with('success', 'Weight Record updated successfully.');
    }

    public function destroy(WeightRecord $weightRecord)
    {
        $weightRecord->delete();
        return redirect()->route('weight_records.index')->with('success', 'Weight Record deleted successfully.');
    }
}
