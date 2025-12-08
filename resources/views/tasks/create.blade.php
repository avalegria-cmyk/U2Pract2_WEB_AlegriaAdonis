@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Crear Nueva Tarea</h2>
            <a href="{{ route('tasks.index') }}"
               class="text-teal-600 hover:text-teal-700 flex items-center gap-2">
                <i class="fas fa-arrow-left"></i>
                Volver
            </a>
        </div>

        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf

            <!-- Título -->
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                    Título *
                </label>
                <input type="text"
                       id="title"
                       name="title"
                       value="{{ old('title') }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-transparent @error('title') border-red-500 @enderror"
                       required>
                @error('title')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Descripción -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                    Descripción
                </label>
                <textarea id="description"
                          name="description"
                          rows="4"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-transparent @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Fecha Límite -->
            <div class="mb-4">
                <label for="due_date" class="block text-sm font-medium text-gray-700 mb-2">
                    Fecha Límite
                </label>
                <input type="date"
                       id="due_date"
                       name="due_date"
                       value="{{ old('due_date') }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-transparent @error('due_date') border-red-500 @enderror">
                @error('due_date')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Estado -->
            <div class="mb-6">
                <label class="flex items-center">
                    <input type="checkbox"
                           name="is_done"
                           value="1"
                           {{ old('is_done') ? 'checked' : '' }}
                           class="w-4 h-4 text-teal-600 border-gray-300 rounded focus:ring-teal-500">
                    <span class="ml-2 text-sm text-gray-700">Marcar como completada</span>
                </label>
            </div>

            <!-- Botones -->
            <div class="flex gap-3">
                <button type="submit"
                        class="bg-teal-600 hover:bg-teal-700 text-white font-semibold py-2 px-6 rounded-lg transition duration-200 flex items-center gap-2">
                    <i class="fas fa-save"></i>
                    Guardar Tarea
                </button>
                <a href="{{ route('tasks.index') }}"
                   class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-6 rounded-lg transition duration-200 flex items-center gap-2">
                    <i class="fas fa-times"></i>
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
