<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontHomeController;
use App\Http\Controllers\Back\BackHomeController;

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

// FRONT DESIGN
Route::prefix('front')->name('front.')->group(function () {
    Route::get('/', FrontHomeController::class)->name('index');
});
require __DIR__ . '/auth.php';


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::prefix('back')->name('back.')->group(function () {
    Route::get('/', BackHomeController::class)->middleware('admin')->name('index');
    Route::view('/login', 'back.auth.login');
    Route::view('/register', 'back.auth.register');
    Route::view('/forget-password', 'back.auth.forget-password');
});

Route::get('/', function () {
    return view('welcome');
});
