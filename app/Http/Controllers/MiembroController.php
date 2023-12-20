<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMiembro;
use App\Models\Miembro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MiembroController extends Controller
{

    //controller para mostrar todos los miembros 

    public function index()
    {

        $miembros = Miembro::all()->sortByDesc("id");
        /* $miembros = Miembro::select("nombre" , "apellido")->take(100)->get(); */
        /* return $miembros ;  */
        return view("miembros.index", compact("miembros"));
    }


    // controller para mostrar la vista para crear un Miembro 

    public function create()
    {
        return view("miembros.create");
    }

    // controller para mostrar un Miembro 
    
    public function show($id)
    {

        $miembro = Miembro::find($id);

        return view("miembros.show", compact("miembro"));
    }

    // controller para editar un Miembro 
    
    public function edit($id)
    {

        $miembro = Miembro::find($id) ; 
        return view("miembros.edit" , compact("miembro")) ;

    }
   
   
   
    //Controllers para procesar datos

    //controller para insertar dato 

    public function store(StoreMiembro $request)
    {
        
        $fileName = time() . "." . $request->foto->extension();
        
        $request->foto->storeAs("public/imagesMiembro", $fileName);
        
        $miembro = new Miembro();
        
        $miembro->nombre = $request->nombre;
        $miembro->apellido = $request->apellido;
        $miembro->email = $request->email;
        $miembro->telefono = $request->telefono;
        $miembro->fecha_nacimiento = $request->fecha_nacimiento;
        $miembro->foto = $fileName;
        //$miembro->foto = $request->file('foto')->store('foto_miembros','public');    
        $miembro->genero = $request->genero;
        $miembro->direccion = $request->direccion;
        $miembro->ministerio = $request->ministerio;
        $miembro->estado = "1";
        $miembro->fecha_ingreso = now();
        
        
        $miembro->save();

        return redirect()->route("miembros")->with("miembroAgregado", "Miembro guardado con exito");
    }
    


    public function update (Request $request , $id) {

        $miembro =  Miembro::find($id) ;
        
        $miembro->nombre = $request->nombre;
        $miembro->apellido = $request->apellido;
        $miembro->email = $request->email;
        $miembro->telefono = $request->telefono;
        $miembro->fecha_nacimiento = $request->fecha_nacimiento;
        if($request->foto) {
            Storage::delete("public/imagesMiembro/".$miembro->foto);
            $fileName = time() . "." . $request->foto->extension();
            $request->foto->storeAs("public/imagesMiembro", $fileName);
            $miembro->foto = $fileName;
        }
        //$miembro->foto = $request->file('foto')->store('foto_miembros','public');    
        $miembro->genero = $request->genero;
        $miembro->direccion = $request->direccion;
        $miembro->ministerio = $request->ministerio;
        $miembro->estado = "1";
        $miembro->fecha_ingreso = now();    
        
        $miembro->save() ;

        return redirect()->route("miembros")->with("miembroActualizado" , "Miembro actualizado con exito") ;


        
    }
    

}
