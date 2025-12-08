<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --teal-600: #0d9488;
            --teal-700: #0f766e;
        }

        body {
            background-color: #f8f9fa;
        }

        .header-gradient {
            background: linear-gradient(135deg, var(--teal-700) 0%, var(--teal-600) 100%);
            color: white;
            padding: 2rem 0;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .tech-logos {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 2rem;
            margin-top: 1rem;
        }

        .tech-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .card {
            border: none;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            border-radius: 12px;
        }

        .task-avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
        }

        .task-avatar.completed {
            background-color: #d1fae5;
            color: #059669;
        }

        .task-avatar.pending {
            background-color: #fef3c7;
            color: #d97706;
        }

        .task-card {
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 0.75rem;
            transition: all 0.2s;
        }

        .task-card:hover {
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            transform: translateY(-2px);
        }

        .btn-edit {
            background-color: #10b981;
            color: white;
            border: none;
        }

        .btn-edit:hover {
            background-color: #059669;
            color: white;
        }

        .btn-delete {
            background-color: #ef4444;
            color: white;
            border: none;
        }

        .btn-delete:hover {
            background-color: #dc2626;
            color: white;
        }

        .btn-primary-custom {
            background-color: var(--teal-600);
            border-color: var(--teal-600);
        }

        .btn-primary-custom:hover {
            background-color: var(--teal-700);
            border-color: var(--teal-700);
        }

        .task-list-container {
            max-height: 600px;
            overflow-y: auto;
            padding-right: 0.5rem;
        }

        .task-list-container::-webkit-scrollbar {
            width: 6px;
        }

        .task-list-container::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .task-list-container::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 10px;
        }

        .task-list-container::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        .badge-count {
            background-color: var(--teal-600);
            padding: 0.35rem 0.75rem;
            border-radius: 50px;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--teal-600);
            box-shadow: 0 0 0 0.25rem rgba(13, 148, 136, 0.25);
        }

        .form-check-input:checked {
            background-color: var(--teal-600);
            border-color: var(--teal-600);
        }
    </style>
</head>

<body>
    <!-- Header con Logos -->
    <div class="header-gradient">
        <div class="container">
            <h1 class="text-center mb-3 fw-bold">Practica 2 Task CRUD AVAV</h1>
        </div>
    </div>

    <!-- Contenido Principal -->
    <div class="container mt-4 mb-5">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
