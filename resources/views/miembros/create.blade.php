@extends('layouts.admin')

@section('content')
    <div class="row-12">
        <div class="card {{-- card-outline  card-primary --}} card-primary shadow">
            <div class="card-header">
                <h2> Registrar Miembro</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('miembros.store') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class=" col-lg-6 col-xl-3">
                            <label for="exampleInputNombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="exampleInputNombre" required>
                        </div>
                        <div class=" col-lg-6 col-xl-3">
                            <label for="exampleInputApellido" class="form-label">Apellido</label>
                            <input type="text" class="form-control" name="apellido" id="exampleInputApellido" required>
                        </div>
                        <div class=" col-lg-6 col-xl-3">
                            <label for="exampleInputEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="exampleInputEmail" required>
                        </div>
                        <div class=" col-lg-6 col-xl-3">
                            <label for="exampleInputTelefono" class="form-label">Telefono</label>
                            <input type="number" class="form-control" name="telefono" id="exampleInputTelefono" required>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class=" col-lg-6 col-xl-2">
                            <label for="exampleInputNacimiento" class="form-label">Fecha de Nacimiento</label>
                            <input type="date" class="form-control" name="fecha_nacimiento" id="exampleInputNacimiento"
                                required>
                        </div>
                        <div class=" col-lg-6 col-xl-2">
                            <label for="exampleInputFoto" class="form-label">Fotografia</label>
                            <input type="file" class="form-control" name="foto" id="exampleInputFoto" required>
                        </div>
                        <div class=" col-lg-6 col-xl-2">
                            <label for="exampleInputGenero" class="form-label">Genero</label>
                            <select name="genero" id="" class="form-control" required>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                            </select>
                        </div>
                        <div class=" col-lg-6 col-xl-4">
                            <label for="exampleInputDireccion" class="form-label">Direccion</label>
                            <input type="text" class="form-control" name="direccion" id="exampleInputDireccion" required>
                        </div>
                        <div class=" col-lg-6 col-xl-2">
                            <label for="exampleInputMinisterio" class="form-label">Ministerio</label>
                            <input type="text" class="form-control" name="ministerio" id="exampleInputMinisterio"
                                required>
                        </div>
                    </div>
                    <a href="#" class="btn btn-secondary mr-2">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Guardar registro </button>
                </form>
            </div>
        </div>
    </div>
@endsection
