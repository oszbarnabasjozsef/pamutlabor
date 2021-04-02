<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectsController;

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
// Index
Route::get('/', [ProjectsController::class, 'index']);
Route::get('/projects', [ProjectsController::class, 'index']);

// Create new project
Route::get('/create', [ProjectsController::class, 'create']);
Route::post('store', [ProjectsController::class, 'store']);

//Show the project details
Route::get('/show/{pid}', [ProjectsController::class, 'show']);

// Update an exists project
Route::get('/edit/{pid}', [ProjectsController::class, 'edit']);
Route::post('update', [ProjectsController::class, 'update']);

//Delete a project
Route::get('/delete/{pid}', [ProjectsController::class, 'delete']);
