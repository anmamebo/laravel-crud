<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>EPD3 - TAD</title>
</head>

<body>

    <!-- CONTENIDO ESTÁTICO PARA TODAS LAS SECCIONES -->
    <h1>EPD3 OPERACIONES CRUD.</h1>

    <!-- CONTENIDO DINÁMICO EN FUNCIÓN DE LA SECCIÓN QUE SE VISITA -->
    <div>
        @yield('apartado')
    </div>

</body>

</html>