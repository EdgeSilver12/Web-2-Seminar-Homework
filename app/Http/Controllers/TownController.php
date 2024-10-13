<?php
namespace App\Http\Controllers;

use App\Models\Town;
use Illuminate\Http\Request;

class TownController extends Controller
{
    // Display all towns
    public function index()
    {
        $towns = Town::all();
        return view('town.index', compact('towns'));
    }

    // Display a specific town by ID
    public function show($id)
    {
        $town = Town::findOrFail($id);
        return view('town.show', compact('town'));
    }

    // Store a new town
    public function store(Request $request)
    {
        $request->validate([
            'tname' => 'required|string|max:255',
            'countyid' => 'required|exists:counties,id',
            'countyseat' => 'required|boolean',
            'countylevel' => 'required|boolean',
        ]);

        Town::create($request->all());
        return redirect()->route('towns.index');
    }

    // Update an existing town
    public function update(Request $request, $id)
    {
        $request->validate([
            'tname' => 'required|string|max:255',
            'countyid' => 'required|exists:counties,id',
            'countyseat' => 'required|boolean',
            'countylevel' => 'required|boolean',
        ]);

        $town = Town::findOrFail($id);
        $town->update($request->all());
        return redirect()->route('towns.index');
    }

    // Delete a town
    public function destroy($id)
    {
        $town = Town::findOrFail($id);
        $town->delete();
        return redirect()->route('towns.index');
    }
}