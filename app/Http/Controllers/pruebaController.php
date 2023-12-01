<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth; // me sale esta importacion al ejecutar Auth::user()->name 

class pruebaController extends Controller
{
    public function __invoke(){
        //$usuarios  = Auth::user()->name;
        //{{ Auth::user()->name }} preguntar esta peticion
        $usuarios = User::all() ;
        return $usuarios ; 
    }
}
