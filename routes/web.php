<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

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

// topページ
Route::get('/', [TodoController::class, 'index'])->name('index');
// add todo
Route::post('/', [TodoController::class, 'store'])->name('store');
// update todo
Route::post('/update/{id}', [TodoController::class, 'update'])->name('update');
// delete todo
Route::post('/delete/{id}', [TodoController::class, 'delete'])->name('delete');
