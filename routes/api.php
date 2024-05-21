<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CadastroController;

Route::get('/teste', function () {
    return response()->json(['message' => 'This is a test route']);
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:api')->group(function () {

    Route::get('/teste2', function () {
        return response()->json(['message' => 'This is a test route']);
    });

    Route::apiResource('cadastros', CadastroController::class);
    
});