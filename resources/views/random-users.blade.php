<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios Aleatorios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        document.addEventListener('DOMContentLoaded', async function() {
            try {
                const response = await fetch('/api/random-users');
                const data = await response.json();

                const users = data.users;
                const mostFrequentLetter = data.most_frequent_letter;

                let output = '<h2>Usuarios Aleatorios</h2>';
                output += `<p>Letra más frecuente en los nombres: <strong>${mostFrequentLetter}</strong></p>`;
                output += '<div class="table-responsive">';
                output += '<table class="table table-striped">';
                output += '<thead><tr><th>Foto</th><th>Nombre Completo</th><th>Email</th></tr></thead>';
                output += '<tbody>';

                users.forEach(user => {
                    output += `
                        <tr>
                            <td><img src="${user.picture.medium}" alt="Foto de ${user.name.first}" class="img-thumbnail" style="width: 80px;"></td>
                            <td>${user.name.first} ${user.name.last}</td>
                            <td>${user.email}</td>
                        </tr>
                    `;
                });

                output += '</tbody></table></div>';
                document.getElementById('users-container').innerHTML = output;
            } catch (error) {
                console.error('Error fetching users:', error);
                document.getElementById('users-container').innerHTML = '<p class="text-danger">Error al cargar los datos.</p>';
            }
        });
    </script>
</head>
<body>
    @include('partials.navbar') <!-- Menú de navegación -->
    
    <header class="bg-primary text-white p-3">
        <div class="container">
            <h1>Usuarios Aleatorios</h1>
        </div>
    </header>
    
    <div class="container mt-4" id="users-container"></div>
</body>
</html>
