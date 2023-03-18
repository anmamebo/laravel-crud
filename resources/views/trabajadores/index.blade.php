@extends('app')

@section('apartado')
<a type="button" class="btn border-0" href="{{ route('trabajadores') }}">
    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="white" class="bi bi-house-door" viewBox="0 0 16 16">
        <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146ZM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5Z" />
    </svg>
</a>

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
                    <th scope="col">Sueldo</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($trabajadores as $trabajador)
                <tr>
                    <td>{{ $trabajador->id }}</td>
                    <td>{{ $trabajador->persona->nombre }}</td>
                    <td>{{ $trabajador->persona->apellidos }}</td>
                    <td>{{ $trabajador->persona->edad }}</td>
                    <td>{{ $trabajador->calcularSueldo() }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection