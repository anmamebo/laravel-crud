@extends('app')

@section('apartado')
@if(session('mensaje'))
    <div style="color: green;">{{ session('mensaje') }}</div>
@endif

<form action="{{ route('gerentes.edit', $gerente) }}" method="post">
    @method('PUT')
    @csrf
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre" placeholder="" value="{{ $gerente->trabajador->persona->nombre }}">
    @error('nombre')
    Error en el nombre
    @enderror
    <label for="apellidos">Apellidos</label>
    <input type="text" name="apellidos" id="apellidos" placeholder="" value="{{ $gerente->trabajador->persona->apellidos }}">
    @error('apellidos')
    Error en los apellidos
    @enderror
    <label for="edad">Edad</label>
    <input type="number" name="edad" id="edad" placeholder="" value="{{ $gerente->trabajador->persona->edad }}">
    @error('edad')
    Error en la edad
    @enderror
    <label for="salario">Salario</label>
    <input type="number" step="any" name="salario" id="salario" placeholder="" value="{{ $gerente->salario }}"> 
    @error('salario')
    Error en el salario
    @enderror
    <input type="submit" value="Editar">
</form>
@endsection