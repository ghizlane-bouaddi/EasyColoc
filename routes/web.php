<?php

use App\Http\Controllers\ColocationController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\verificationInvitationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->get('/dashboard', function () {


    if (auth()->user()->role_id == 2) {
        return view('adminDashboard'); 
    }


    return view('dashboard');
})->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/colocations', [ColocationController::class, 'index'])->name('colocations.index');
Route::resource('colocations', ColocationController::class)->middleware('auth');






Route::post('/colocations/{colocation}/invite', [InvitationController::class, 'sendInvitation'])->name('colocations.send-invite');

Route::get('/invitations/accept/{token}', [InvitationController::class, 'acceptInvitation']) ->name('invitations.accept');

require __DIR__.'/auth.php';



