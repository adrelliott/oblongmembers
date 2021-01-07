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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// ****** Superadmin ******
Route::prefix('superadmin')->group(function () {
    Route::resources([
        'brands' => \App\Http\Controllers\BrandController::class,
    ]);
});

// ****** Admin ******
Route::prefix('admin')->group(function () {

    // Routes for nested resources


    // All other routes
    Route::resources([
        'users' => \App\Http\Controllers\UserController::class,
        'courses' => \App\Http\Controllers\Learning\CourseController::class,
        'lessons' => \App\Http\Controllers\Learning\LessonController::class,
        'resources' => \App\Http\Controllers\Interactive\ResourceController::class,
        'tasks' => \App\Http\Controllers\Interactive\TaskController::class,
        'products' => \App\Http\Controllers\Shop\ProductController::class,
    ]);
});
