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





Route::get('/', [BookController::class, 'index'])->name('filter');



Route::get('books/show/{book}',[BookController::class,'show'])->name('book.show');

// Reviews Route

Route::get('reviews/create/{book}',[ReviewController::class,'create'])->name('review.create');

Route::post('/books/{book}/reviews',[ReviewController::class,'store'])->name('review.store');