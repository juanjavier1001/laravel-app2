@extends('layouts.admin')

@section('content')
    <div class="row-12">
        <div class="card {{-- card-outline  card-primary --}} card-primary shadow">
            <div class="card-header">
                <h2> Registrar Miembro</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('miembros.store') }}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class=" col-lg-6 col-xl-3">
                            <label for="exampleInputNombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="exampleInputNombre" required >
                            <small style="color: red">
                                @error('nombre'){{ $message}} 
                                @enderror
                            </small>    
                            </div>
                            <div class=" col-lg-6 col-xl-3">
                                <label for="exampleInputApellido" class="form-label">Apellido</label>
                                <input type="text" class="form-control" name="apellido" id="exampleInputApellido" required >
                                @error('apellido'){{ $message}} @enderror
                            </div>
                            <div class=" col-lg-6 col-xl-3">
                                <label for="exampleInputEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="exampleInputEmail" required>
                                @error('email'){{ $message}} @enderror
                            </div>
                            <div class=" col-lg-6 col-xl-3">
                                <label for="exampleInputTelefono" class="form-label">Telefono</label>
                                <input type="number" class="form-control" name="telefono" id="exampleInputTelefono" required>
                                <small style="color: red">
                                    @error('telefono'){{ $message}} @enderror
                                </small>
                                    
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class=" col-lg-6 col-xl-3">
                                <label for="exampleInputNacimiento" class="form-label">Fecha de Nacimiento</label>
                                <input type="date" class="form-control" name="fecha_nacimiento" id="exampleInputNacimiento"
                                required>
                                @error('fecha_nacimiento'){{ $message}} @enderror
                            </div>
                            <div class=" col-lg-6 col-xl-3">
                                <label for="exampleInputGenero" class="form-label">Genero</label>
                                <select name="genero" id="" class="form-control" required>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>
                                </select>
                                @error('genero'){{ $message}} @enderror
                            </div>
                            <div class=" col-lg-6 col-xl-3">
                                <label for="exampleInputDireccion" class="form-label">Direccion</label>
                                <input type="text" class="form-control" name="direccion" id="exampleInputDireccion" required>
                                @error('direccion'){{ $message}} @enderror
                            </div>
                            <div class=" col-lg-6 col-xl-3">
                                <label for="exampleInputMinisterio" class="form-label">Ministerio</label>
                                <input type="text" class="form-control" name="ministerio" id="exampleInputMinisterio"
                                required>
                                @error('ministerio'){{ $message}} @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class=" col-lg-6 col-xl-3">
                                <label for="exampleInputFoto" class="form-label">Fotografia</label>
                                <input type="file" class="form-control mb-2" name="foto" id="file" required>
                                @error('foto'){{ $message}} @enderror
                                <output id="list"></output>
                                <script>
                                    function archivo(evt){
                                        var files = evt.target.files;
                                        //obtenemos la imagen del campo "file".
                                        for (var i=0, f; f = files[i]; i++){
                                            //solo admitimos imagenes.
                                            if (!f.type.match('image.*')){
                                                continue;
                                            }
                                            var reader = new FileReader();
                                            reader.onload = (function (theFile){
                                                return function (e){
                                                    //insertamos la imagen
                                                    document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="',e.target.result,'"width="50%" title="', escape(theFile.name),'"/>'].join('');
                                                };
                                            }) (f);
                                            reader.readAsDataURL(f);
                                        }

                                    }
                                    document.getElementById('file').addEventListener('change',archivo, false);
                                </script>
                            </div>
                        </div>
                        <hr>
                        <a href="{{route("miembros")}}" class="btn btn-secondary mr-2">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Guardar registro </button>
                </form>
            </div>
        </div>
    </div>
@endsection
