<?php

use App\Http\Controllers\HopitalController;
use App\Http\Controllers\LitController;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('lit', [LitController::class, 'index'])->name('list_lit');
Route::view('lit/create','livewire.form_lit')->name('create_lit');
Route::get('edit_lit/{id}', [LitController::class, 'edit'])->name('edit.lit');
Route::any('update_lit/{id}', [LitController::class, 'update'])->name('update.lit');
Route::post('lit/store', [LitController::class, 'store'])->name('store.lit');

Route::get('hopital', [HopitalController::class, 'index'])->name('lit_hopital');
Route::get('get/users', [HopitalController::class, 'indexUser'])->name('users');
Route::get('create/user', [HopitalController::class, 'createUser'])->name('user.create');
Route::post('user/store', [HopitalController::class, 'storeUser'])->name('user.store');

Route::view('hopital/create','livewire.form_hopital')->name('create_hopital');
Route::post('hopital/store', [HopitalController::class, 'store'])->name('store.hopital');

Route::get('lit', [LitController::class, 'index'])->name('list_lit');


