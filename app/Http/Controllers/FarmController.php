<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Farm;
use App\Models\User;

class FarmController extends Controller
{
    public function index()
    {
        $farms = Farm::all();
        return view('farms.index', compact('farms'));
    }

    public function create()
    {
        $users = User::all();
        return view('farms.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        $farm = Farm::create($request->all());
        return redirect()->route('farms.show', $farm)->with('success', 'Farm created successfully.');
    }

    public function show(Farm $farm)
    {
        return view('farms.show', compact('farm'));
    }

    public function edit(Farm $farm)
    {
        $users = User::all();
        return view('farms.edit', compact('farm', 'users'));
    }

    public function update(Request $request, Farm $farm)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        $farm->update($request->all());
        return redirect()->route('farms.show', $farm)->with('success', 'Farm updated successfully.');
    }

    public function destroy(Farm $farm)
    {
        $farm->delete();
        return redirect()->route('farms.index')->with('success', 'Farm deleted successfully.');
    }
}
