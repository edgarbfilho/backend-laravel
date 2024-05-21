<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BootstrapReactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CadastroController;

Route::get('/teste', function () {
    return response()->json(['message' => 'This is a test route']);
});

Route::apiResource('bootstraps', BootstrapReactController::class);

// Em routes/api.php
Route::post('/login', [AuthController::class, 'login']); // Usando sintaxe de classe diretamente
Route::post('/register', [AuthController::class, 'register']); // Usando sintaxe de classe diretamente

Route::middleware('auth:api')->group(function () {

    Route::get('/teste2', function () {
        return response()->json(['message' => 'This is a test route']);
    });

    Route::apiResource('cadastros', CadastroController::class);
    
});


// Route::post('/oauth/token', '\Laravel\Passport\Http\Controllers\AccessTokenController@issueToken');
// Route::post('/oauth/token/revoke', '\Laravel\Passport\Http\Controllers\TransientTokenController@revoke');
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });



