@extends('layouts.admin')

@section('content')
    {{-- defino variables --}}
    <?php
    $contadorMiembros = 0;
    $contadorMinisterios = 0;
    $contadorUsuarios = 0;
    $contadorAsistencias = 0;
    ?>
    {{-- recorro registros de la tabla Miembros --}}
    @foreach ($miembros as $miembro)
        <?php
        $contadorMiembros++;
        ?>
    @endforeach
    {{-- recorro registros de la tabla Ministerios --}}
    @foreach ($ministerios as $ministerio)
        <?php
        $contadorMinisterios++;
        ?>
    @endforeach
    {{-- recorro registros de la tabla Usuarios --}}
    @foreach ($usuarios as $usuario)
        <?php
        $contadorUsuarios++;
        ?>
    @endforeach
    {{-- recorro registros de la tabla Asistencias --}}
    @foreach ($asistencias as $asistencia)
        <?php
        $contadorAsistencias++;
        ?>
    @endforeach
    <div class="row">
        <div class="col-md-3">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>
                        {{ $contadorMiembros }}
                    </h3>
                    <p>Miembros</p>
                </div>
                <div class="icon mb-3">
                    <i class="bi bi-people"></i>
                </div>
                <a href="{{ route('miembros') }}" class="small-box-footer">Mas informacion<i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $contadorMinisterios }}</h3>
                    <p>Ministerios</p>
                </div>
                <div class="icon mb-3">
                    <i class="bi bi-bank"></i>
                </div>
                <a href="{{ route('ministerios.index') }}" class="small-box-footer">Mas informacion<i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $contadorUsuarios }}</h3>
                    <p>Usuarios</p>
                </div>
                <div class="icon mb-3">
                    <i class="bi bi-person-check-fill"></i>
                </div>
                <a href="{{ route('usuarios.index') }}" class="small-box-footer">Mas informacion<i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $contadorAsistencias }}</h3>
                    <p>Asistencias</p>
                </div>
                <div class="icon mb-3">
                    <i class="bi bi-calendar-check-fill"></i>
                </div>
                <a href="{{ route('asistencias.index') }}" class="small-box-footer">Mas informacion<i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <footer class="main-footer bg-secondary">
        <!-- Default to the left -->
        <strong>App creada por Cordero Juan Javier Copyright &copy; 2024 </strong> All rights
        reserved.
    </footer>
@endsection
