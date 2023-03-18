@extends('app')

@section('apartado')
@if(session('mensaje'))
<div style="color: green;">{{ session('mensaje') }}</div>
@endif

<div class="container">
    <h3 class="container-title pb-4 px-5">Crear Gerente</h3>

    @if($errors->any())
    <div class="alert alert-danger px-5 align-items-center">
        @foreach($errors->all() as $error)
        <p class="m-0">{{ $error }}</p>
        @endforeach
    </div>
    @endif

    <form action="{{ route('gerentes.create') }}" method="post" class="row g-3 px-5 py-3">
        @csrf
        <div class="mb-3 col-md-5">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control bg-dark text-white" name="nombre" id="nombre" required>
        </div>

        <div class="mb-3 col-md-5">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input type="text" class="form-control bg-dark text-white" name="apellidos" id="apellidos" required>
        </div>

        <div class="mb-3 col-md-2">
            <label for="edad" class="form-label">Edad</label>
            <input type="number" class="form-control bg-dark text-white" name="edad" id="edad" required>
        </div>

        <div class="mb-3 col-md-12">
            <label for="telefonos" class="form-label">Telefono</label>
            <div id="telefonos">
                <div class="mb-2">
                    <input type="tel" class="form-control bg-dark text-white" name="telefonos[]" id="telefonos">
                </div>
            </div>
            <button type="button" class="btn btn-light" id="addTelefono">Añadir teléfono</button>
        </div>

        <script>
            const addTelefonoBtn = document.getElementById('addTelefono');
            const telefonosDiv = document.getElementById('telefonos');

            addTelefonoBtn.addEventListener('click', () => {
                const telefonoDiv = document.createElement('div');
                telefonoDiv.classList.add('mb-2')
                const telefonoInput = document.createElement('input');
                telefonoInput.classList.add('form-control', 'bg-dark', 'text-white')
                telefonoInput.type = 'tel';
                telefonoInput.name = 'telefonos[]';
                telefonoInput.required = true;

                telefonoDiv.appendChild(telefonoInput);
                telefonosDiv.appendChild(telefonoDiv);
            });
        </script>

        <div class="mb-3 col-md-12">
            <label for="salario" class="form-label">Salario</label>
            <input type="number" step="any" class="form-control bg-dark text-white" name="salario" id="salario" required>
        </div>

        <div class="mb-3 col-md-12">
            <button type="submit" class="btn btn-light">Crear</button>
        </div>
    </form>
</div>
@endsection