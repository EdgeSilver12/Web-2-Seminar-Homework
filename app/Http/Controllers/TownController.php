<?php
namespace App\Http\Controllers;

use App\Models\Town;
use Illuminate\Http\Request;

class TownController extends Controller
{
    // Display all towns
    public function index()
    {
        return response()->json(Town::all());
    }

    // Display a specific town by ID
    public function show($id)
    {
        return response()->json(Town::findOrFail($id));
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

        $town = Town::create($request->all());
        return response()->json($town, 201);  // Return newly created town with 201 status
    }

    // Update an existing town
    public function update(Request $request, $id)
    {
        $town = Town::findOrFail($id);
        $town->update($request->all());
        return response()->json($town);
    }

    // Delete a town
    public function destroy($id)
    {
        Town::findOrFail($id)->delete();
        return response()->json(null, 204);  // No content status
    }
}
