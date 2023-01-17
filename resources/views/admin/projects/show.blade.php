@extends('layouts.admin')

@section('title', $project->title )

@section('content')
    <div class="container mt-5">
        <h6 class="text-center text-primary">{{ $project->type ? $project->type->name : 'Nessuna tipologia' }}</h6>
        <h2 class="text-center mb-3">{{ $project->title }}</h2>
        <div class="d-flex justify-content-between">
            <small>Creato il {{ $project->created_at }}</small>
            <div class="controls">
                <a href="{{ route('admin.projects.index') }}" class="btn btn-primary">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>

                <a href="{{ route('admin.projects.edit', $project->slug) }}" class="btn btn-secondary">
                    <i class="fa-solid fa-pencil"></i>
                </a>

                <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" id="show-delete-btn" button-project-name="{{ $project->title }}"><i class="fa-solid fa-trash"></i></button>
                </form>
            </div>
        </div>
        
        @if ($project->cover_path)
            <div class="text-center">
                <img src="{{ asset('storage/' . $project->cover_path) }}" alt="Cover di {{ $project->title }}" class="show-img">
            </div>
        @endif
        <p class="mt-4">{{ $project->description }}</p>
    </div>

    @include('partials.modal')
@endsection