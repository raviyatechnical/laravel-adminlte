<?php

use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['prefix' => 'admin','name' => 'admin','middleware' => ['auth']], function() {
    // Route::resource('roles','UserManagement\RoleController');
    Route::resource('users', UserController::class);
    Route::get('profile',[ProfileController::class, 'index'])->name('profile.index');
    Route::get('profile/edit',[ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('profile/edit',[ProfileController::class, 'update'])->name('profile.update');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
