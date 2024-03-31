@extends('layouts.admin')

@section('content')
    {{-- @dd($miembros) --}}
    @include('asistencia.formCreate')
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.seleccion_miembros').select2();
        });
    </script>
@endsection
