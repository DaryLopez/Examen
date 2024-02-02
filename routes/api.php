<?php

use App\Http\Controllers\ClientCredentials\AuthController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\RolesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('/user')->group(function () {
    Route::post('/register', [AuthController::class,'register']);
    Route::post('/login', [AuthController::class,'login']);
});

Route::middleware('auth:api')->group(function () {
    //ruta para obtener info de usuarios
    Route::get("/user", [AuthController::class,'index']);
    //CRUD de la tabla people
    Route::resource('/person', PersonController::class);
    //logica de roles para usuarios
    Route::get('/role', [RolesController::class,'index']);
    Route::post('/role/update', [RolesController::class,'assingRole']);
});



