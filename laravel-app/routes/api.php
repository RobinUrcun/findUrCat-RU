<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DisplayCat;
use App\Http\Controllers\ManageCat;
use App\Http\Requests\CreateAccompteFilter;
use App\Models\User;
use Illuminate\Support\Facades\Route;


Route::controller(AuthController::class)->group(function () {
    Route::post('/signup', 'signup');
    Route::post('/login', 'login');
});


Route::controller(ManageCat::class)->group(function () {
    Route::post('/addCat', 'addCat');
});

Route::controller(DisplayCat::class)->group(function () {
    Route::get('/getAllCats', "getAllCats");
});
