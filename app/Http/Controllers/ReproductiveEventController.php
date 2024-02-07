<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\ReproductiveEvent;
use Illuminate\Http\Request;

class ReproductiveEventController extends Controller
{
    public function index()
    {
        $reproductiveEvents = ReproductiveEvent::all();
        return view('reproductive_events.index', compact('reproductiveEvents'));
    }

    public function create()
    {
        $animals = Animal::all();
        return view('reproductive_events.create', compact('animals'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'animal_id' => 'required|exists:animals,id',
            'event_type' => 'required|string|max:255',
            'date' => 'required|date',
            'notes' => 'nullable|string|max:1000',
        ]);

        $reproductiveEvent = ReproductiveEvent::create($request->all());
        return redirect()->route('reproductive_events.show', $reproductiveEvent)->with('success', 'Reproductive Event created successfully.');
    }

    public function show(ReproductiveEvent $reproductiveEvent)
    {
        return view('reproductive_events.show', compact('reproductiveEvent'));
    }

    public function edit(ReproductiveEvent $reproductiveEvent)
    {
        $animals = Animal::all();
        return view('reproductive_events.edit', compact('reproductiveEvent', 'animals'));
    }

    public function update(Request $request, ReproductiveEvent $reproductiveEvent)
    {
        $request->validate([
            'animal_id' => 'required|exists:animals,id',
            'event_type' => 'required|string|max:255',
            'date' => 'required|date',
            'notes' => 'nullable|string|max:1000',
        ]);

        $reproductiveEvent->update($request->all());
        return redirect()->route('reproductive_events.show', $reproductiveEvent)->with('success', 'Reproductive Event updated successfully.');
    }

    public function destroy(ReproductiveEvent $reproductiveEvent)
    {
        $reproductiveEvent->delete();
        return redirect()->route('reproductive_events.index')->with('success', 'Reproductive Event deleted successfully.');
    }
}
