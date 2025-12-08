<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager CRUD</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gray-50">
    <!-- Header con Logos -->
    <div class="bg-gradient-to-r from-teal-700 to-teal-600 text-white py-8">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold text-center mb-4">Task Manager CRUD</h1>
        </div>
    </div>

    <!-- Contenido Principal -->
    <div class="container mx-auto px-4 py-8">
        @if(session('success'))
            <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
                <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.remove()">
                    <span class="text-2xl">&times;</span>
                </button>
            </div>
        @endif

        @yield('content')
    </div>

    <script>
        // Confirmación de eliminación
        function confirmDelete(event) {
            if (!confirm('¿Estás seguro de eliminar esta tarea?')) {
                event.preventDefault();
            }
        }
    </script>
</body>

</html>
