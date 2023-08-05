<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

Route::get('/', function() {
    return 'đay là trang chủ';
});

Route::prefix('users')->name('users.')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/add', [UserController::class, 'addUser'])->name('add');
    Route::post('/add', [UserController::class, 'postAdd'])->name('post');
    Route::get('/edit/{id}', [UserController::class, 'getEdit'])->name('edit');
    Route::post('/update', [UserController::class, 'postEdit'])->name('postEdit');
    Route::get('/delete/{id}', [UserController::class, 'delete'])->name('delete');
});



