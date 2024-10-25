<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function Index()
    {
        // Logic for fetching any data needed for the admin dashboard
        return view(); // Return the admin dashboard view
    }
    public function Dashboard(){
        return view('admin.index');//end method
    }
}
