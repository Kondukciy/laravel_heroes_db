<?php

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
    return redirect()->route('heroes.index');
});

Route::resource('heroes', 'Heroes\HeroesController');
Route::resource('heroes-image', 'Heroes\HeroesImagesController');
