@extends('layouts.admin')

@section('content')
    <div class="col-xl-4">
        <div class="card">
            <div class="card-header bg-success">
                <h2>Editar Usuario</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('usuarios.update', $usuario) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ old('name', $usuario->name) }}">
                        <small style="color: red">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="email">Correo</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ old('email', $usuario->email) }}">
                        <small style="color: red">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input id="password" type="password" class="form-control toggle togglef" name="password"
                            autocomplete="new-password" disabled>
                        <small style="color: red">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="password-confirm">Confirmar contraseña</label>
                        <input id="password-confirm" type="password" class="form-control toggle"
                            name="password_confirmation" autocomplete="new-password" disabled>

                        <button type="button" id="habilitar" class="btn btn-dark mt-2">Habilitar cambio de
                            contraseña</button>
                        <br>
                        <small>si dejo los campos vacios queda la misma contraseña</small>
                    </div>
                    <div class="form-group">
                        <hr>
                        <label>Roles</label>
                        @foreach ($roles as $rol)
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" name="roles[]" type="checkbox" id="{{ $rol->id }}"
                                    value="{{ $rol->id }}" @if (in_array($rol->id, old('roles', $usuario->roles->pluck('id')->toArray()))) checked @endif>
                                <label for="{{ $rol->id }}" class="custom-control-label">{{ $rol->name }}</label>
                            </div>
                        @endforeach
                    </div>
                    <hr>
                    <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">cancelar</a>
                    <button type="submit" class="btn btn-success">Actualizar Usuario</button>
            </div>
            </form>
        </div>
    </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).on('click', '#habilitar', function() {
            $(".toggle").removeAttr("disabled");
            $(".togglef").focus();
        });
    </script>
@endSection
