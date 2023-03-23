@extends('app')

@section('apartado')
<div class="row">
    <a type="button" class="col-sm-1 btn border-0" href="{{ route('trabajadores') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="white" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
        </svg>
    </a>
    <h3 class="col-sm-11 container-title text-center text-sm-start text-white m-0 p-2">Empleados</h3>
</div>

<div class="container mt-4">
    <a href="{{ route('empleados.create') }}" class="btn btn-light">Crear empleado</a>

    @if(session('mensaje'))
    <div class="alert alert-success alert-dismissible fade show px-5 mt-4">
        <span class="m-0">{{ session('mensaje') }}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show px-5 mt-4">
        <span class="m-0">{{ session('error') }}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif


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
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($empleados as $empleado)
                <tr>
                    <td>{{ $empleado->trabajador->id }}</td>
                    <td>{{ $empleado->trabajador->persona->nombre }}</td>
                    <td>{{ $empleado->trabajador->persona->apellidos }}</td>
                    <td>{{ $empleado->trabajador->persona->edad }}</td>
                    <td>{{ $empleado->calcularSueldo() }}</td>
                    <td>
                        @if (count($empleado->trabajador->telefonos) > 0)
                        <div class="dropdown-center">
                            <a class="btn text-white dropdown-toggle p-0 border-0" href="#" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                Mostrar
                            </a>
                            <ul class="dropdown-menu">
                                @foreach ($empleado->trabajador->telefonos as $telefono)
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
                    <td>
                        <a href="{{ route('empleados.edit', $empleado) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                            </svg>
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('empleados.delete', $empleado) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn p-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="row justify-content-center text-center">
    <div class="col-2">
        {{ $empleados->links() }}
    </div>
</div>
@endsection