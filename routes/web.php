<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\places\CountyController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('county', CountyController::class)->middleware(['role:super-admin']);
Route::resource('municipality', MunicipalityController::class);
Route::resource('city', CityController::class);

require __DIR__.'/auth.php';
