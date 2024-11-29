<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Queue Alumnos</title>
</head>
<body>
<h1>List of Alumnos</h1>
<ul>
    @foreach ($alumnos as $alumno)
        <li>{{ $alumno->id }} - {{ $alumno->nombre }}</li>
    @endforeach
</ul>
</body>
</html>
