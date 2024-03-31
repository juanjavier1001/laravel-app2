<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMiembro;
use App\Models\Miembro;
use App\Models\Ministerio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MiembroController extends Controller
{

    //controller para mostrar todos los miembros 

    public function index()
    {

        /*  $miembros = Miembro::select(
            "id",
            DB::raw("CONCAT(nombre,' ',apellido) as nombreCompleto")
        )->pluck("nombreCompleto", "id");


        @dd($miembros);
        return $miembros;


        $miembros = Miembro::pluck("nombre", "id");
        @dd($miembros);
        return $miembros; */

        $miembros = Miembro::all()->sortByDesc("id");
        /* $miembros = Miembro::select("nombre" , "apellido")->take(100)->get(); */
        /* return $miembros ;  */
        return view("miembros.index", compact("miembros"));
    }


    // controller para mostrar la vista para crear un Miembro 

    public function create()
    {
        $ministerios = Ministerio::all();
        return view("miembros.create", compact("ministerios"));
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

        $miembro = Miembro::find($id);
        return view("miembros.edit", compact("miembro"));
    }



    //Controllers para procesar datos

    //controller para insertar dato 

    public function store(StoreMiembro $request)
    {

        if ($request->foto) {
            $fileName = time() . "." . $request->foto->extension();
            $request->foto->storeAs("public/imagesMiembro", $fileName);
        }

        //$miembro = Miembro::create($request->except("foto") + ['foto' => $fileName]);
        //fijarse si esta bien esta asignacion para reemplazar todo el otro codigo


        $miembro = new Miembro();

        $miembro->nombre = $request->nombre;
        $miembro->apellido = $request->apellido;
        $miembro->email = $request->email;
        $miembro->telefono = $request->telefono;
        $miembro->fecha_nacimiento = $request->fecha_nacimiento;
        if ($request->foto) {
            $miembro->foto = $fileName;
        }
        //$miembro->foto = $request->file('foto')->store('foto_miembros','public');    
        $miembro->genero = $request->genero;
        $miembro->direccion = $request->direccion;
        $miembro->ministerio = $request->ministerio;
        $miembro->estado = "1";
        $miembro->fecha_ingreso = now();


        $miembro->save();

        return redirect()->route("miembros")->with("miembroAgregado", "Miembro guardado con exito");
    }


    //controller para actualizar dato 

    public function update(Request $request, $id)
    {
        $miembro =  Miembro::find($id);

        $request->validate([
            "nombre" => "required",
            "apellido" => "required",
            "email" => ["required", "unique:miembros,email," . $miembro->id],
            "telefono" => "required",
            "fecha_nacimiento" => "required",
            "genero" => "required",
            "direccion" => "required",
            "ministerio" => "nullable",
        ]);



        $miembro->nombre = $request->nombre;
        $miembro->apellido = $request->apellido;
        $miembro->email = $request->email;
        $miembro->telefono = $request->telefono;
        $miembro->fecha_nacimiento = $request->fecha_nacimiento;
        if ($request->foto) {
            Storage::delete("public/imagesMiembro/" . $miembro->foto);
            $fileName = time() . "." . $request->foto->extension();
            $request->foto->storeAs("public/imagesMiembro", $fileName);
            $miembro->foto = $fileName;
        }
        //$miembro->foto = $request->file('foto')->store('foto_miembros','public');    
        $miembro->genero = $request->genero;
        $miembro->direccion = $request->direccion;
        $miembro->ministerio = $request->ministerio;
        $miembro->estado = 1;
        $miembro->fecha_ingreso = now();

        $miembro->save();

        return redirect()->route("miembros")->with("miembroActualizado", "Miembro actualizado con exito");
    }

    //controller para eliminar dato 

    public function destroy($id)
    {


        //Miembro::destroy($id)

        $miembro = Miembro::find($id);
        $miembro->delete();
        //solucion jc : si tiene foto que se borre
        if ($miembro->foto) {
            Storage::delete("public/imagesMiembro/" . $miembro->foto);
        }


        return redirect()->route("miembros")->with("miembroEliminado", "se elimino correctamente");
    }



    //Controller para modificar el status 

    public function updateStatus($id)
    {

        $miembro = Miembro::find($id);

        if ($miembro) {
            if ($miembro->estado) {
                $miembro->estado = 0;
            } else {
                $miembro->estado = 1;
            }
            $miembro->save();
        }

        return back();
    }
}
