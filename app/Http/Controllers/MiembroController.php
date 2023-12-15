<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMiembro;
use App\Models\Miembro;
use Illuminate\Http\Request;

class MiembroController extends Controller
{
    public function index(){
        
        $miembros = Miembro::all();
        /* $miembros = Miembro::select("nombre" , "apellido")->take(100)->get(); */
        /* return $miembros ;  */
        return view("miembros.index" , compact("miembros")) ; 
    }


    public function create() {
        return view("miembros.create") ;
    }

    //Controllers para procesar datos
    
    //controller para insertar dato 
    
    public function store (StoreMiembro $request) {
        
         $fileName = time().".".$request->foto->extension();
         
         $request->foto->storeAs("public/imagesMiembro" , $fileName);
         
         $miembro = new Miembro() ; 
         
        $miembro->nombre = $request->nombre ;   
        $miembro->apellido = $request->apellido ;   
        $miembro->email = $request->email ;   
        $miembro->telefono = $request->telefono ;   
        $miembro->fecha_nacimiento = $request->fecha_nacimiento;
        $miembro->foto = $fileName;
        //$miembro->foto = $request->file('foto')->store('foto_miembros','public');    
        $miembro->genero = $request->genero;   
        $miembro->direccion = $request->direccion;   
        $miembro->ministerio = $request->ministerio; 
        $miembro->estado = "1" ; 
        $miembro->fecha_ingreso = now(); 
        
        
        $miembro->save();

        return $miembro ;


    }
}
