<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\AuthController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);


Route::get('/get_languages', [LanguageController::class, 'getLanguages']);

Route::post('/preferred_language', [InsertPreferredLanguage::class, 'preferredLanguage']);

<<<<<<< HEAD
Route::post('/preferred_language', [LanguageController::class, 'setLanguage']);
=======

    Route::post('/preferred_language', [LanguageController::class, 'insertPreferredLanguage']);
>>>>>>> 52f8116d82521d42f8496624677cf3d48be88cee
