@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Task List</h2>
<div class="row">
    <div class="col-md-6">
        <div class="mb-3 d-flex justify-content-start">
            <a href="{{ route('tasks.index') }}" class="btn btn-info mx-2">All Tasks</a>
            <a href="{{ route('tasks.index', ['completed' => 1]) }}" class="btn btn-success mx-2">Completed Tasks</a>
            <a href="{{ route('tasks.index', ['completed' => 0]) }}" class="btn btn-warning mx-2">Incomplete Tasks</a>
            
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3 d-flex justify-content-end">
            <a href="{{ route('tasks.create') }}" class="btn btn-primary">Create New Task</a>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <table class="table">
            <h3>Table of Tasks</h3>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Mark as Completed</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <td>{{ $task->id }}</td>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>
                            @if(!$task->completed)
                                <form action="{{ route('tasks.complete', $task->id) }}" method="POST" class="d-inline">
                                    @method('PUT')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-success">Mark as Completed</button>
                                </form>
                            @else
                                <span class="badge bg-success">Completed</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('tasks.edit', ['task' => $task]) }}" class="btn btn-sm btn-outline-info ml-1">Edit</a>
                                <form class="ml-1" action="{{ route('tasks.destroy', ['task' => $task]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger ml-1" onclick="return confirm('Are You Sure?')">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination Links -->
        {{ $tasks->links() }}
    </div>
</div>

 
</div>
@endsection
