<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use App\Models\Miembro;
use App\Models\Ministerio;
use App\Models\User;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function index()
    {
        $miembros = Miembro::all();
        $ministerios = Ministerio::all();
        $usuarios = User::all();
        $asistencias = Asistencia::all();
        return view("index", compact("miembros", "ministerios", "usuarios", "asistencias"));
    }
}
