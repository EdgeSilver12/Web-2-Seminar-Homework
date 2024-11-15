<?php
namespace App\Http\Controllers;

use App\Models\Population;
use Illuminate\Http\Request;

class PopulationController extends Controller
{
    // List all populations
    public function index()
    {
        return response()->json(Population::all());
    }

    // Show a specific population
    public function show($id)
    {
        return response()->json(Population::findOrFail($id));
    }

    // Store a new population
    public function store(Request $request)
    {
        $validated = $request->validate([
            'population_count' => 'required|integer',
            'town_id' => 'required|exists:towns,id',
        ]);

        $population = Population::create($validated);
        return response()->json($population, 201);
    }

    // Update a population
    public function update(Request $request, $id)
    {
        $population = Population::findOrFail($id);
        $population->update($request->all());
        return response()->json($population);
    }

    // Delete a population
    public function destroy($id)
    {
        Population::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
