<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlowerController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/account', [UserController::class, 'index']);


// get all flowers
Route::get('/flowers', [FlowerController::class, 'index']);

// get a specific flower
Route::get('/flower/{id}', [FlowerController::class, 'show']);

// Add a flower :
Route::get('/create/flowers', [FlowerController::class, 'create']);
Route::post('/create/flowers', [FlowerController::class, 'store']);

// Update a flower :
Route::get('/update/flowers/{id}', [FlowerController::class, 'edit']);
Route::put('/update/flowers/{id}', [FlowerController::class, 'update']);

// Delete
Route::delete('/delete/flowers/{id}',  [FlowerController::class, 'destroy']);

/**** API ****/
Route::get('/api/magic', [ApiController::class, 'getApi']);
// All flowers :
Route::get('/api/flowers', [ApiController::class, 'getFlowers']);
// One specific flower : 
Route::get('/api/flower/{id}', [ApiController::class, 'getFlower']);

// All flowers from a type : 
// CANT DO THIS :
//Route::get('/api/flower/{type}', [ApiController::class, 'getType']);
// Have to do this :
Route::get('/api/flower/type/{type}', [ApiController::class, 'getType']);

// Specific amount of results :
Route::get('/api/flower/number/{x}', [ApiController::class, 'getXflowers']);


/*** Comments ****/
Route::post('/flower/{id}', [CommentController::class, 'store']);
