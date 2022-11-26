<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DashboardController;

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

Route::controller(DashboardController::class)->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/penjelasan', [DashboardController::class, 'penjelasan'])->name("penjelasan");
});

Route::resource('inventaris',InventarisController::class);
Route::resource('jabatan',JabatanController::class);
Route::resource('user',UserController::class);
Route::controller(UserController::class)->group(function () {
    Route::resource('task',TaskController::class);
    Route::post('/add_task', [TaskController::class, 'add_task'])->name("add_task");
    Route::put('/update_task/{id}', [TaskController::class, 'updateTask'])->name("update_task");
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
