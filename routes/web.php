<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TripController;
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
    return view('welcome');
});

// Gruppo di rotte protette da 'auth' middleware e con prefisso 'admin'
Route::middleware('auth')
    ->prefix('admin') // Prefisso nell'url delle rotte di questo gruppo
    ->name('admin.')  // Prefisso per i nomi delle rotte
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // Rotte per Viaggi
        Route::resource('trips', TripController::class);
    });

require __DIR__ . '/auth.php';
