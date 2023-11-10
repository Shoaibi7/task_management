
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="mb-3 d-flex justify-content-end">
                    <a href="{{ route('tasks.index') }}" class="btn btn-info mx-2">All Tasks</a>
                </div>
            
                <h1>Edit Task</h1>
            
                <form action="{{ route('tasks.update', ['task' => $task]) }}" method="POST">
                    @csrf
                    @method('PUT')
            
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $task->title) }}" >
                        
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description">{{ old('description', $task->description) }}</textarea>
                    </div>
            
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
