<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    public function Index()
    {
        // Logic for fetching any data needed for the admin dashboard
        return view('admin.admin_login'); // Return the admin dashboard view
    }
    public function Dashboard()
    {
        return view('admin.index');
    }//end method
    public function Login(Request $request){
    //dd($request->all());
        $check = $request->all();
        if (Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
            return redirect()->route('admin.dashboard')->with('error', 'You are successfully logged in');
        }else{
            return back()->with('error', 'Invalid Email or Password');
        }
    }//end method
    public function AdminLogout(){
        Auth::guard('admin')->logout();
        return redirect()->route('login_from')->with('error', 'You are successfully logged out');
    }//end method
    public function AdminRegister(){
        return view('admin.admin_register');
    }//end method
    public function AdminRegisterCreate(Request $request){
//        dd($request->all());
        Admin::insert([
           'name' => $request->name,
           'email' => $request->email,
           'password' => Hash::make($request->password),
           'created_at' => Carbon::now(),
        ]);
        return redirect()->route('login_from')->with('error', 'Admin Created Successfully');

    }//end method
}
