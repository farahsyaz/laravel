<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;
use App\Http\Controllers\ListingController;

// All Listins
Route::get('/', [ListingController::class,'index']);

// Single Listing
Route::get('/listings/{listing}',[ListingController::class,'show']);
