<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/home', function (){
    return Inertia::render('Home');
})->name('home');

Route::resource('products', ProductController::class)->only(['index', 'show']);

Route::get('/categories/{category_id}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/suggestion', [SearchController::class, 'suggestion'])->name('suggestion');

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::resource('carts', CartController::class)
        ->only(['index', 'store', 'destroy', 'update']);
});
