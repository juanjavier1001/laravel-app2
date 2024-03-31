@extends('layouts.admin')

@section('content')
    <div class="col-12 col-lg-9">
        <div class="card card-widget widget-user shadow">
            <div class="widget-user-header bg-danger">
                <h1>{{ $miembro->nombre }} {{ $miembro->apellido }}</h1>
            </div>
            @if (!$miembro->foto)
            @else
                <div class="widget-user-image">
                    <img class="img-circle elevation-2 " src="{{ asset('storage/imagesMiembro/' . $miembro->foto) }}"
                        alt="User Avatar" class="img-circle img-fluid">
                </div>
            @endif
            <div class="card-footer">
                <div class="row">
                    <div class="col-sm-3 border-right">
                        <div class="description-block">
                            <h5 class="description-header">Email</h5>
                            <span class="description-text">{{ $miembro->email }}</span>
                        </div>
                    </div>
                    <div class="col-sm-3 border-right">
                        <div class="description-block">
                            <h5 class="description-header">Direccion</h5>
                            <span class="description-text">{{ $miembro->direccion }}</span>
                        </div>
                    </div>
                    <div class="col-sm-3 border-right">
                        <div class="description-block ">
                            <h5 class="description-header">Telefono</h5>
                            <span class="description-text">{{ $miembro->telefono }}</span>
                        </div>
                    </div>
                    <div class="col-sm-3 border-right">
                        <div class="description-block">
                            <h5 class="description-header">Fecha de nacimiento</h5>
                            <span class="description-text">{{ $miembro->fecha_nacimiento }}</span>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-4 border-right">
                        <div class="description-block">
                            <h5 class="description-header">Genero</h5>
                            <span class="description-text">{{ $miembro->genero }}</span>
                        </div>
                    </div>
                    <div class="col-sm-4 border-right">
                        <div class="description-block">
                            <h5 class="description-header">Ministerio</h5>
                            <span class="description-text">{{ $miembro->ministerio }}</span>
                        </div>
                    </div>
                    <div class="col-sm-4 border-right">
                        <div class="description-block">
                            <h5 class="description-header">Fecha de Ingreso</h5>
                            <span class="description-text">{{ $miembro->fecha_ingreso }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
