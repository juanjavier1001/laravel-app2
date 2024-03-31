@extends('layouts.admin')

@section('content')
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-success">
                <h2>Editar Permiso</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="form-rol">Permiso</label>
                        <input type="text" class="form-control" id="form-rol" name="name"
                            value="{{ old('name', $permission->name) }}">
                        <small style="color: red">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                    <div class="form-group">
                        <hr>
                        <a href="{{ route('permissions.index') }}" class="btn btn-secondary">cancelar</a>
                        <button type="submit" class="btn btn-success">actualizar permiso</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
