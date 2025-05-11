@extends('layouts.app')

@section('title', 'My Tasks')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>My Tasks</h1>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary">Create New Task</a>
</div>

<div class="row">
    @forelse($tasks as $task)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $task->title }}</h5>
                    <p class="card-text">{{ $task->description }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="badge bg-{{ $task->status === 'completed' ? 'success' : ($task->status === 'in_progress' ? 'warning' : 'secondary') }}">
                            {{ ucfirst($task->status) }}
                        </span>
                        <div class="btn-group">
                            <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-info">
                No tasks found. <a href="{{ route('tasks.create') }}">Create your first task</a>!
            </div>
        </div>
    @endforelse
</div>
@endsection
