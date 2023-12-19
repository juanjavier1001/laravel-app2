@extends('layouts.admin')

@section('content')
    <div class="col-12 col-lg-9">
        <div class="card card-widget widget-user shadow">
            <div class="widget-user-header bg-danger">
                <h1>{{ $miembro->nombre }} {{ $miembro->apellido }}</h1>
                {{-- <h5 class="widget-user-desc">Founder &amp; CEO</h5> --}}
            </div>
            <div class="widget-user-image">
                <img class="img-circle elevation-2 " src="{{asset("storage/imagesMiembro/".$miembro->foto)}}" alt="User Avatar"
                    class="img-circle img-fluid">
            </div>
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
                            <span class="description-text">{{ $miembro->genero}}</span>
                        </div>

                    </div>

                    <div class="col-sm-4 border-right">
                        <div class="description-block">
                            <h5 class="description-header">Ministerio</h5>
                            <span class="description-text">{{ $miembro->ministerio}}</span>
                        </div>

                    </div>

                    <div class="col-sm-4 border-right">
                        <div class="description-block">
                            <h5 class="description-header">Fecha de Ingreso</h5>
                            <span class="description-text">{{ $miembro->fecha_ingreso}}</span>
                        </div>
                        
                    </div>
                  
                    

                </div>

            </div>
        </div>
    </div>



    {{-- perfil 2 --}}

   {{--  <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
        <div class="card bg-light d-flex flex-fill">
            <div class="card-header text-muted border-bottom-0">
                Digital Strategist
            </div>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-7">
                        <h2 class="lead"><b>Nicole Pearson</b></h2>
                        <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                        <ul class="ml-4 mb-0 fa-ul text-muted">
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address:
                                Demo Street 123, Demo City 04312, NJ</li>
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800
                                - 12 12 23 52</li>
                        </ul>
                    </div>
                    <div class="col-5 text-center">
                        <img src="../../dist/img/user1-128x128.jpg" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="text-right">
                    <a href="#" class="btn btn-sm bg-teal">
                        <i class="fas fa-comments"></i>
                    </a>
                    <a href="#" class="btn btn-sm btn-primary">
                        <i class="fas fa-user"></i> View Profile
                    </a>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
