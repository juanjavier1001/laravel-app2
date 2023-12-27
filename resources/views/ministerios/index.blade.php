@extends('layouts.admin')


@section('content')
    @if (session('miembroAgregado'))
        <script>
            Swal.fire({
                title: "Agregado!",
                text: "{{ session('miembroAgregado') }}",
                icon: "success"
            });
        </script>
    @elseif (session('miembroActualizado'))
        <script>
            Swal.fire({
                title: "Actualizado!",
                text: "{{ session('miembroActualizado') }}",
                icon: "success"
            });
        </script>
    @elseif (session('miembroEliminado'))
        <script>
            Swal.fire({
                title: "Eliminado!",
                text: "{{ session('miembroEliminado') }}",
                icon: "success"
            });
        </script>
    @endif

    <div class="row-12">
        <div class="card card-primary shadow">
            <div class="card-header">
                <h2 class="d-flex justify-content-between"> Lista de Ministerios
                    <div class="card-tools">
                        <a class="btn btn-dark" href="{{ route("ministerios.index") }}">Agregar ministerio
                        </a>
                    </div>
                </h2>

            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-lg">
                    <thead>
                        <tr>
                            <th>Nro</th>
                            <th>nombre</th>
                            <th>Descripcion</th>
                            <th>estado</th>
                            <th>fecha_ingreso</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $contador = 1;
                        @endphp
                        @foreach ($ministerios as $ministerio)
                            <tr>
                                <td>{{ $contador++ }}</td>
                                <td>{{ $ministerio->nombre }}</td>
                                <td>{{ $ministerio->descripcion }}</td>
                                <td style="text-align: center">
                                    <a href="{{ route('ministerios.updateStatus',$ministerio->id) }}"
                                        class="btn rounded-pill btn-{{ $ministerio->estado ? 'success' : 'danger' }} ">{{ $ministerio->estado ? 'activo' : 'inactivo' }}</a>
                                </td>
                                <td>{{ $ministerio->fecha_ingreso }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route("ministerios.show", $ministerio->id) }}" class="btn btn-primary">
                                            <i class="bi bi-eye"></i></a>
                                        <a href="{{ route("ministerios.edit" , $ministerio->id) }}" class="btn btn-success"><i class="bi bi-pencil"></i></a>
                                        <form action="{{ route("ministerios.destroy" , $ministerio->id) }}" class="formulario-eliminar" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function() {
            $("#example1").DataTable({
                "language": {
                    info: 'Mostrar pagina _PAGE_ de _PAGES_',
                    lengthMenu: 'Mostrar _MENU_ miembros por pagina',
                    search: "Buscar :",
                    zeroRecords: "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "previous": "Anterior",
                        "next": "Siguiente",
                        "last": "Ultimo"
                    },
                },
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });

        //capturo el evento del boton eliminar y evito que se recargue y envie los datos del form cuando aprete el boton

        $('.formulario-eliminar').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: "Estas seguro?",
                text: "No podras revertir esto!",
                icon: "Cuidado",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si , borrar miembro!",
                cancelButtonText: "Cancelar",
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire({
                        title: "Cancelado",
                        text: "Tu archivo esta seguro :)",
                        icon: "error"
                    });
                }
            });
        });
    </script>
@endsection
