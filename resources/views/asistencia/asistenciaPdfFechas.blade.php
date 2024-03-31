<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container mt-5">
        <table class="table table-bordered  table-hover table-sm">
            <thead>
                <tr>
                    <th>Nro</th>
                    <th>Fecha</th>
                    <th>Miembro</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $contador = 1;
                @endphp
                @foreach ($asistencias as $asistencia)
                    <tr>
                        <th>{{ $contador++ }}</th>
                        <th>{{ $asistencia->fecha }}</th>
                        <th>{{ $asistencia->miembro->nombreCompleto2() }}</th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
