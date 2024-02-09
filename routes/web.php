<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/





Route::get('/', [BookController::class, 'index'])->name('latest');

Route::get('/last/popular/month', [BookController::class, 'filterMonth'])->name('month');

Route::get('/popular/six/months', [BookController::class, 'filterPopularSixMonths'])->name('popular-six-months');

Route::get('/rated/month', [BookController::class, 'filterRatedMonth'])->name('rated-month');

Route::get('/rated/six/months', [BookController::class, 'filterRatedSixMonths'])->name('rated-six-month');

Route::get('books/show/{book}',[BookController::class,'show'])->name('book.show');

// Reviews Route

Route::get('reviews/create/{book}',[ReviewController::class,'create'])->name('review.create');

Route::post('/books/{book}/reviews',[ReviewController::class,'store'])->name('review.store');