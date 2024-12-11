<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Contacts\ContactsController;
use App\Http\Controllers\Contacts\ContactsDetailsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WelcomeController;
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

Route::get('/',[WelcomeController::class, 'index']);

Route::get('/dashboard',[DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::resource('/contacts', ContactsController::class)->only(['create', 'store', 'edit', 'update','destroy']);
    Route::resource('/contacts/details/{id}', ContactsDetailsController::class)->only(['index']);

});

require __DIR__.'/auth.php';
