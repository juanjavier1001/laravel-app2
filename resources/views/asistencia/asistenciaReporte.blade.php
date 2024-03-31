{{-- @dd($asistencias) --}}
@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header ">
            <h1>Reporte Asistencia</h1>
        </div>
        <div class="row ">
            <div class="card-body col-md-4 col-lg-3 mr-5 ml-4">
                <div class="info-box">
                    <span class="info-box-icon bg-primary"><i class="bi bi-printer-fill"></i></span>
                    <div class="info-box-content mb-3">
                        <form action="{{ route('asistencias.pdf') }}" method="post" target="_blank">
                            @csrf
                            <strong>una sola fecha</strong>
                            <label for="">fecha :</label>
                            <input type="date" class="form-control" name="fecha" required>
                            <button class="btn btn-success btn-lg btn-block mt-4" type="submit">Imprimir pdf</button>
                        </form>
                    </div>

                </div>
            </div>
            <div class="card-body col-md-4 col-lg-8 ml-4">
                <div class="info-box">
                    <span class="info-box-icon bg-primary">
                        <i class="bi bi-printer-fill"></i>
                    </span>
                    <div class="info-box-content mb-1">
                        <form action="{{ route('asistenciasFechas.pdf') }}" id="form-fecha" method="POST" target="_blank">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12 col-lg-4 ">
                                    <label for="">Fecha inicio :</label>
                                    <input type="date" id="fi" name="fechaInicio" class="form-control" required>
                                </div>
                                <div class="col-sm-12 col-lg-4">
                                    <label for="">Fecha final :</label>
                                    <input type="date" id="ff" name="fechaFinal" class="form-control" required>
                                </div>
                                <div class="col-sm-12 col-lg-4">
                                    <button class="btn btn-success btn-lg btn-block mt-4" type="submit">Imprimir
                                        pdf</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                </a>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(() => {
            $("#form-fecha").submit(function(e) {
                e.preventDefault();
                if (document.getElementById("fi").value > document.getElementById("ff").value) {
                    alert("La fecha de inicio es menor que la final.");
                } else {
                    this.submit();
                }
            })
        })
    </script>
@endsection
