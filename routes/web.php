<?php

use App\Http\Controllers\ColocationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->get('/dashboard', function () {
    // Ila kan role_id = 2 rah Admin

    if (auth()->user()->role_id == 2) {
        return view('adminDashboard'); // l-file d l-admin li qaddina
    }

    // Ila kan role_id = 1 (wala ay haja khra) rah User 3adi
    return view('dashboard');
})->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/colocations', [ColocationController::class, 'index'])->name('colocations.index');
Route::resource('colocations', ColocationController::class)->middleware('auth');


require __DIR__.'/auth.php';



