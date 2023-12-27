<?php

namespace App\Http\Controllers;

use App\Models\Miembro;
use App\Models\Ministerio;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function index() {
        $miembros =Miembro::all(); 
        $ministerios =Ministerio::all(); 
        return view("index" , compact("miembros" , "ministerios")) ;  
    }
}
