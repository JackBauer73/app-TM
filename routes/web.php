<?php

use App\Http\Controllers\TournamentController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Models\User;
use App\Models\Dossard;



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
})->name('home');

// Route::get('/club', [HomeController::class, "redirect"])->name('club');

// Routes pour les clubs
// Route::get('club', function () {
//     return view('clubs.index');
// })->name('club');

// ->missing(function () {
//     return redirect()->route('home');
// });

// Routes pour les joueurs

// Route::get('club/tournament/{name}', [TournamentController::class, 'index'])->name('tournament_index');
Route::get('club/tournament/{name}', [TournamentController::class, 'show'])->name('tournament_show');


Route::get('club', [ClubController::class, 'index'])->name('club');
Route::get('club/tournaments/create', [TournamentController::class, 'create'])->name('tournament.create');
Route::post('club/tournaments/create', [TournamentController::class, 'store'])->name('tournament.store');
Route::get('player', [PlayerController::class, 'index'])->name('player');


// Route::prefix('club')->name('clubs.')->group(function () {
//     Route::get('', [ClubController::class, 'index'])->name('index');
//     Route::get('tournaments/create', [TournamentController::class, 'create'])->name('tournament.create');
//     Route::post('tournaments/create', [TournamentController::class, 'store'])->name('tournament.store');
// });

Route::post('club/tournament/{name}', [PlayerController::class, 'store'])->name('createPlayer');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__ . '/auth.php';
