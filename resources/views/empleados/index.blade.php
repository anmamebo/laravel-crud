@extends('app')

@section('apartado')
<ul>
    @foreach ($empleados as $empleado)
    <li>
        {{ $empleado->trabajador->persona->nombre }}
        <a href="{{ route('empleados.edit', $empleado) }}">Editar</a>

        <form action="{{ route('empleados.delete', $empleado) }}" method="post">
            @method('DELETE')
            @csrf
            <input type="submit" value="Eliminar">
        </form>
    </li>
    @endforeach
</ul>
@endsection