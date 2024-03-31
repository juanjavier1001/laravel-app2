@extends('layouts.admin')

@section('content')
    <div class="card  card-success shadow">
        <div class="card-header">
            <h2> Modificar Ministerios</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('ministerios.update', $ministerio->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-lg-6 col-xl-4  mb-4">
                        <label for="exampleInputNombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="exampleInputNombre"
                            value="{{ old('nombre', $ministerio->nombre) }}" required>
                        <small style="color: red">
                            @error('nombre')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                    <div class="col-12">
                        <label for="editor" class="form-label">Descripcion</label>
                        <textarea name="descripcion" id="editor" class="form-control" cols="30" rows="10">{!! $ministerio->descripcion !!}</textarea>
                        <script>
                            ClassicEditor
                                .create(document.querySelector('#editor'))
                                .catch(error => {
                                    console.error(error);
                                });
                        </script>
                        {{--  <script>
                                     CKEDITOR.replace( 'descripcion' );
                             </script> --}}
                        <small style="color: red">
                            @error('descripcion')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class=" col-lg-6 col-xl-2">
                        <label for="exampleInputMinisterio" class="form-label">Foto</label>
                        <input class="mb-2" type="file" id="file" name="foto">
                        <output id="list">
                            {{-- @if ($ministerio->foto == '')
                            <p>no hay foto</p>
                            @else <img src="{{asset("storage/imagesMinisterio/".$ministerio->foto)}}" width="80%" alt="">
                            @endif --}}
                            <img src="{{ asset('storage/imagesMinisterio/' . $ministerio->foto) }}" width="80%"
                                alt="">
                        </output>
                        <script>
                            function archivo(evt) {
                                var files = evt.target.files;
                                //obtenemos la imagen del campo "file".
                                for (var i = 0, f; f = files[i]; i++) {
                                    //solo admitimos imagenes.
                                    if (!f.type.match('image.*')) {
                                        continue;
                                    }
                                    var reader = new FileReader();
                                    reader.onload = (function(theFile) {
                                        return function(e) {
                                            //insertamos la imagen
                                            document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="', e
                                                .target.result, '"width="80%" title="', escape(theFile.name), '"/>'
                                            ].join('');
                                        };
                                    })(f);
                                    reader.readAsDataURL(f);
                                }

                            }
                            document.getElementById('file').addEventListener('change', archivo, false);
                        </script>
                    </div>
                </div>
                <hr>
                <a href="{{ route('ministerios.index') }}" class="btn btn-secondary mr-2">Cancelar</a>
                <button type="submit" class="btn btn-success">Actualizar Registro </button>
            </form>
        </div>
    </div>
@endsection
