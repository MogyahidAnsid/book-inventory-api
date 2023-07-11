<?php

use App\Http\Controllers\V1\BookController;
use Illuminate\Support\Facades\Route;


Route::as('books.')
    ->group(
        function () {
            Route::get('books', [BookController::class, 'index'])->name('index');

            Route::get('books/{book}', [BookController::class, 'show'])->name('show');

            Route::post('books', [BookController::class, 'store'])->name('store');

            Route::patch('books/{book}', [BookController::class, 'update'])->name('update');

            Route::delete('books/{book}', [BookController::class, 'destroy'])->name('destroy');
        }
    );
