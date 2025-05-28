<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DisplayCat;
use App\Http\Controllers\ManageCat;
use Illuminate\Support\Facades\Route;


Route::controller(AuthController::class)->group(function () {
    Route::post('/signup', 'signup');
    Route::post('/login', 'login');
    Route::get('/logout', 'logout')->middleware('auth:sanctum');
});


Route::controller(ManageCat::class)->group(function () {
    Route::post('/addCat', 'addCat');
});

Route::controller(DisplayCat::class)->group(function () {
    Route::get('/getAllCats/{departement}', "getAllCatsByDepartement");

    Route::get('/getAllCats', "getAllCats");

    Route::get('/getCatsWithFilter', "getCatsWithFilter");
});
