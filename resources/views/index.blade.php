@extends('layouts.admin')

@section('content')
                <?php
                $contador = 20 ;
                ?>
                @foreach ($miembros as $miembro)
                <?php
                $contador++ ;
                ?>  
                @endforeach
<div class="row">
    <div class="col-md-3">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>
                    {{$contador}}
                </h3>
                <p>Miembros</p>
            </div>
        <div class="icon mb-3"> 
            <i class="bi bi-person-check-fill"></i>
        </div>
        <a href="{{route("miembros")}}" class="small-box-footer">Mas informacion<i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
    <div class="col-md-3">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>10</h3>
                <p>Clubes</p>
        </div>
        <div class="icon mb-3">
            <i class="bi bi-person-check-fill"></i>
        </div>
        <a href="#" class="small-box-footer">Mas informacion<i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
    <div class="col-md-3">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>5</h3>
                <p>Usuarios</p>
        </div>
        <div class="icon mb-3">
            <i class="bi bi-person-check-fill"></i>
        </div>
        <a href="#" class="small-box-footer">Mas informacion<i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
    <div class="col-md-3">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>5</h3>
                <p>Ministerios</p>
        </div>
        <div class="icon mb-3">
            <i class="bi bi-person-check-fill"></i>
        </div>
        <a href="#" class="small-box-footer">Mas informacion<i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
</div>
@endsection
