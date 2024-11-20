<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\studentController;

Route::get('/students', [studentController::class, 'index']);


Route::get('/students/{id}', function () {
    return 'Students lists';
});

//Creando students
Route::post('/students', [studentController::class, 'store']);

//actualizando students
Route::put('/students/{id}', function () {
    return 'Students lists';
});

//borrando students
Route::delete('/students/{id}', function () {
    return 'Students lists';
});