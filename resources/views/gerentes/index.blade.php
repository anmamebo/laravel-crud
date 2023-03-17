@extends('app')

@section('apartado')

<a href="{{ route('gerentes.create') }}">Crear gerente</a>

<ul>
    @foreach ($gerentes as $gerente)
    <li>
        {{ $gerente->trabajador->persona->nombre }}
        <a href="{{ route('gerentes.edit', $gerente) }}">Editar</a>

        <form action="{{ route('gerentes.delete', $gerente) }}" method="post">
            @method('DELETE')
            @csrf
            <input type="submit" value="Eliminar">
        </form>
    </li>
    {{ $gerente->trabajador->telefonos }}
    @endforeach
</ul>
@endsection