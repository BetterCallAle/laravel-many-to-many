@extends('layouts.admin')

@section('title', "Tutti i progetti con il tipo $type->name")

@section('content')
    <div class="container">
        <div class="wrapper text-center mt-5">
            <h2 class="mt-3">Tutti i progetti {{ $type->name }}</h2>
            @if (count($projects) > 0)    
                <ul class="mt-5">
                    @foreach ($projects as $project)
                        <li class="mb-2">
                            <a href="{{ route('admin.projects.show', $project->slug) }}">
                                {{ $project->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="mt-5">Non ci sono ancora progetti di tipo {{ $type->name }}</p>
            @endif
        </div>
    </div>
@endsection