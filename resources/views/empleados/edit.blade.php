@extends('app')

@section('apartado')
<div class="row">
    <a type="button" class="col-sm-1 btn border-0" href="{{ route('empleados') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="white" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
        </svg>
    </a>
    <h3 class="col-sm-11 container-title text-center text-sm-start text-white m-0 p-2">Editar Empleado</h3>
</div>

<div class="container mt-4">
    @if($errors->any())
    <div class="alert alert-danger px-5">
        @foreach($errors->all() as $error)
        <p class="m-0">{{ $error }}</p>
        @endforeach
    </div>
    @endif

    @if(session('mensaje'))
    <div class="alert alert-success px-5">
        <p class="m-0">{{ session('mensaje') }}</p>
    </div>
    @endif

    <form action="{{ route('empleados.edit', $empleado) }}" method="post" class="row g-3 px-5 py-3">
        @method('PUT')
        @csrf
        <div class="mb-3 col-md-5">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control bg-dark text-white" name="nombre" id="nombre" value="{{ $empleado->trabajador->persona->nombre }}" required>
        </div>

        <div class="mb-3 col-md-5">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input type="text" class="form-control bg-dark text-white" name="apellidos" id="apellidos" value="{{ $empleado->trabajador->persona->apellidos }}" required>
        </div>

        <div class="mb-3 col-md-2">
            <label for="edad" class="form-label">Edad</label>
            <input type="text" class="form-control bg-dark text-white" name="edad" id="edad" value="{{ $empleado->trabajador->persona->edad }}" required>
        </div>

        @if (count($empleado->trabajador->telefonos) > 0)
        <div class="mb-3 col-md-12">
            <label for="telefonos" class="form-label">Telefono</label>
            <div id="telefonos">
                @foreach ($empleado->trabajador->telefonos as $telefono)
                <div class="mb-2">
                    <input type="tel" class="form-control bg-dark text-white" name="telefonos[]" id="telefonos" value="{{ $telefono->numero_telefono }}" required>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <div class="mb-3 col-md-6">
            <label for="horasTrabajadas" class="form-label">Horas trabajadas</label>
            <input type="text" step="any" class="form-control bg-dark text-white" name="horas_trabajadas" id="horasTrabajadas" value="{{ $empleado->horas_trabajadas }}" required>
        </div>

        <div class="mb-3 col-md-6">
            <label for="precioPorHora" class="form-label">Precio por hora</label>
            <input type="text" step="any" class="form-control bg-dark text-white" name="precio_por_hora" id="precioPorHora" value="{{ $empleado->precio_por_hora }}" required>
        </div>

        <div class="mb-3 col-md-12">
            <button type="submit" class="btn btn-light">Editar</button>
        </div>
    </form>
</div>
@endsection