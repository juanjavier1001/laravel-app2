@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <h1>Roles</h1>
                            </span>

                            <div class="float-right">
                                <a href="{{ route('roles.create') }}" class="btn btn-primary  float-right"
                                    data-placement="left">
                                    crear Rol
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped table-hover table-lg ">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>nombre</th>
                                        <th>acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $contador = 1;
                                    @endphp
                                    @foreach ($roles as $rol)
                                        <tr>
                                            <td>{{ $contador++ }}</td>

                                            <td>{{ $rol->name }}</td>

                                            <td>
                                                <form action="{{ route('roles.destroy', $rol->id) }}"
                                                    class="formulario-eliminar" method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('roles.show', $rol->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('roles.edit', $rol->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i>Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> Eliminar </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
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
