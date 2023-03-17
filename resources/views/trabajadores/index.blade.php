@extends('app')

@section('apartado')
<ul>
    @foreach ($trabajadores as $trabajador)
    <li>{{ $trabajador->persona->nombre }} {{ $trabajador->persona->apellidos }}</li>
    <ul>
        @foreach ($trabajador->telefonos as $telefono)
        <li>{{ $telefono->numeroTelefono }}</li>
        @endforeach
    </ul>
    @endforeach
</ul>
@endsection