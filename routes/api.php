<?php

use App\Http\Controllers\LanguageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1', 'namespace'=> 'App\Http\controllers\Api\V1'], function(){
    Route::apiResource('customers', CustomerController::class);
    Route::apiResource('invoices', InvoiceController::class);
});

Route::namespace('API')->group(function () {
    Route::get('/get_languages', [LanguageController::class, 'getLanguages']);
});

Route::get('user', function(){
    return 'hello';
});
