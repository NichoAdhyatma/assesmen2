<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


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
    return view('consent');
})->name('consent');


// Route::get('/signin', 'AuthController@show')->name('signUp');

Route::post('/signup', [AuthController::class, 'postSignUp'])->name('postSignUp');
Route::post('/signin', [AuthController::class, 'postSignIn'])->name('postSignIn');

Route::get('/signup', function () {
    return view('consent');
});
Route::get('/signin', function () {
    return view('consent');
});

Route::get('/test', function () {
    return view('beforetest');
})->name('test');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/testlogin', function () {
    return view('testlogin');
})->name('testlogin');

Route::get('/testinterview', function () {
    return view('testinterview');
})->name('testinterview');

Route::get('/testcognitive', function () {
    return view('testcognitive');
})->name('testcognitive');

Route::get('/testvalidation', function () {
    return view('testvalidation');
})->name('testvalidation');
