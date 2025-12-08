@extends('layouts.app')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    <!-- FORMULARIO -->
    <div>
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">
                {{ isset($taskToEdit) ? 'Editar Tarea' : 'Agregar Tarea' }}
            </h2>

            <form action="{{ isset($taskToEdit) ? route('tasks.update', $taskToEdit->id) : route('tasks.store') }}"
                  method="POST">
                @csrf
                @if(isset($taskToEdit))
                    @method('PUT')
                @endif

                <!-- Título -->
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                        Título
                    </label>
                    <input type="text"
                           id="title"
                           name="title"
                           value="{{ old('title', $taskToEdit->title ?? '') }}"
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
                              rows="3"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-transparent @error('description') border-red-500 @enderror">{{ old('description', $taskToEdit->description ?? '') }}</textarea>
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
                           value="{{ old('due_date', isset($taskToEdit) && $taskToEdit->due_date ? $taskToEdit->due_date->format('Y-m-d') : '') }}"
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
                               {{ old('is_done', isset($taskToEdit) ? $taskToEdit->is_done : false) ? 'checked' : '' }}
                               class="w-4 h-4 text-teal-600 border-gray-300 rounded focus:ring-teal-500">
                        <span class="ml-2 text-sm text-gray-700">Marcar como completada</span>
                    </label>
                </div>

                <!-- Botones -->
                <div class="flex gap-3">
                    <button type="submit"
                            class="flex-1 bg-teal-600 hover:bg-teal-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200 flex items-center justify-center gap-2">
                        <i class="fas fa-save"></i>
                        {{ isset($taskToEdit) ? 'Actualizar Tarea' : 'Guardar Tarea' }}
                    </button>
                    @if(isset($taskToEdit))
                        <a href="{{ route('tasks.index') }}"
                           class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-200">
                            Cancelar
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <!-- LISTA DE TAREAS -->
    <div>
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Lista de Tareas</h2>
                <span class="bg-teal-600 text-white px-3 py-1 rounded-full text-sm font-semibold">
                    ({{ $avav_tasks->count() }})
                </span>
            </div>

            @if($avav_tasks->isEmpty())
                <div class="text-center py-12 text-gray-500">
                    <i class="fas fa-tasks text-5xl mb-4"></i>
                    <p class="text-lg">No hay tareas registradas</p>
                </div>
            @else
                <div class="space-y-3 max-h-[600px] overflow-y-auto pr-2">
                    @foreach($avav_tasks as $avav_task)
                        <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition duration-200">
                            <div class="flex items-start gap-4">
                                <!-- Información de la Tarea -->
                                <div class="flex-1 min-w-0">
                                    <h3 class="font-semibold text-gray-800 mb-1 {{ $avav_task->is_done ? 'line-through text-gray-500' : '' }}">
                                        {{ $avav_task->title }}
                                    </h3>
                                    @if($avav_task->description)
                                        <p class="text-sm text-gray-600 mb-2">
                                            {{ Str::limit($avav_task->description, 80) }}
                                        </p>
                                    @endif
                                    <div class="flex items-center gap-3 text-xs text-gray-500">
                                        @if($avav_task->due_date)
                                            <span class="flex items-center gap-1">
                                                <i class="far fa-calendar"></i>
                                                {{ $avav_task->due_date->format('d/m/Y') }}
                                            </span>
                                        @endif
                                        <span class="px-2 py-1 rounded-full {{ $avav_task->is_done ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                            {{ $avav_task->is_done ? 'Completada' : 'Pendiente' }}
                                        </span>
                                    </div>
                                </div>

                                <!-- Botones de Acción -->
                                <div class="flex flex-col gap-2">
                                    <a href="{{ route('tasks.edit', $avav_task->id) }}"
                                       class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition duration-200 flex items-center gap-2 whitespace-nowrap">
                                        <i class="fas fa-edit"></i>
                                        Editar
                                    </a>
                                    <form action="{{ route('tasks.destroy', $avav_task->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('¿Eliminar esta tarea?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="w-full bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition duration-200 flex items-center gap-2 whitespace-nowrap">
                                            <i class="fas fa-trash"></i>
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
@endsection
