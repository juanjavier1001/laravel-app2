@extends('layouts.admin')

@section('content')
    <div class="row-12">
        <div class="card {{-- card-outline  card-primary --}} card-primary shadow">
            <div class="card-header">
                <h2 class="d-flex justify-content-between"> Lista de Miembros
                    <div class="card-tools">
                        <a class="btn btn-dark" href="{{ route('miembros.create') }}">Agregar miembro
                            {{--  <i class="fas fa-minus"></i> --}}
                        </a>
                        {{--  <button class="btn btn-dark">Agregar miembro
                        </button> --}}
                    </div>
                </h2>
                {{-- <h3 class=" text-center text-xl "> Lista de Miembros</h3> --}}
                {{--  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div> --}}
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-lg">
                    <thead>
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
                                <td>{{ $miembro->estado }}</td>
                                <td>{{ $miembro->fecha_ingreso }}</td>
                                <td>editar</td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

                {{--  <script>
                    $(function() {
                        $("#example1").DataTable({
                            "responsive": true,
                            "lengthChange": true,
                            "autoWidth": false,
                            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                    });
                </script> --}}


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
            /* $('#example2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            }); */
        });
    </script>
@endsection








{{-- //tabla hecha con bootstrap jc  --}}


{{-- 
    <div class="card  card-primary shadow">
        <div class="card-header">
            <h4 class=" text-center text-xl"> Lista de Miembros</h4>
        </div>
        <div class="card-body">

        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>nombre</th>
                    <th>apellido</th>
                    <th>direccion</th>
                    <th>telefono</th>
                    <th>fecha de nacimiento</th>
                    <th>genero</th>
                    <th>email</th>
                    <th>estado</th>
                    <th>ministerio</th>
                    <th>foto</th>
                    <th>fecha de ingreso</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($miembros as $miembro)
                    <tr>
                        <td>{{ $miembro->id }}</td>
                        <td>{{ $miembro->nombre }}</td>
                        <td>{{ $miembro->apellido }}</td>
                        <td>{{ $miembro->direccion }}</td>
                        <td>{{ $miembro->telefono }}</td>
                        <td>{{ $miembro->fecha_nacimiento }}</td>
                        <td>{{ $miembro->genero }}</td>
                        <td>{{ $miembro->email }}</td>
                        <td>{{ $miembro->estado }}</td>
                        <td>{{ $miembro->ministerio }}</td>
                        <td>{{ $miembro->foto }}</td>
                        <td>{{ $miembro->fecha_ingreso }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div> --}}

{{-- //tabla hecha con bootstrap jc  --}}

{{--     <table class="table">
                <thead>
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
                            <td>{{ $miembro->estado }}</td>
                            <td>{{ $miembro->fecha_ingreso }}</td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table> --}}
