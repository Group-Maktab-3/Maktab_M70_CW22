<?php

use App\Jobs\AddFilm;
use App\Mail\WelcomeUser;
use Illuminate\Support\Facades\Http;
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

Route::get('/{id?}', function ($id=1) {

    $film=  Http::get("http://moviesapi.ir/api/v1/movies?page=".$id)->json();
    return $film;
});

Route::get('/S/{name}/{id?}', function ($name, $id=1) {

    $film=  Http::get("http://moviesapi.ir/api/v1/movies?q={$name}&page={$id}")->json();
    return $film;
})->whereAlpha("nama");

Route::get('/add/F', function () {

    AddFilm::dispatch();

})->whereAlpha("nama");


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
