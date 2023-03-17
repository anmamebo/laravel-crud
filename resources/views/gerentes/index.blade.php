@extends('app')

@section('apartado')
<ul>
    @foreach ($gerentes as $gerente)
    <li>{{ $gerente->trabajador->persona->nombre }}</li>
    {{ $gerente->trabajador->telefonos }}
    @endforeach
</ul>
@endsection