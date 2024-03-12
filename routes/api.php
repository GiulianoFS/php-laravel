<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/greeting', function () {
    return 'Hello World';
});

// Route to create a new UserEntity
Route::post('/users/create', [UserController::class, 'create'])->name('users.create');

// Route to update a UserEntity
Route::put('/users/update', [UserController::class, 'update'])->name('users.update');

// Route to delete a User by id
Route::delete('/users/delete/{id}', [UserController::class, 'delete'])->name('users.delete');

// Route to get all users
Route::get('/users/readAll', [UserController::class, 'readAll'])->name('users.readAll');

// Route to get users based on filters
Route::post('/users/readFiltered', [UserController::class, 'readFiltered'])->name('users.readFiltered');
