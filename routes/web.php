<?php

use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\MiembroController;
use App\Http\Controllers\MinisterioController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\pruebaController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsuariojcController;
use App\Http\Controllers\UsuariosJcController;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rules\Can;

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


Auth::routes(["register" => true]);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware("auth");;


//RUTA Principal 

Route::get('/', [PanelController::class, "index"])->middleware("auth");

//END RUTA Principal 

//RUTAS MIEMBROS 

//Get Miembros
Route::get('/miembros', [MiembroController::class, "index"])->name("miembros")->middleware("auth");

//Create Miembro
Route::get('/miembros/create', [MiembroController::class, "create"])->name("miembros.create")->middleware("auth")->middleware("can:Gestionar Miembros");

//Get Miembro
Route::get('/miembros/show/{id}', [MiembroController::class, "show"])->name("miembros.show")->middleware("auth");;

// Edit Miembro 
Route::get('/miembros/edit/{id}', [MiembroController::class, "edit"])->name("miembros.edit")->middleware("auth")->middleware("can:Gestionar Miembros");


//Route procesa informacion 

Route::post('/miembros/create', [MiembroController::class, "store"])->name("miembros.store")->middleware("auth");;

Route::put('/miembros/update/{id}', [MiembroController::class, "update"])->name("miembros.update")->middleware("auth");;

Route::delete('/miembros/delete/{id}', [MiembroController::class, "destroy"])->name("miembros.destroy")->middleware("auth");;


//Route boton activo | inactivo 
Route::get('/miembros/status/{id}', [MiembroController::class, "updateStatus"])->name("miembros.updateStatus")->middleware("auth");;
Route::get('/ministerios/status/{id}', [MinisterioController::class, "updateStatus"])->name("ministerios.updateStatus")->middleware("auth");;

//END RUTAS MIEMBROS 


//RUTAS MINISTERIOS 

Route::resource("ministerios", MinisterioController::class)->middleware("auth");;

//END RUTAS MINISTERIOS 


//RUTAS USUARIOS 

Route::resource("usuarios", UserController::class)->middleware("auth");;

//END RUTAS USUARIOS 


//RUTAS ASISTENCIA 

//vista reporte
Route::get("asistencias/reporte", [AsistenciaController::class, "reporte"])->name("asistencias.reporte")->middleware("auth");;
//una sola fecha
Route::post("asistencias/reportePdf", [AsistenciaController::class, "reportePdf"])->name("asistencias.pdf")->middleware("auth");;
//entre fechas
Route::post("asistencias/reportePdf/fechas", [AsistenciaController::class, "reportePdfFechas"])->name("asistenciasFechas.pdf")->middleware("auth");;
//rutas crud
Route::resource("asistencias", AsistenciaController::class)->middleware("auth");;

//END RUTAS ASISTENCIA

//RUTAS Roles 

Route::resource('roles', RoleController::class)->middleware("auth");;

//END RUTAS Roles 

//RUTAS Permissions 

Route::resource('permissions', PermissionController::class)->middleware("auth");;

//END RUTAS Permissions 
