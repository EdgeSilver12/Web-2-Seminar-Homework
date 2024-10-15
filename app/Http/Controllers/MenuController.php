<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuItem;

class MenuController extends Controller
{
    public function index()
{
    // Fetch all menu items from the database
    $menuItems = MenuItem::all();  // Make sure this model is imported

    // Pass the data to the view
    return view('menu.index', compact('menuItems'));
}
}
