<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [
    HomeController::class, 'index'
])->name('home');

Route::prefix('admin')->middleware(['auth'])->group(function(){
	Route::resource('categories', App\Http\Controllers\CategoryController::class);
	Route::post('categories/chage-active',[ App\Http\Controllers\CategoryController::class, 'chageActive' ])->name('categories.change-active');
	Route::resource('flower-arrangements', App\Http\Controllers\FlowerArrangementsController::class);
	Route::post('flower-arrangements/chage-active',[ App\Http\Controllers\FlowerArrangementsController::class, 'chageActive' ])->name('flower-arrangements.change-active');
	Route::post('flower-arrangements/delete-file',[ App\Http\Controllers\FlowerArrangementsController::class, 'deleteFile' ])->name('flower-arrangements.delete-file');
});

