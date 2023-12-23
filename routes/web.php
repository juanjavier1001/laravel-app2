<?php

use App\Http\Controllers\MiembroController;
use App\Http\Controllers\PanelController;
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

/* Route::get('/', function () {
    return view('index');
})->middleware("auth"); */

Route::get('/', [PanelController::class , "index"] );



//restrinjo ruta register

Auth::routes(["register" => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Get Miembros
Route::get('/miembros', [MiembroController::class, "index"])->name("miembros");

//Create Miembro
Route::get('/miembros/create', [MiembroController::class, "create"])->name("miembros.create");

//Get Miembro
Route::get('/miembros/show/{id}', [MiembroController::class, "show"])->name("miembros.show");

// Edit Miembro 
Route::get('/miembros/edit/{id}', [MiembroController::class, "edit"])->name("miembros.edit");





//Route procesa informacion 

Route::post('/miembros/create', [MiembroController::class, "store"])->name("miembros.store");

Route::put('/miembros/update/{id}', [MiembroController::class, "update"])->name("miembros.update");

Route::delete('/miembros/delete/{id}', [MiembroController::class, "destroy"])->name("miembros.destroy");


//Route boton activo | inactivo 
Route::get('/miembros/status/{id}', [MiembroController::class, "updateStatus"])->name("miembros.updateStatus");





//Prueba Route Resource 

/* Route::resource() */



//Pruebas 

Route::get('/pruebagit', pruebaController::class)->name("pruebagit");

Route::get('/prueba', function () {
    return view("prueba");
});
