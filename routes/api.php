<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




    Route::get('/get_languages', [LanguageController::class, 'getLanguages']);


    Route::post('/preferred_language', [LanguageController::class, 'setLanguage']);
