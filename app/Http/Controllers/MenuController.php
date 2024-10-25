<?php

namespace App\Http\Controllers;


use App\Models\MenuItem;

class MenuController extends Controller
{
    public function index()
    {
        $menuItems = MenuItem::whereNull('parent_id')->with('children')->get();
        return view('menu.index', compact('menuItems'));
    }
}
