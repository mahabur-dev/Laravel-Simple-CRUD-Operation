<?php

use App\Models\Project;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserController;

Route::get('/', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/all_projects', [ProjectController::class, 'all_projects'])->name('projects.all_projects');
Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
Route::post('/projects/storeForProject', [ProjectController::class, 'storeForProject'])->name('projects.storeForProject');
Route::get('projects/{id}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
Route::put('/projects/{id}/update', [ProjectController::class, 'update'])->name('projects.update');
Route::delete('/projects/{id}/delete', [ProjectController::class, 'destroy'])->name('projects.destroy');

Route::get('/projects/{id}/show', [ProjectController::class, 'show'])->name('project.show');

//authentication process

// Route::get('/userAuth/signup', [UserAuthController::class, 'signup'])->name('userAuth.signup');
// Route::post('/userAuth/store', [UserAuthController::class, 'store'])->name('userAuth.store');

// Route::get('/userAuth/login', [UserAuthController::class, 'login'])->name('userAuth.login');
// Route::post('/userAuth/authenticate', [UserAuthController::class, 'authenticate'])->name('userAuth.authenticate');


//user controller authenticate

Route::get('/userAuth/userSignup', [UserController::class, 'userSignup'])->name('userAuth.userSignup');
Route::post('/userAuth/store', [UserController::class, 'store'])->name('userAuth.store');

Route::get('/userAuth/login', [UserController::class, 'login'])->name('userAuth.login');
Route::post('/userAuth/userLogin', [UserController::class, 'userLogin'])->name('userAuth.userLogin');

Route::post('/Logout', [UserController::class, 'Logout'])->name('Logout');