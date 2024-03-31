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
        <div class="card {{-- card-outline  card-primary --}} card-primary shadow">
            <div class="card-header">
                <h2 class="d-flex justify-content-between"> Lista de Miembros
                    <div class="card-tools">
                        <a class="btn btn-dark" href="{{ route('miembros.create') }}">Agregar miembro
                        </a>
                    </div>
                </h2>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-lg table-hover   ">
                    <thead {{-- class="thead-dark" --}}>
                        <tr>
                            <th>Nro</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Direccion</th>
                            <th>Email</th>
                            <th>Estado</th>
                            <th>Fecha de ingreso</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $contador = 1;
                        @endphp
                        @foreach ($miembros as $miembro)
                            <tr>
                                <td>{{ $contador++ }}</td>
                                <td>{{ $miembro->nombre }}</td>
                                <td>{{ $miembro->apellido }}</td>
                                <td>{{ $miembro->direccion }}</td>
                                <td>{{ $miembro->email }}</td>
                                <td style="text-align: center">
                                    <a href="{{ route('miembros.updateStatus', $miembro->id) }}"
                                        class="btn rounded-pill btn-{{ $miembro->estado ? 'success' : 'danger' }} ">{{ $miembro->estado ? 'activo' : 'inactivo' }}</a>
                                </td>
                                <td>{{ $miembro->fecha_ingreso }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('miembros.show', $miembro->id) }}" class="btn btn-primary">
                                            <i class="bi bi-eye"></i></a>
                                        <a href="{{ route('miembros.edit', $miembro->id) }}" class="btn btn-success"><i
                                                class="bi bi-pencil"></i></a>
                                        <form action="{{ route('miembros.destroy', $miembro->id) }}"
                                            class="formulario-eliminar" method="POST">
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
    </script>

    <script>
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
