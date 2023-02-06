<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuestWishlistController;
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
Route::get('/', [GuestController::class, 'index'])->name('home');
Route::get('/faq', [GuestController::class, 'faq'])->name('faq');
Route::post('/join-now', [GuestController::class, 'joinNow'])->name('join-now');

Auth::routes();

Route::group(
    [
        'middleware' => 'auth',
    ],
    function () {
        // profile
        Route::get('/{username}', [GuestWishlistController::class, 'index']);

        // wish part from profile
        Route::group([
            'prefix' => 'wish',
            'as' => 'wish.',
        ],
        function() {
            Route::post('/store', [GuestWishlistController::class, 'store'])->name('store');
            Route::post('/update', [GuestWishlistController::class, 'update'])->name('update');
            Route::post('/delete', [GuestWishlistController::class, 'destroy'])->name('destroy');

        });
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
                Route::get('/get/cover', [UserController::class, 'getCoverImage'])->name('getCoverImage');
                Route::get('/get/avatar', [UserController::class, 'getAvatar'])->name('getAvatar');
                Route::post('update/message', [UserController::class, 'updateMessage'])->name('update-message');
                // upload image
                Route::post('/upload/cover', [UserController::class, 'uploadCoverImage'])->name('upload-cover-image');
                // uploadAvatar
                Route::post('/upload/avatar', [UserController::class, 'uploadAvatar'])->name('upload-avatar-image');
                // edit profile
                Route::post('/update/profile', [UserController::class, 'updateProfile'])->name('update-profile');
            }
        );
        Route::group(
            [
                'prefix' => 'wishlist',
                'as' => 'wishlist.'
            ],
            function () {
                Route::get('/', [WishlistController::class, 'wishlist'])->name('home');
                Route::get('/index', [WishlistController::class, 'index'])->name('index');
                Route::get('/list', [WishlistController::class, 'list'])->name('list');
                Route::get('/create', [WishlistController::class, 'create'])->name('create');
                Route::post('store', [WishlistController::class, 'store'])->name('store');
                Route::get('/edit/{id}', [WishlistController::class, 'edit'])->name('edit');
                Route::post('/update', [WishlistController::class, 'update'])->name('update');
                Route::delete('/delete/{id}', [WishlistController::class, 'destroy'])->name('destroy');
                Route::get('/{id}', [WishlistController::class, 'show'])->name('show');
            }

        );

        Route::group(
            [
                'prefix' => 'categories',
                'as' => 'categories.'
            ],
            function () {
                Route::get('/', [CategoryController::class, 'categories'])->name('home');
                Route::get('/index', [CatgoryController::class, 'index'])->name('index');
                Route::get('/list', [CategoryController::class, 'list'])->name('list');
                Route::get('/create', [CategoryController::class, 'create'])->name('create');
                Route::post('store', [CategoryController::class, 'store'])->name('store');
                Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
                Route::post('/update', [CategoryController::class, 'update'])->name('update');
                Route::delete('/delete/{id}', [CategoryController::class, 'destroy'])->name('destroy');
                Route::get('/{id}', [CategoryController::class, 'show'])->name('show');
            }
        );
    }
);
