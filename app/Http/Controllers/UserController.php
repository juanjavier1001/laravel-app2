<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view("usuarios.index", compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("usuarios.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);


        User::create(
            $request->all()
        );

        return redirect()->route("usuarios.index");

        /*  return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
 */
        //return $request;
    }

    /**
     * Display the specified resource.
     */
    public function show(User $usuario)
    {
        return view("usuarios.show", compact("usuario"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $usuario)
    {
        $roles = Role::all();
        return view("usuarios.edit", compact("usuario", "roles"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $usuario)
    {

        //return $usuario->roles;

        $request->validate([
            'name' => "required|string|max:255",
            'email' => "required|string|email|max:255|unique:users,email,{$usuario->id}",
            'password' => "nullable|string|min:8|confirmed",
        ]);


        /* if (!$request->password) {
            $request->password = $usuario->password;
        } */

        $usuario->name = $request->name;
        $usuario->email = $request->email;

        if ($request->password) {
            $usuario->password = $request->password;
        }

        $usuario->save();

        $usuario->roles()->sync($request->roles);


        /* return $usuario;
        return $request;
        return $request->password;
        return $usuario->password; */

        /* $usuario->update(
            $request->all()
        ); */

        return redirect()->route("usuarios.index");

        //return  $request;
        //return $usuario;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $usuario)
    {
        $usuario->delete();

        return redirect()->route("usuarios.index");
    }
}
