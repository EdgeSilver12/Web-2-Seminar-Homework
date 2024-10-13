<?php
namespace App\Http\Controllers;

use App\Models\Population;
use Illuminate\Http\Request;

class PopulationController extends Controller
{
    // Display all populations
    public function index()
    {
        $populations = Population::all();
        return view('population.index', compact('populations'));
    }

    // Display a specific population by Town ID and Year
    public function show($townid, $ryear)
    {
        $population = Population::where('townid', $townid)
                                ->where('ryear', $ryear)
                                ->firstOrFail();
        return view('population.show', compact('population'));
    }

    // Store a new population entry
    public function store(Request $request)
    {
        $request->validate([
            'townid' => 'required|exists:towns,id',
            'ryear' => 'required|integer',
            'women' => 'required|integer',
            'total' => 'required|integer',
        ]);

        Population::create($request->all());
        return redirect()->route('populations.index');
    }

    // Update an existing population entry
    public function update(Request $request, $townid, $ryear)
    {
        $request->validate([
            'townid' => 'required|exists:towns,id',
            'ryear' => 'required|integer',
            'women' => 'required|integer',
            'total' => 'required|integer',
        ]);

        $population = Population::where('townid', $townid)
                                ->where('ryear', $ryear)
                                ->firstOrFail();
        $population->update($request->all());
        return redirect()->route('populations.index');
    }

    // Delete a population entry
    public function destroy($townid, $ryear)
    {
        $population = Population::where('townid', $townid)
                                ->where('ryear', $ryear)
                                ->firstOrFail();
        $population->delete();
        return redirect()->route('populations.index');
    }
}
