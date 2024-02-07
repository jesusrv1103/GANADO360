<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\HealthRecord;


class HealthRecordController extends Controller
{
    public function index()
    {
        $healthRecords = HealthRecord::all();
        return view('health_records.index', compact('healthRecords'));
    }

    public function create()
    {
        $animals = Animal::all();
        return view('health_records.create', compact('animals'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'animal_id' => 'required|exists:animals,id',
            'treatment' => 'nullable|string|max:255',
            'vaccine' => 'nullable|string|max:255',
            'date' => 'required|date',
            'notes' => 'nullable|string|max:1000',
        ]);

        $healthRecord = HealthRecord::create($request->all());
        return redirect()->route('health_records.show', $healthRecord)->with('success', 'Health Record created successfully.');
    }

    public function show(HealthRecord $healthRecord)
    {
        return view('health_records.show', compact('healthRecord'));
    }

    public function edit(HealthRecord $healthRecord)
    {
        $animals = Animal::all();
        return view('health_records.edit', compact('healthRecord', 'animals'));
    }

    public function update(Request $request, HealthRecord $healthRecord)
    {
        $request->validate([
            'animal_id' => 'required|exists:animals,id',
            'treatment' => 'nullable|string|max:255',
            'vaccine' => 'nullable|string|max:255',
            'date' => 'required|date',
            'notes' => 'nullable|string|max:1000',
        ]);

        $healthRecord->update($request->all());
        return redirect()->route('health_records.show', $healthRecord)->with('success', 'Health Record updated successfully.');
    }

    public function destroy(HealthRecord $healthRecord)
    {
        $healthRecord->delete();
        return redirect()->route('health_records.index')->with('success', 'Health Record deleted successfully.');
    }
}
