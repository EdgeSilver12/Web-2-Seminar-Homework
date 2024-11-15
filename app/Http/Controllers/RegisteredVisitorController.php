<?php

namespace App\Http\Controllers;


namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\RegisteredVisitor;
class RegisteredVisitorController extends Controller
{
    public function Index(){
        return view('registeredvisitor.registeredvisitor_login');
    }//end method
    public function RegisteredVisitorDashboard(){
        return view('registeredvisitor.index');
    }//end method

    public function RegisteredVisitorLogin(Request $request){
//        dd($request->all());
        $check = $request->all();
        if (Auth::guard('registeredvisitor')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
            return redirect()->route('registeredvisitor.dashboard')->with('error', 'Registered User is successfully logged in');
        }else{
            return back()->with('error', 'Invalid Email or Password');
        }
    }//end method
    public function RegisteredVisitorLogout(){
        Auth::guard('registeredvisitor')->logout();
        return redirect()->route('registeredvisitor_login_from')->with('error', 'You are successfully logged out');
    }//end method

    public function RegisteredVisitorRegister(){
        return view('registeredvisitor.registeredvisitor_register');
    }
    public function RegisteredVisitorRegisterCreate(Request $request){
//        dd($request->all());
        RegisteredVisitor::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('registeredvisitor_login_from')->with('error', 'Registered Visitor Created Successfully');

    }//end method
}
