<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\laravel_example\UserManagement;


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

$controller_path = 'App\Http\Controllers';

// front-end routes
Route::get('/', [GuestController::class, 'index']);
Route::get('/faq', [GuestController::class, 'faq'])->name('faq');
Route::get('/profile', [GuestController::class, 'profile'])->name('profile');