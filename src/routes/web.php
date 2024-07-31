<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;


Route::resource('/pets', PetController::class, [
    'except' => 'show'
]);

Route::get('/', function () {
    return view('home');
});

