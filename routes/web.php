<?php

use App\Http\Controllers\MiembroController;
use App\Http\Controllers\pruebaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
})->middleware("auth");


//restrinjo ruta register

Auth::routes(["register"=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/miembros',)->name("pruebagit");





//Pruebas 

Route::get('/pruebagit',pruebaController::class)->name("pruebagit");

Route::get('/prueba', function () {
    return view("prueba") ; 
});

Route::get('/miembros',[MiembroController::class , "index" ])->name("miembros");

Route::get('/miembros/create', function () {
    return view("miembros.create") ; 
})->name("miembros.create");


