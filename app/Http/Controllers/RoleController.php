<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoles;
use FontLib\Table\Type\name;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        //return $roles;
        return view("roles.index", compact("roles"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        return view("roles.create", compact("permissions"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoles $request)
    {
        //return ($request->except("name") + ['name' => "aaaaa"]);

        /* $rol = Role::create([
            "name" => $request->name
        ]); */

        //return $request;

        //return $request->permissions;
        //return $request->all();

        $rol = Role::create(
            $request->all()
        );


        $rol->permissions()->sync($request->permissions);

        return redirect()->route("roles.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {

        return view("roles.show", compact("role"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {

        //la instacncia Role hace esto por dentro 
        //$role = Role::findById($id);
        //return $role;

        //return $role->permissions; //este $role(el que le paso por parametro osea hago click en el boton editar , tiene estos permisos) 
        //como lo de arriba me devuelve cada objeto de permissions ({id , name , guard_name , etc})
        //yo solo quiero el id de permissions , entonces le hago un pluck , que me permite elegir solo 1 dato del objeto devuelto indicandole el nombre de la columna que quiero 
        //el metodo pluck me devuelve una coleccion , yo necesito un array , entonces al valor devuelto por pluck lo transformo en array 
        //->toArray()
        //(in_array(queCosa ,donde)) in_array es un metodo de php q busca si existe lo que le diga en un determinado array y devuelve true o false
        //@dd(in_array(5, $permissions));

        //$permissions =  $role->permissions->pluck("id")->toArray();

        //@dd(in_array(5, $permissions));




        $permissions = Permission::all();
        return view("roles.edit", compact("role", "permissions"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        //return $request;
        //return $role->permissions;
        //esto me devuelve todos los permisos relacionados con determinado rol 
        //return $role;


        $request->validate([
            "name" => ["required", "unique:roles,name," . $role->id],
            "permissions" => "nullable|array",
        ]);

        $role->update($request->all());

        $role->permissions()->sync($request->permissions);

        return redirect()->route("roles.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        //return $role;

        $role->delete();

        return redirect()->route("roles.index");
    }
}
