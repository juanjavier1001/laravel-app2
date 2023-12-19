@extends('layouts.admin')

@section('content')
    <div class="card {{-- card-outline  card-primary --}} card-success shadow">
        <div class="card-header">
            <h2> Modificar Miembro</h2>
        </div>
        <div class="card-body">
            <form action="{{route("miembros.update",$miembro->id)}}" method="POST"  enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="row mb-3">
                    <div class=" col-lg-6 col-xl-3">
                        <label for="exampleInputNombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="exampleInputNombre" value="{{$miembro->nombre}}"  >
                        <small style="color: red">
                            @error('nombre'){{ $message}} 
                            @enderror
                        </small>    
                        </div>
                        <div class=" col-lg-6 col-xl-3">
                            <label for="exampleInputApellido" class="form-label">Apellido</label>
                            <input type="text" class="form-control" name="apellido" id="exampleInputApellido" value="{{$miembro->apellido}}"  >
                            @error('apellido'){{ $message}} @enderror
                        </div>
                        <div class=" col-lg-6 col-xl-3">
                            <label for="exampleInputEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="exampleInputEmail" value="{{$miembro->email}}" >
                            @error('email'){{ $message}} @enderror
                        </div>
                        <div class=" col-lg-6 col-xl-3">
                            <label for="exampleInputTelefono" class="form-label">Telefono</label>
                            <input type="number" class="form-control" name="telefono" id="exampleInputTelefono" value="{{$miembro->telefono}}"  >
                            <small style="color: red">
                                @error('telefono'){{ $message}} @enderror
                            </small>
                                
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class=" col-lg-6 col-xl-3">
                            <label for="exampleInputNacimiento" class="form-label">Fecha de Nacimiento</label>
                            <input type="date" class="form-control" name="fecha_nacimiento" id="exampleInputNacimiento"
                            value="{{$miembro->fecha_nacimiento}}">
                            @error('fecha_nacimiento'){{ $message}} @enderror
                        </div>
                        
                        <div class=" col-lg-6 col-xl-3">
                            <label for="exampleInputGenero" class="form-label">Genero</label>
                            <select name="genero" id="" class="form-control">
                                @if ($miembro->genero == "Femenino")
                                <option value="Femenino">Femenino</option>
                                <option value="Masculino">Masculino</option>
                                @else   
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                                @endif
                            </select>
                            @error('genero'){{ $message}} @enderror
                        </div>
                        <div class=" col-lg-6 col-xl-3">
                            <label for="exampleInputDireccion" class="form-label">Direccion</label>
                            <input type="text" class="form-control" name="direccion" id="exampleInputDireccion" value="{{$miembro->direccion}}">
                            @error('direccion'){{ $message}} @enderror
                        </div>
                        <div class=" col-lg-6 col-xl-3">
                            <label for="exampleInputMinisterio" class="form-label">Ministerio</label>
                            <input type="text" class="form-control" name="ministerio" id="exampleInputMinisterio"
                            value="{{$miembro->ministerio}}">
                            @error('ministerio'){{ $message}} @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class=" col-lg-6 col-xl-2">
                        <label for="exampleInputMinisterio" class="form-label">Foto</label>
                        <input class="mb-2" type="file" id="file" name="foto">
                        <output id="list">
                            @if ($miembro->foto == "")
                            <p>no hay foto</p>
                            @else <img src="{{asset("storage/imagesMiembro/".$miembro->foto)}}" width="80%" alt="">
                            @endif

                        </output>
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
                                            document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="',e.target.result,'"width="80%" title="', escape(theFile.name),'"/>'].join('');
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
                <button type="submit" class="btn btn-success">Actualizar Registro </button>
            </form>
        </div>
    </div>

  
    
@endsection