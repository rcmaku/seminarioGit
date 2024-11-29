<!-- resources/views/alumnos/edit.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Edit Alumno</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
<h1>Editar Alumnos</h1>

<form action="{{ route('alumnos.update', $alumno->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre Alumno</label>
        <input type="text" name="nombre" class="form-control" id="nombre" value="{{ $alumno->nombre }}" required>
    </div>
    <div class="mb-3">
        <label for="apellido" class="form-label">Apellido Alumno</label>
        <input type="text" name="apellido" class="form-control" id="apellido" value="{{old('name')}}">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email Alumno</label>
        <input type="text" name="email" class="form-control" id="email" {{old('name')}}>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Regresar</a>
</form>
</body>
</html>
