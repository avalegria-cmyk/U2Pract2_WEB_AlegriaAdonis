@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="card-title mb-0 fw-bold">Crear Nueva Tarea</h2>
                    <a href="{{ route('tasks.index') }}" class="text-decoration-none">
                        <i class="fas fa-arrow-left me-2"></i>Volver
                    </a>
                </div>

                <form action="{{ route('tasks.store') }}" method="POST">
                    @csrf

                    <!-- Título -->
                    <div class="mb-3">
                        <label for="title" class="form-label fw-medium">Título *</label>
                        <input type="text"
                               class="form-control @error('title') is-invalid @enderror"
                               id="title"
                               name="title"
                               value="{{ old('title') }}"
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
                                  rows="4">{{ old('description') }}</textarea>
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
                               value="{{ old('due_date') }}">
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
                                   {{ old('is_done') ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_done">
                                Marcar como completada
                            </label>
                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary-custom">
                            <i class="fas fa-save me-2"></i>
                            Guardar Tarea
                        </button>
                        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times me-2"></i>
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
