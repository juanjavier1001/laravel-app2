<?php

namespace App\Http\Controllers;

use App\Models\Miembro;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function index() {
        $miembros =Miembro::all(); 
        return view("index" , compact("miembros")) ;  
    }
}
