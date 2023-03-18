@extends('app')

@section('apartado')
@if(session('mensaje'))
<div style="color: green;">{{ session('mensaje') }}</div>
@endif

<div class="container">
    <h3 class="container-title pb-4 px-5">Editar Gerente</h3>

    @if($errors->any())
    <div class="alert alert-danger px-5 align-items-center">
        @foreach($errors->all() as $error)
        <p class="m-0">{{ $error }}</p>
        @endforeach
    </div>
    @endif

    <form action="{{ route('gerentes.edit', $gerente) }}" method="post" class="row g-3 px-5 py-3">
        @method('PUT')
        @csrf
        <div class="mb-3 col-md-5">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control bg-dark text-white" name="nombre" id="nombre" value="{{ $gerente->trabajador->persona->nombre }}" required>
        </div>

        <div class="mb-3 col-md-5">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input type="text" class="form-control bg-dark text-white" name="apellidos" id="apellidos" value="{{ $gerente->trabajador->persona->apellidos }}" required>
        </div>

        <div class="mb-3 col-md-2">
            <label for="edad" class="form-label">Edad</label>
            <input type="number" class="form-control bg-dark text-white" name="edad" id="edad" value="{{ $gerente->trabajador->persona->edad }}" required>
        </div>

        @if (count($gerente->trabajador->telefonos) > 0)
        <div class="mb-3 col-md-12">
            <label for="telefonos" class="form-label">Telefono</label>
            <div id="telefonos">
                @foreach ($gerente->trabajador->telefonos as $telefono)
                <div class="mb-2">
                    <input type="tel" class="form-control bg-dark text-white" name="telefonos[]" id="telefonos" value="{{ $telefono->numero_telefono }}">
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <div class="mb-3 col-md-12">
            <label for="salario" class="form-label">Salario</label>
            <input type="number" step="any" class="form-control bg-dark text-white" name="salario" id="salario" value="{{ $gerente->salario }}" required>
        </div>

        <div class="mb-3 col-md-12">
            <button type="submit" class="btn btn-light">Editar</button>
        </div>
    </form>
</div>
@endsection