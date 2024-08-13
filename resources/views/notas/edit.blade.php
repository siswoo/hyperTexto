<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Nota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('partials.navbar') <!-- Incluye el menú de navegación -->

    <div class="container mt-4">
        <h1 class="mb-4">Editar Nota</h1>

        <form action="{{ route('notas.update', $nota->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nota" class="form-label">Nota</label>
                <input type="number" class="form-control @error('nota') is-invalid @enderror" id="nota" name="nota" value="{{ old('nota', $nota->nota) }}" required>
                @error('nota')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="materia_id" class="form-label">Materia</label>
                <select class="form-select @error('materia_id') is-invalid @enderror" id="materia_id" name="materia_id" required>
                    @foreach($materias as $materia)
                        <option value="{{ $materia->id }}" {{ $nota->materia_id == $materia->id ? 'selected' : '' }}>
                            {{ $materia->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('materia_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="estudiante_id" class="form-label">Estudiante</label>
                <select class="form-select @error('estudiante_id') is-invalid @enderror" id="estudiante_id" name="estudiante_id" required>
                    @foreach($estudiantes as $estudiante)
                        <option value="{{ $estudiante->id }}" {{ $nota->estudiante_id == $estudiante->id ? 'selected' : '' }}>
                            {{ $estudiante->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('estudiante_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
