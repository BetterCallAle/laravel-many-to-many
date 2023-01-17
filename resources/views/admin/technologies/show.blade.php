@extends('layouts.admin')

@section('title', "Tutti i progetti con tecnologia $technology->name")

@section('content')
    <div class="container">
        <h2 class="text-center my-4">Tutti i progetti con tecnologia {{ $technology->name }}</h2>
        <ul class="text-center">
            @forelse ($technology->projects as $project)
                <li class="mb-3">
                    <a href="{{ route('admin.projects.show', $project->slug) }}">
                        {{ $project->title }}
                    </a>
                </li>
            @empty
                <p>Non ci sono ancora progetti con la tecnologia {{ $technology->name }}</p>
            @endforelse
        </ul>
    </div>
@endsection