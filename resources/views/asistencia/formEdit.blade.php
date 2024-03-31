<div class="row-12">
    <div class="card {{-- card-outline  card-primary --}} card-warning shadow">
        <div class="card-header">
            <h2> Editar Asistencia</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('asistencias.update', $asistencia->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class=" col-lg-6 col-xl-3">
                        <label for="fecha" class="form-label">Fecha</label>
                        <input type="date" class="form-control" name="fecha" id="fecha"
                            value="{{ $asistencia->fecha }}" required>
                        <small style="color: red">
                            @error('fecha')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                    <div class=" col-lg-6 col-xl-3">
                        <label for="miembro_id" class="form-label">miembro</label>
                        <select class="seleccion_miembros form-control" name="miembro_id" id="miembro_id"
                            height="100px">
                            <option selected="selected" value={{ $asistencia->miembro->id }}>
                                {{ $asistencia->miembro->nombrecompleto2() }}
                            </option>
                            {{-- <option selected="true" disabled="disabled">seleccione un miembro</option> --}}
                            @foreach ($miembros as $key => $miembro)
                                <option value="{{ $key }}">{{ $miembro }}</option>
                            @endforeach
                        </select>
                        <small style="color: red">
                            @error('miembro_id')
                                {{ $message }}
                            @enderror
                    </div>
                </div>
                <hr>
                <a href="{{ route('asistencias.index') }}" class="btn btn-secondary mr-2">Cancelar</a>
                <button type="submit" class="btn btn-warning">Guardar asistencia </button>
            </form>
        </div>
    </div>
</div>
