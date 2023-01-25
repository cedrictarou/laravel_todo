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
Route::get('/', function () {
	return view('auth.register');
});

Route::prefix('todos')
	->middleware(['auth'])
	->controller(TodoController::class)
	->name('todos.')
	->group(function () {
		Route::get('/', 'index')->name('index');
		Route::post('/', 'store')->name('store');
		Route::post('/update/{id}', 'update')->name('update');
		Route::post('/delete/{id}', 'delete')->name('delete');
	});

Route::get('/dashboard', function () {
	return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
