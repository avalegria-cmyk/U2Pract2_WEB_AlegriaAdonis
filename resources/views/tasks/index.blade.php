@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Lista de Tareas</h2>
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">+ Nueva Tarea</a>
    </div>

    @if($avav_tasks->isEmpty())
        <div class="alert alert-info">No hay tareas registradas</div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                        <th>Fecha Límite</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($avav_tasks as $avav_task)
                        <tr>
                            <td>{{ $avav_task->title }}</td>
                            <td>{{ Str::limit($avav_task->description, 50) }}</td>
                            <td>
                                @if($avav_task->is_done)
                                    <span class="badge bg-success">Completada</span>
                                @else
                                    <span class="badge bg-warning text-dark">Pendiente</span>
                                @endif
                            </td>
                            <td>
                                {{ $avav_task->due_date ? $avav_task->due_date->format('d/m/Y') : '-' }}
                            </td>
                            <td>
                                <a href="{{ route('tasks.edit', $avav_task->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                <form action="{{ route('tasks.destroy', $avav_task->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('¿Eliminar esta tarea?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection