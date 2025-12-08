@extends('layouts.app')

@section('content')
<div class="row g-4">
    <!-- COLUMNA IZQUIERDA: FORMULARIO -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body p-4">
                <h2 class="card-title mb-4 fw-bold">
                    {{ isset($taskToEdit) ? 'Editar Tarea' : 'Agregar Tarea' }}
                </h2>

                <form action="{{ isset($taskToEdit) ? route('tasks.update', $taskToEdit->id) : route('tasks.store') }}"
                      method="POST">
                    @csrf
                    @if(isset($taskToEdit))
                        @method('PUT')
                    @endif

                    <!-- Título -->
                    <div class="mb-3">
                        <label for="title" class="form-label fw-medium">Título</label>
                        <input type="text"
                               class="form-control @error('title') is-invalid @enderror"
                               id="title"
                               name="title"
                               value="{{ old('title', $taskToEdit->title ?? '') }}"
                               required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Descripción -->
                    <div class="mb-3">
                        <label for="description" class="form-label fw-medium">Descripción</label>
                        <textarea class="form-control @error('description') is-invalid @enderror"
                                  id="description"
                                  name="description"
                                  rows="3">{{ old('description', $taskToEdit->description ?? '') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Fecha Límite -->
                    <div class="mb-3">
                        <label for="due_date" class="form-label fw-medium">Fecha Límite</label>
                        <input type="date"
                               class="form-control @error('due_date') is-invalid @enderror"
                               id="due_date"
                               name="due_date"
                               value="{{ old('due_date', isset($taskToEdit) && $taskToEdit->due_date ? $taskToEdit->due_date->format('Y-m-d') : '') }}">
                        @error('due_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Estado -->
                    <div class="mb-4">
                        <div class="form-check">
                            <input class="form-check-input"
                                   type="checkbox"
                                   id="is_done"
                                   name="is_done"
                                   value="1"
                                   {{ old('is_done', isset($taskToEdit) ? $taskToEdit->is_done : false) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_done">
                                Marcar como completada
                            </label>
                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary-custom flex-grow-1">
                            <i class="fas fa-save me-2"></i>
                            {{ isset($taskToEdit) ? 'Actualizar Tarea' : 'Guardar Tarea' }}
                        </button>
                        @if(isset($taskToEdit))
                            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">
                                Cancelar
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- LISTA DE TAREAS -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="card-title mb-0 fw-bold">Lista de Tareas</h2>
                    <span class="badge badge-count text-white">
                        ({{ $avav_tasks->count() }})
                    </span>
                </div>

                @if($avav_tasks->isEmpty())
                    <div class="text-center py-5 text-muted">
                        <i class="fas fa-tasks fa-4x mb-3 opacity-50"></i>
                        <p class="fs-5">No hay tareas registradas</p>
                    </div>
                @else
                    <div class="task-list-container">
                        @foreach($avav_tasks as $avav_task)
                            <div class="task-card">
                                <div class="d-flex gap-3">
                                    <!-- Información de la Tarea -->
                                    <div class="flex-grow-1">
                                        <h5 class="mb-1 {{ $avav_task->is_done ? 'text-decoration-line-through text-muted' : '' }}">
                                            {{ $avav_task->title }}
                                        </h5>
                                        @if($avav_task->description)
                                            <p class="text-muted small mb-2">
                                                {{ Str::limit($avav_task->description, 80) }}
                                            </p>
                                        @endif
                                        <div class="d-flex gap-2 align-items-center small text-muted">
                                            @if($avav_task->due_date)
                                                <span>
                                                    <i class="far fa-calendar me-1"></i>
                                                    {{ $avav_task->due_date->format('d/m/Y') }}
                                                </span>
                                            @endif
                                            <span class="badge {{ $avav_task->is_done ? 'bg-success' : 'bg-warning text-dark' }}">
                                                {{ $avav_task->is_done ? 'Completada' : 'Pendiente' }}
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Botones de Acción -->
                                    <div class="d-flex flex-column gap-2">
                                        <a href="{{ route('tasks.edit', $avav_task->id) }}"
                                           class="btn btn-edit btn-sm">
                                            <i class="fas fa-edit me-1"></i>
                                            Editar
                                        </a>
                                        <form action="{{ route('tasks.destroy', $avav_task->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('¿Eliminar esta tarea?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-delete btn-sm w-100">
                                                <i class="fas fa-trash me-1"></i>
                                                Borrar
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
