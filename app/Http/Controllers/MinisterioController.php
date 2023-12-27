<?php

namespace App\Http\Controllers;

use App\Models\Miembro;
use App\Models\Ministerio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MinisterioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ministerios = Ministerio::all()->sortByDesc("id"); 
        
        return view("ministerios.index" , compact("ministerios"));
        
        //return $ministerios ; 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("ministerios.create") ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $ministerio = new Ministerio() ; 
        
        $ministerio->nombre = $request->nombre ;
        $ministerio->descripcion = $request->descripcion ;
        $ministerio->estado = 1 ;
        $ministerio->fecha_ingreso = now() ;
        if($request->foto){     
            $fileName = time() . "." . $request->foto->extension();
            $request->foto->storeAs("public/imagesMinisterio", $fileName);
            $ministerio->foto = $fileName ;
        }
        
        //return $request ;
        
        //return $ministerio ;

        $ministerio->save();

        return redirect()->route("ministerios.index") ; 
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $ministerio = Ministerio::find($id) ; 

        return view("ministerios.show" , compact("ministerio")) ; 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $ministerio = Ministerio::find($id) ; 

        return view("ministerios.edit" , compact("ministerio")) ;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $ministerio =  Ministerio::find($id) ; 
        
        $ministerio->nombre = $request->nombre ; 
        $ministerio->descripcion = $request->descripcion ; 
        if($request->foto){
            Storage::delete("public/imagesMinisterio/".$ministerio->foto);
            $fileName = time() . "." . $request->foto->extension();
            $request->foto->storeAs("public/imagesMinisterio", $fileName);
            $ministerio->foto = $fileName ; 
        }

        //return $ministerio ; 

          $ministerio->save() ;  

        return redirect()->route("ministerios.index") ;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ministerio = Ministerio::find($id);
        $ministerio->delete() ;
        if($ministerio->foto){
            Storage::delete("public/imagesMinisterio/".$ministerio->foto);
        } 
        return redirect()->route("ministerios.index");
    }
    
    public function updateStatus($id)
    {
        
        return "actualizando estado".$id ;
    }
    



}
