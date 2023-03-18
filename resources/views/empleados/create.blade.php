@extends('app')

@section('apartado')
@if(session('mensaje'))
<div style="color: green;">{{ session('mensaje') }}</div>
@endif

<div class="container">
    <h3 class="container-title pb-4 px-5">Crear Empleado</h3>

    <form action="{{ route('empleados.create') }}" method="post" class="row g-3 px-5 py-3">
        @csrf
        <div class="mb-3 col-md-5">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control bg-dark text-white" name="nombre" id="nombre" required>
        </div>
        @error('nombre')
        Error en el nombre
        @enderror
        <div class="mb-3 col-md-5">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input type="text" class="form-control bg-dark text-white" name="apellidos" id="apellidos" required>
        </div>
        @error('apellidos')
        Error en los apellidos
        @enderror
        <div class="mb-3 col-md-2">
            <label for="edad" class="form-label">Edad</label>
            <input type="number" class="form-control bg-dark text-white" name="edad" id="edad" required>
        </div>
        @error('edad')
        Error en la edad
        @enderror
        <div class="mb-3 col-md-6">
            <label for="horasTrabajadas" class="form-label">Horas trabajadas</label>
            <input type="number" step="any" class="form-control bg-dark text-white" name="horas_trabajadas" id="horasTrabajadas" required>
        </div>
        @error('horasTrabajadas')
        Error en las horas trabajadas
        @enderror
        <div class="mb-3 col-md-6">
            <label for="precioPorHora" class="form-label">Precio por hora</label>
            <input type="number" step="any" class="form-control bg-dark text-white" name="precio_por_hora" id="precioPorHora" required>
        </div>
        @error('precioPorHora')
        Error en el precio por hora
        @enderror

        <div class="mb-3 col-md-12">
            <button type="submit" class="btn btn-light">Crear</button>
        </div>
    </form>
</div>
@endsection