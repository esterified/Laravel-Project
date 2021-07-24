<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\khojController;
use Esterified\Greeter\Greet;
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
    return view('auth/login');
});
Route::get('/greeting', function () {
    return 'Hello World';
});
//middleware for checking authentication for users
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
//route for form action
Route::middleware(['auth:sanctum', 'verified'])->post('/dashboard', [khojController::class, 'search'])->name('khoj');
//route for custom esterified package
Route::get('/greet/{name}', function ($name) {
    $greet = new Greet();

    return $greet->greet($name);
});