@extends('layouts.admin')

@section('content')
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-primary">
                <h2>Crear Rol</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('roles.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="form-rol">Rol</label>
                        <input type="text" class="form-control" id="form-rol" name="name" value="{{ old('name') }}">
                        <small style="color: red">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                    <div class="form-group">
                        <hr>
                        <label>Permisos</label>
                        @foreach ($permissions as $permission)
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" name="permissions[]" type="checkbox"
                                    id="{{ $permission->id }}" value="{{ $permission->id }}">
                                <label for="{{ $permission->id }}"
                                    class="custom-control-label">{{ $permission->name }}</label>
                            </div>
                        @endforeach
                        <small style="color: red">
                            @error('permissions')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                    <div class="form-group">
                        <hr>
                        <a href="{{ route('roles.index') }}" class="btn btn-secondary">cancelar</a>
                        <button type="submit" class="btn btn-primary">crear rol</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
