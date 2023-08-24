<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\traincontroller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/app', function () {
    return view('app');
});


Route::post('/submit-name',[traincontroller::class,'formSubmit']);
Route::post('/sell-car',[traincontroller::class,'sell']);


Route::get('/sell-items', [traincontroller::class,'sellItems']);
Route::get('/sold-items', [traincontroller::class,'soldItems']);
Route::get('/get-names', [traincontroller::class,'getNames']);
Route::post('/delete-name', [traincontroller::class,'deletefunc']);