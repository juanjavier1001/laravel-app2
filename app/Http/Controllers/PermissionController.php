<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePermission;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::all();

        return view("permissions.index",  compact("permissions"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("permissions.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePermission $request)
    {
        $permission = Permission::create($request->all());

        return redirect()->route("permissions.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {

        return view("permissions.show", compact("permission"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        return view("permissions.edit", compact("permission"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePermission $request, Permission $permission)
    {
        $permission->update($request->all());

        return redirect()->route("permissions.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        return redirect()->route("permissions.index");
    }
}
