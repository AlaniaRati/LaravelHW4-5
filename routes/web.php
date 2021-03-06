<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BandsController;
use App\Http\Controllers\SongsController;

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
    return redirect(route('bands.index'));
});

Route::resource('songs', SongsController::class);
Route::resource('bands', BandsController::class);