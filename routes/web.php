<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoorAccessController;
use App\Http\Controllers\GetCardNumberController;
use App\Http\Controllers\MonitoringAccessNfcController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard.index');
});

Route::middleware(['manager.or.admin:Admin,Manager'])->group(function(){
    // Monitoring Akses
    Route::get('/monitoring/access/nfc', [MonitoringAccessNfcController::class, 'index'])->name('monitoring/access/nfc.index');
});

Route::middleware('admin')->group(function () {        
    //CRUD user
    Route::get('/user/index', [UserController::class, 'index'])->name('user.index')->middleware('admin');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    // show Card Number on registration 
    Route::get('/show/card/number', [GetCardNumberController::class, 'show'])->name('show/card.number');
});

// create card number on temporary card number table
Route::get('/get/card/number/{card_id}', [GetCardNumberController::class, 'index'])->name('get/card.number');

// Door Access 
Route::post('/check/card/number', [DoorAccessController::class, 'index'])->name('check/card.number');

require __DIR__.'/auth.php';