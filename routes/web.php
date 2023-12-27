<?php

use App\Http\Controllers\MiembroController;
use App\Http\Controllers\MinisterioController;
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
//restrinjo ruta register


Auth::routes(["register" => true]);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//RUTA Principal 

Route::get('/', [PanelController::class , "index"] )->middleware("auth");

//END RUTA Principal 

//RUTAS MIEMBROS 

//Get Miembros
Route::get('/miembros', [MiembroController::class, "index"])->name("miembros")->middleware("auth");

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
Route::get('/ministerios/status/{id}', [MinisterioController::class , "updateStatus"])->name("ministerios.updateStatus");

//END RUTAS MIEMBROS 


//RUTAS MINISTERIOS 

Route::resource("ministerios" , MinisterioController::class) ; 

//END RUTAS MINISTERIOS 










//Pruebas 

Route::get('/pruebagit', pruebaController::class)->name("pruebagit");

Route::get('/prueba', function () {
    return view("prueba");
});
