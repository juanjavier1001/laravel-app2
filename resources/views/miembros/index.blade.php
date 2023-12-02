@extends('layouts.admin')

@section('content')
    <h1>MIEMBROS</h1>
    <ul>
        @foreach ($miembros as $miembro)
            <li>{{ $miembro->nombre }}</li>
        @endforeach
    </ul>
@endsection
