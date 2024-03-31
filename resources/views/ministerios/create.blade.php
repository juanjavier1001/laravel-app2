@extends('layouts.admin')

@section('content')
    <div class="row-12">
        <div class="card card-primary shadow">
            <div class="card-header">
                <h2> Registrar Ministerio</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('ministerios.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-4">
                        <div class=" col-md-6 col-xl-3 mb-4">
                            <label for="exampleInputNombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="exampleInputNombre"
                                value="{{ old('nombre') }}" required>
                            <small style="color: red">
                                @error('nombre')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>
                        <div class=" col-lg-12 ">
                            <label for="exampleInputDescripcion" class="form-label">Descripcion</label>
                            <textarea name="descripcion" id="exampleInputDescripcion" cols="30" rows="10"></textarea>
                            <script>
                                ClassicEditor
                                    .create(document.querySelector('#exampleInputDescripcion'))
                                    .catch(error => {
                                        console.error(error);
                                    });
                            </script>
                            {{-- <input type="text" class="form-control" name="descripcion" id="exampleInputDescripcion" required > --}}
                            <small style="color: red">
                                @error('descripcion')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class=" col-lg-6 col-xl-3">
                            <label for="exampleInputFoto" class="form-label">Fotografia</label>
                            <input type="file" class="form-control mb-2" name="foto" id="file">
                            @error('foto')
                                {{ $message }}
                            @enderror
                            <output id="list"></output>
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
                                                    .target.result, '"width="50%" title="', escape(theFile.name), '"/>'
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
                    <button type="submit" class="btn btn-primary">Guardar registro </button>
                </form>
            </div>
        </div>
    </div>
@endsection
