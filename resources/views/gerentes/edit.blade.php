@extends('app')

@section('apartado')
@if(session('mensaje'))
<div style="color: green;">{{ session('mensaje') }}</div>
@endif

<div class="container">
    <h3 class="container-title pb-4 px-5">Editar Gerente</h3>

    <form action="{{ route('gerentes.edit', $gerente) }}" method="post" class="row g-3 px-5 py-3">
        @method('PUT')
        @csrf
        <div class="mb-3 col-md-5">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control bg-dark text-white" name="nombre" id="nombre" value="{{ $gerente->trabajador->persona->nombre }}" required>
        </div>
        @error('nombre')
        Error en el nombre
        @enderror
        <div class="mb-3 col-md-5">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input type="text" class="form-control bg-dark text-white" name="apellidos" id="apellidos" value="{{ $gerente->trabajador->persona->apellidos }}" required>
        </div>
        @error('apellidos')
        Error en los apellidos
        @enderror
        <div class="mb-3 col-md-2">
            <label for="edad" class="form-label">Edad</label>
            <input type="number" class="form-control bg-dark text-white" name="edad" id="edad" value="{{ $gerente->trabajador->persona->edad }}" required>
        </div>
        @error('edad')
        Error en la edad
        @enderror
        <div class="mb-3 col-md-12">
            <label for="salario" class="form-label">Salario</label>
            <input type="number" step="any" class="form-control bg-dark text-white" name="salario" id="salario" value="{{ $gerente->salario }}" required>
        </div>
        @error('salario')
        Error en el salario
        @enderror

        <div class="mb-3 col-md-12">
            <button type="submit" class="btn btn-light">Editar</button>
        </div>
    </form>
</div>
@endsection