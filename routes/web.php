<?php

use App\Http\Controllers\MNBController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SoapController;
use App\Models\MenuItem;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisteredVisitorController;


//*************************Start Admin Route*************************
Route::prefix('admin')->group(function () {
    Route::get('/login',[AdminController::class,'Index'])->name('login_from');

    Route::post('/login/owner',[AdminController::class,'Login'])->name('admin.login');

    Route::get('/dashboard',[AdminController::class,'Dashboard'])->name('admin.dashboard')->middleware('admin');
    Route::get('/logout',[AdminController::class,'AdminLogout'])->name('admin.logout')->middleware('admin');
    Route::get('/register',[AdminController::class,'AdminRegister'])->name('admin.register');
    Route::post('/register/create',[AdminController::class,'AdminRegisterCreate'])->name('admin.register.create');
});

//*************************End Admin Route*************************


//*************************Start registeredvisitor Route*************************
Route::prefix('registeredvisitor')->group(function () {
    Route::get('/login',[RegisteredVisitorController::class,'Index'])->name('registeredvisitor_login_from');
    Route::get('/dashboard',[RegisteredVisitorController::class,'RegisteredVisitorDashboard'])->name('registeredvisitor.dashboard');

    Route::post('/login/owner',[RegisteredVisitorController::class,'RegisteredVisitorLogin'])->name('registeredvisitor.login');
//
//
    Route::get('/logout',[RegisteredVisitorController::class,'RegisteredVisitorLogout'])->name('registeredvisitor.logout')->middleware('registeredvisitor');
    Route::get('/register',[RegisteredVisitorController::class,'RegisteredVisitorRegister'])->name('registeredvisitor.register');
    Route::post('/register/create',[RegisteredVisitorController::class,'RegisteredVisitorRegisterCreate'])->name('registeredvisitor.register.create');
});

//*************************End registeredvisitor Route*************************


//************************* SOAP Route*************************

//Route::post('/soap', [SoapController::class, 'handleSoapRequest']);

Route::get('/soap/counties', [SoapController::class, 'getCounties']);
Route::get('/soap/towns', [SoapController::class, 'getTowns']);
Route::get('/soap/populations', [SoapController::class, 'getPopulations']);
Route::get('/soap-view', function () {
    return view('soap');
});


//*************************End SOAP Route*************************
//************************* MNB Route*************************


Route::get('/exchange-rate', [MNBController::class, 'showDailyExchangeRate'])->name('exchange-rate');// the default one where we will see the list of the currencies and exchange rate called from the required Web Site
Route::post('/exchange-rate-by-date', [MNBController::class, 'getExchangeRateByDate'])->name('exchange.rate.by.date');

Route::post('/monthly-exchange-rate', [MNBController::class, 'showMonthlyExchangeRate'])->name('monthly.exchange.rate');







//************************* END MNB Route*************************


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $menuItems = MenuItem::whereNull('parent_id')->with('children')->get();
    return view('dashboard', compact('menuItems'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
