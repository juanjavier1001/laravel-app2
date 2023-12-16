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

Auth::routes(["register" => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Get Miembros
Route::get('/miembros', [MiembroController::class, "index"])->name("miembros");
//Get Miembro
Route::get('/miembros/show/{id}', [MiembroController::class, "show"])->name("miembros.show");

//Create Miembro
Route::get('/miembros/create', [MiembroController::class, "create"])->name("miembros.create");



//Route procesa informacion 

Route::post('/miembros/create', [MiembroController::class, "store"])->name("miembros.store");






//Pruebas 

Route::get('/pruebagit', pruebaController::class)->name("pruebagit");

Route::get('/prueba', function () {
    return view("prueba");
});
