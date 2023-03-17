@extends('app')

@section('apartado')
@if(session('mensaje'))
    <div style="color: green;">{{ session('mensaje') }}</div>
@endif

<form action="{{ route('empleados.edit', $empleado) }}" method="post">
    @method('PUT')
    @csrf
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre" placeholder="" value="{{ $empleado->trabajador->persona->nombre }}">
    @error('nombre')
    Error en el nombre
    @enderror
    <label for="apellidos">Apellidos</label>
    <input type="text" name="apellidos" id="apellidos" placeholder="" value="{{ $empleado->trabajador->persona->apellidos }}">
    @error('apellidos')
    Error en los apellidos
    @enderror
    <label for="edad">Edad</label>
    <input type="number" name="edad" id="edad" placeholder="" value="{{ $empleado->trabajador->persona->edad }}">
    @error('edad')
    Error en la edad
    @enderror
    <label for="horasTrabajadas">Horas trabajadas</label>
    <input type="number" step="any" name="horasTrabajadas" id="horasTrabajadas" placeholder="" value="{{ $empleado->horasTrabajadas }}">
    @error('horasTrabajadas')
    Error en las horas trabajadas
    @enderror
    <label for="precioPorHora">Precio por hora</label>
    <input type="number" step="any" name="precioPorHora" id="precioPorHora" placeholder="" value="{{ $empleado->precioPorHora }}">
    @error('precioPorHora')
    Error en el precio por hora
    @enderror
    <input type="submit" value="Editar">
</form>
@endsection