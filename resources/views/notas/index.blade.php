<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Notas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('partials.navbar') <!-- Incluye el menú de navegación -->

    <div class="container mt-4">
        <h1>Notas</h1>
        <a href="{{ route('notas.create') }}" class="btn btn-primary mb-3">Agregar Nota</a>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nota</th>
                        <th>Materia</th>
                        <th>Estudiante</th>
                        <th>Curso</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($notas as $nota)
                        <tr>
                            <td>{{ $nota->id }}</td>
                            <td>{{ $nota->nota }}</td>
                            <td>{{ $nota->materia->nombre }}</td>
                            <td>{{ $nota->estudiante->nombre }}</td>
                            <td>{{ $nota->materia->curso->nombre }}</td>
                            <td>
                                <a href="{{ route('notas.edit', $nota->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('notas.destroy', $nota->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
