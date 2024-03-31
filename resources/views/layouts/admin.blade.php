<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('dist/img/asistenciaIcono.png') }}" type="image/x-icon">
    <title>Sistema de control de asistencias</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- Icon Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    {{-- sweet alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- CDN CKeditor --}}

    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
    {{-- css Select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('/') }}" class="nav-link">Inicio</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ url('/') }}" class="brand-link">
                <h4 class="brand-text font-weight-light">Sistema de Asistencia</h4>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="info">
                        <a href="#" class="d-block"> Usuario : {{ Auth::user()->name }}</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline mb-3">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item mb-2">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon">
                                    <i class="bi bi-person-circle"></i>
                                </i>
                                <p>
                                    Usuarios
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('usuarios.index') }}" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>lista de Usuarios</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('usuarios.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Agregar Usuario</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item mb-2">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon">
                                    <i class="bi bi-people"></i>
                                </i>
                                <p>
                                    Miembros
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('miembros') }}" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>lista de miembros</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('miembros.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Agregar miembro</p>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <li class="nav-item mb-2">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon">
                                    <i class="bi bi-bank"></i>
                                </i>
                                <p>
                                    Ministerios
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('ministerios.index') }}" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>lista de ministerios</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('ministerios.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Agregar ministerio</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item mb-2">
                            <a href= "#" class= "nav-link active">
                                <i class="nav-icon">
                                    <i class="bi bi-calendar-check-fill"></i>
                                </i>
                                <p>
                                    Asistencias

                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('asistencias.index') }}" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>lista de Asistencias</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('asistencias.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Agregar Asistencias</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item mb-2">
                            <a href= "#" class= "nav-link active">
                                <i class="nav-icon">
                                    <i class="bi bi-journal-text"></i>
                                </i>
                                <p>
                                    Reportes

                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('asistencias.reporte') }}" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Asistencias</p>
                                    </a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a href="{{ route('reporteMiembros.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Miembros</p>
                                    </a>
                                </li> --}}
                            </ul>
                        </li>

                        <li class="nav-item mb-2">
                            <a href= "#" class= "nav-link active bg-light">
                                <i class="nav-icon">

                                    <i class="bi bi-toggles"></i>
                                </i>
                                <p>
                                    Roles
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('roles.index') }}" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>lista de roles</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('roles.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Agregar rol</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item mb-2">
                            <a href= "#" class= "nav-link active bg-light">
                                <i class="nav-icon">
                                    <i class="bi bi-toggle-on"></i>
                                </i>
                                <p>
                                    Permisos
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('permissions.index') }}" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>lista de permisos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('permissions.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Agregar permiso</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();"
                                style="background-color: rgb(170, 0, 0)">

                                {{-- <i class="nav-icon fas fa-th"></i> --}}

                                <i class="nav-icon">
                                    <i class="bi bi-x-square"></i>
                                </i>
                                <p>
                                    Cerrar sesion
                                </p>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>


                            <br>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <br>
            <!-- Content Header (Page header) -->
            <div class="content mx-3 ">
                @yield('content')
            </div>
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        @yield('footer')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>


    <!-- datatable -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>


    @yield('script')

</body>

</html>
