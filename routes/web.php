<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;

// All Listins
Route::get('/', [ListingController::class,'index']);

// Show Create Job form
Route::get('/listings/create', [ListingController::class, 'create'])->name('listings.create')->middleware('auth.check');

// View Single Listing
Route::get('/listings/{listing}',[ListingController::class,'show']);

// Store job form data
Route::post('/listings',[ListingController::class,'store'])->middleware('auth.check');

// Show Edit Form
Route::get('/listings/{listing}/edit',[ListingController::class,'edit'])->middleware('auth.check');

// Update Listing
Route::put('/listings/{listing}',[ListingController::class,'update'])->middleware('auth.check');

// Delete Listing
Route::delete('/listings/{listing}',[ListingController::class,'destroy'])->middleware('auth.check');

// Show register form
Route::get('/register',[Usercontroller::class,'create'])->middleware('guest');

// Register new user
Route::post('/users',[Usercontroller::class,'store']);

// Log user out
Route::post('/logout',[Usercontroller::class,'logout'])->middleware('auth.check');

// Show Login Form
Route::get('/login',[Usercontroller::class,'login'])->middleware('guest');

// Log In User
Route::post('/users/authenticate',[Usercontroller::class,'authenticate']);