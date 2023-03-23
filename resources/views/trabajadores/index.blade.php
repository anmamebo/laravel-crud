@extends('app')

@section('apartado')
<div class="row">
    <a type="button" class="col-sm-1 btn border-0" href="{{ route('trabajadores') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="white" class="bi bi-house-door" viewBox="0 0 16 16">
            <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146ZM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5Z" />
        </svg>
    </a>
    <h3 class="col-sm-11 container-title text-center text-sm-start text-white m-0 p-2">Trabajadores</h3>
</div>

<div class="container mt-4">
    <a href="{{ route('empleados.create') }}" class="btn btn-light me-3">Crear empleado</a>
    <a href="{{ route('gerentes.create') }}" class="btn btn-light">Crear gerente</a>

    <div class="table-responsive mt-4">
        <table class="table table-striped table-dark table-sm text-center">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Sueldo</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Rol</th>
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
                    <td>
                        @if (count($trabajador->telefonos) > 0)
                        <div class="dropdown-center">
                            <a class="btn text-white dropdown-toggle p-0 border-0" href="#" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                Mostrar
                            </a>
                            <ul class="dropdown-menu">
                                @foreach ($trabajador->telefonos as $telefono)
                                <li>
                                    <span class="dropdown-item-text">
                                        {{ $telefono->numero_telefono }}
                                    </span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @else
                        <p class="m-0">No disponible</p>
                        @endif
                    </td>
                    <td>{{ $trabajador->obtenerRol() }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="row justify-content-center text-center">
    <div class="col-2">
        {{ $trabajadores->links() }}
    </div>
</div>
@endsection