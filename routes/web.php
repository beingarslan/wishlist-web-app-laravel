<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\DashboardController;
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

// front-end routes
Route::get('/', [GuestController::class, 'index']);
Route::get('/faq', [GuestController::class, 'faq'])->name('faq');
Route::get('/profile', [GuestController::class, 'profile'])->name('profile');


Auth::routes();

Route::group(
    [
        'middleware' => 'auth',
    ],
    function () {
        // dashboard
        Route::get('/home', [DashboardController::class, 'index'])->name('dashboard');
        // user crud
        Route::group(
            [
                'prefix' => 'user',
                'as' => 'user.'
            ],
            function () {
                Route::get('/', [UserController::class, 'user'])->name('home');
                Route::get('/index', [UserController::class, 'index'])->name('index');
                Route::get('/list', [UserController::class, 'list'])->name('list');
                Route::get('/create', [UserController::class, 'create'])->name('create');
                Route::post('/store', [UserController::class, 'store'])->name('store');
                Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
                Route::post('/update', [UserController::class, 'update'])->name('update');
                Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('destroy');
                Route::get('/{id}', [UserController::class, 'show'])->name('show');
            }
        );        
    }
);
