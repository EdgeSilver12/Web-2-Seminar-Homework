<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use App\Models\County;

class CountyController extends Controller
{
    // Display all counties
    public function index()
    {
        $counties = County::all();
        return view('county.index', compact('counties'));
    }

    // Display a specific county by ID
    public function show($id)
    {
        $county = County::findOrFail($id);
        return view('county.show', compact('county'));
    }

    // Store a new county
    public function store(Request $request)
    {
        $request->validate([
            'cname' => 'required|string|max:255',
        ]);

        County::create($request->all());
        return redirect()->route('counties.index');
    }

    // Update an existing county
    public function update(Request $request, $id)
    {
        $request->validate([
            'cname' => 'required|string|max:255',
        ]);

        $county = County::findOrFail($id);
        $county->update($request->all());
        return redirect()->route('counties.index');
    }

    // Delete a county
    public function destroy($id)
    {
        $county = County::findOrFail($id);
        $county->delete();
        return redirect()->route('counties.index');
    }
}