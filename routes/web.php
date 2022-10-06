<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CandidateController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [CandidateController::class, 'index'])->name('home');
Route::get('/home', [CandidateController::class, 'index'])->name('home');
Route::get('/candidates',  [CandidateController::class, 'candidate'])->name('candidates');
Route::get('/vote', [CandidateController::class, 'vote'])->name('vote');

Auth::routes([
    'register' => false,
    'verify' => true
    ]);

Route::get('/email/{id}', [HomeController::class, 'email'])->name('input.email');

Route::post('vote/{id}',  [CandidateController::class, 'update'])->name('vote');
Route::post('/email/{id}/update',  [HomeController::class, 'update'])->name('email');