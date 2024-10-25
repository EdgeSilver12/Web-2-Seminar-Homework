<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Logic for fetching any data needed for the user dashboard
        return view('user.dashboard'); // Return the user dashboard view
    }
}
