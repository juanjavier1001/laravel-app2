@extends('layouts.admin')

@section('content')
    <div class="col-12 col-lg-9">
        <div class="card card-widget widget-user shadow">
            <div class="widget-user-header bg-danger">
                <h1>{{ $ministerio->nombre }}</h1>
            </div>
            @if (!$ministerio->foto)
                {{-- no m,uestro nada --}}
            @else
                <div class="widget-user-image ">
                    <img class="img-circle elevation-2 " src="{{ asset('storage/imagesMinisterio/' . $ministerio->foto) }}"
                        alt="User Avatar" class="img-circle img-fluid">
                </div>
            @endif
            <div class="card-footer">
                <div class="row">
                    <div class="col-sm-4 border-right">
                        <div class="description-block">
                            <h5 class="description-header">Descripcion</h5>
                            <span class="description-text">{!! $ministerio->descripcion !!}</span>
                        </div>

                    </div>

                    <div class="col-sm-4 border-right">
                        <div class="description-block">
                            <h5 class="description-header">Estado</h5>
                            <span class="description-text">{{ $ministerio->estado ? 'activo' : 'inactivo' }}</span>
                        </div>

                    </div>

                    <div class="col-sm-4 border-right">
                        <div class="description-block ">
                            <h5 class="description-header">Fecha de Ingreso </h5>
                            <span class="description-text">{{ $ministerio->fecha_ingreso }}</span>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
