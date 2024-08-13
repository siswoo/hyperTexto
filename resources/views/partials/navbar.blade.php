<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Gestión Escolar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('estudiantes.index') }}">Estudiantes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('cursos.index') }}">Cursos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('materias.index') }}">Materias</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('notas.index') }}">Notas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/random-users') }}">Usuarios Aleatorios</a>
            </li>
        </ul>
    </div>
</nav>
