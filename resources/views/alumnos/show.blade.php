<!DOCTYPE html>
<html>
<head>
    <title>Alumno Detalle</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
<h1>Alumno Detalle</h1>
<p><strong>ID:</strong> {{ $alumno->id }}</p>
<p><strong>Nombre:</strong> {{ $alumno->name }}</p>


<a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Menu</a>
<a href="{{ route('alumnos.edit', $alumno->id) }}" class="btn btn-warning">Edit</a>

</body>
</html>
