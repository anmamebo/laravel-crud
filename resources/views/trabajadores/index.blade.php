@extends('app')

@section('apartado')
<div class="container">
    <h3 class="container-title text-white pb-3">Trabajadores</h3>

    <div class="table-responsive">
        <table class="table table-striped table-dark table-sm">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Edad</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($trabajadores as $trabajador)
                <tr>
                    <td>{{ $trabajador->calcularSueldo() }}</td>
                    <td>{{ $trabajador->persona->nombre }}</td>
                    <td>{{ $trabajador->persona->apellidos }}</td>
                    <td>{{ $trabajador->persona->edad }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection