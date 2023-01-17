@extends('layouts.admin')

@section('title', "Tutti i progetti con il tipo $type->name")

@section('content')
    <div class="container">
        <div class="wrapper text-center mt-5">
            <h2 class="my-4">Tutti i progetti {{ $type->name }}</h2>
            <ul>
                @forelse ($type->projects as $project)
                    <li class="mb-3">
                        <a href="{{ route('admin.projects.show', $project->slug) }}">{{ $project->title }}</a>
                    </li>
                @empty
                    <p>Non ci sono ancora progetti di tipo {{ $type->name }}</p>
                @endforelse
            </ul>
        </div>
    </div>
@endsection