<?php

use App\Http\Controllers\InsertPreferredLanguage;

use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/get_languages', [LanguageController::class, 'getLanguages']);

Route::post('/preferred_language', [InsertPreferredLanguage::class, 'preferredLanguage']);

Route::get('user', function(){
    return 'hello';
});
