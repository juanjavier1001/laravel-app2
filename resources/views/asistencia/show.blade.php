@extends('layouts.admin')
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title"> Asistencia del Miembro :
                                {{ $asistencia->miembro->nombreCompleto2() }}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('asistencias.index') }}"> volver </a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $asistencia->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Miembro:</strong>
                            {{ $asistencia->miembro->nombreCompleto2() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
