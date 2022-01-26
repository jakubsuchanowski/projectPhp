<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventsController;

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
    return view('index');
});

Auth::routes();



Route::get('/lista', [EventsController::class, 'index'])->name('events.index'); 
Route::get('/lista/nowe', [EventsController::class, 'create'])->name('events.create');
Route::get('/lista/edytuj/{id}', [EventsController::class, 'edit'])->name('events.edit');
Route::post('/lista/zapisz', [EventsController::class, 'store'])->name('events.store');
Route::put('/lista/zmien/{id}', [EventsController::class, 'update'])->name('events.update');
Route::delete('/lista/usun/{id}', [EventsController::class, 'delete'])->name('events.delete');
