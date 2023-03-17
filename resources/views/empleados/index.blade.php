@extends('app')

@section('apartado')
<ul>
    @foreach ($empleados as $empleado)
    <li>{{ $empleado->trabajador->persona->nombre }}</li>
    @endforeach
</ul>
@endsection