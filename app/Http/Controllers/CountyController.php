<?php

namespace App\Http\Controllers;

use App\Models\County;
use Illuminate\Http\Request;

class CountyController extends Controller
{
    // List all counties
    public function index()
    {
        return response()->json(County::all());
    }

    // Show a specific county
    public function show($id)
    {
        return response()->json(County::findOrFail($id));
    }

    // Store a new county
    public function store(Request $request)
    {
        $validated = $request->validate([
            'cname' => 'required|string|max:255|unique:counties',
        ]);

        $county = County::create($validated);
        return response()->json($county, 201);
    }

    // Update a county
    public function update(Request $request, $id)
    {
        $county = County::findOrFail($id);
        $county->update($request->all());
        return response()->json($county);
    }

    // Delete a county
    public function destroy($id)
    {
        County::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
