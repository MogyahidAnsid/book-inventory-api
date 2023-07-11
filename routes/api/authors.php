<?php

use App\Http\Controllers\V1\AuthorController;
use Illuminate\Support\Facades\Route;

Route::as('author.')
    ->group(
        function () {
            Route::get('/authors', [AuthorController::class, 'index'])->name('index');

            Route::get('/authors/{author}', [AuthorController::class, 'show'])->name('show');

            Route::post('/authors', [AuthorController::class, 'store'])->name('store');

            Route::put('/authors/{author}', [AuthorController::class, 'update'])->name('update');

            Route::delete('/authors/{author}', [AuthorController::class, 'destroy'])->name('destroy');
        }
    );
