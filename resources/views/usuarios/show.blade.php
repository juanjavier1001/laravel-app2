@extends('layouts.admin')

@section('content')
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3>
                        nombre del Usuario :
                    </h3>
                    <button class="btn btn-primary btn-lg " disabled>
                        {{ $usuario->name }}
                    </button>
                </div>
            </div>
            <div class="card-body">
                <p>Descripcion del Usuario :
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusantium quae,
                    beatae molestiae commodi unde
                    nobis nisi dolores corrupti laboriosam! Earum quo error commodi quod laboriosam tempora natus alias
                    reiciendis quos?
                </p>
            </div>
        </div>
    </div>
@endsection
