<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
</head>

<body>
    <ul>
        @foreach ($personas as $persona)
        <li>{{ $persona }}</li>
        @endforeach
    </ul>
</body>

</html>