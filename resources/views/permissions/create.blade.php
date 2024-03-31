@extends('layouts.admin')

@section('content')
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-primary">
                <h2>Crear Permiso</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('permissions.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="form-rol">Permiso</label>
                        <input type="text" class="form-control" id="form-rol" name="name" value="{{ old('name') }}">
                        <small style="color: red">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                    <div class="form-group">
                        <hr>
                        <a href="{{ route('permissions.index') }}" class="btn btn-secondary">cancelar</a>
                        <button type="submit" class="btn btn-primary">crear permiso</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
