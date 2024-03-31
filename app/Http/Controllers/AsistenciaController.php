<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use App\Models\Miembro;
use App\Models\Ministerio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;


/**
 * Class AsistenciaController
 * @package App\Http\Controllers
 */
class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //agregar order 
        //$asistencias = Asistencia::all()->orderBy("id", "desc");

        /* $asistencias = Asistencia::paginate() */
        $asistencias = Asistencia::all()->sortByDesc("id");
        return view('asistencia.index', compact('asistencias'));

        /* ->with('i', (request()->input('page', 1) - 1) * $asistencias->perPage()); */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $asistencia = new Asistencia();

        $miembros = Miembro::select(
            "id",
            DB::raw("CONCAT(nombre,' ',apellido) as nombreCompleto")
        )->pluck("nombreCompleto", "id");

        return view('asistencia.create', compact('asistencia', 'miembros'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //return $request;

        request()->validate(Asistencia::$rules);

        $asistencia = Asistencia::create($request->all());

        return redirect()->route('asistencias.index')
            ->with('success', 'Asistencia created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asistencia = Asistencia::find($id);


        return view('asistencia.show', compact('asistencia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $asistencia = Asistencia::find($id);

        $miembros = Miembro::select(
            "id",
            DB::raw("CONCAT(nombre,' ',apellido) as nombreCompleto")
        )->pluck("nombreCompleto", "id");

        return view('asistencia.edit', compact('asistencia', 'miembros'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Asistencia $asistencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asistencia $asistencia)
    {

        //return request();

        request()->validate(Asistencia::$rules);

        $asistencia->update($request->all());

        return redirect()->route('asistencias.index')
            ->with('success', 'Asistencia updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $asistencia = Asistencia::find($id)->delete();

        return redirect()->route('asistencias.index')
            ->with('success', 'Asistencia deleted successfully');
    }

    public function reporte()
    {
        return view("asistencia.asistenciaReporte");
    }

    public function reportePdf(Request $request)
    {
        //return $request;
        //return $request->fecha;

        //$asistencias = Asistencia::all()->where("id", 9);
        //return $asistencias;
        //$asistencias = Asistencia::all()->where("fecha", "2024-03-10");
        //return $asistencias;
        $asistencias = Asistencia::all()->where("fecha", "=", $request->fecha);
        $pdf = Pdf::loadView('asistencia.asistenciaPdf', compact("asistencias"));
        return $pdf->stream();

        /* $asistencias = Asistencia::all();
        return view("asistencia.asistenciaPdf", compact("asistencias")); */
    }

    public function reportePdfFechas(Request $request)
    {

        //return $request;

        $asistencias = Asistencia::all()->where("fecha", ">=", $request->fechaInicio)->where("fecha", "<=", $request->fechaFinal);
        $pdf = Pdf::loadView('asistencia.asistenciaPdfFechas', compact("asistencias"));
        return $pdf->stream();
    }
}
