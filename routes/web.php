<?php

use Illuminate\Support\Facades\Route;

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

//TODO avoid passing to controller, instantiate viewmodel here directly and generate pdf
Route::get('/document/{car_id}', \App\Http\Controllers\Document\Pdf\PdfController::class);
