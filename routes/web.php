<?php

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

Route::get('/consent', function () {
    return view('consent'); // Replace 'next-page' with the actual name of the Blade view you want to show
})->name('consent');

Route::get('/login', function () {
    return view('login');
})->name('login');

