@extends('layouts.admin')


@section('content')

{{-- <script>

    $('.form-delete').submit(function(e){
        e.preventDefault();
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!"
    }).then((result) => {
    if (result.isConfirmed) {
        Swal.fire({
            title: "Deleted!",
            text: "Your file has been deleted.",
        icon: "success"
      });
    }
    });
    });
  </script> --}}

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
                                <td style="text-align: center">
                                    <a href="{{ route("miembros.updateStatus", $miembro->id) }}" class="btn rounded-pill btn-{{ $miembro->estado ? "success" : "danger" }} ">{{$miembro->estado ? "activo" : "inactivo" }}</a>
                                </td>
                                <td>{{ $miembro->fecha_ingreso }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('miembros.show', $miembro->id) }}" class="btn btn-primary">
                                            <i class="bi bi-eye"></i></a>
                                        <a href="{{route("miembros.edit" , $miembro->id)}}" class="btn btn-success"><i class="bi bi-pencil"></i></a>
                                            <form action="{{route("miembros.destroy" ,$miembro->id)}}" class="formulario-eliminar" method="POST" >
                                                @csrf
                                                @method("delete")
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


//capturo el evento del boton eliminar y evito que se recargue y envie los datos del form cuando aprete el boton

        $('.formulario-eliminar').submit(function(e){
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
    }
    else if (result.dismiss === Swal.DismissReason.cancel){
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


{{--  $(".formulario-jc").submit(function(e){
    e.preventDefault() ; 
const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: "btn btn-success",
    cancelButton: "btn btn-danger"
  },
  buttonsStyling: false
});
swalWithBootstrapButtons.fire({
  title: "Are you sure?",
  text: "You won't be able to revert this!",
  icon: "warning",
  showCancelButton: true,
  confirmButtonText: "Yes, delete it!",
  cancelButtonText: "No, cancel!",
  reverseButtons: true
}).then((result) => {
  if (result.isConfirmed) {
    console.log(e);
    this.submit();
  } else if (
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire({
      title: "Cancelled",
      text: "Your imaginary file is safe :)",
      icon: "error"
    });
  }
}); 
}) 
--}}

        
        











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
