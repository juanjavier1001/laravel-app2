@extends('layouts.admin')

@section('content')
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-primary">
                <h2>Crear Usuario</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('usuarios.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                        <small style="color: red">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="email">Correo</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ old('email') }}">
                        <small style="color: red">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input id="password" type="password" class="form-control" name="password"
                            autocomplete="new-password">
                        <small style="color: red">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="password-confirm">Confirmar contraseña</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            autocomplete="new-password">
                    </div>
                    <hr>
                    <a href="{{ route('miembros') }}" class="btn btn-secondary">cancelar</a>
                    <button type="submit" class="btn btn-primary">Registrarse</button>
            </div>
            </form>
        </div>
    </div>
    </div>
@endsection
