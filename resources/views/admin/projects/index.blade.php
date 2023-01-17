@extends('layouts.admin')

@section('title', 'Tutti i progetti')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center  mb-3">Tutti i progetti</h2>
        <div class="control text-end  mb-3">
            <a href="{{ route('admin.projects.create') }}" class="btn btn-success">
                <i class="fa-solid fa-plus"></i>
            </a>
        </div>

        @include('partials.message')

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Titolo</th>
                    <th scope='col'>Tipologia</th>
                    <th scope="col">Data di creazione</th>
                    <th scope="col">Immagini</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <th scope="row">{{ $project->title }}</th>
                        <td>{{ $project->type ? $project->type->name : 'Nessuna tipologia'}}</th>
                        <td>{{ $project->created_at }}</td>
                        <td>
                            @if ($project->cover_path)
                                <img src="{{ asset('storage/' . $project->cover_path) }}" alt="Cover di {{ $project->title }}" class="table-image w-50">
                            @else
                                <div class="w-50 text-center bg-secondary py-3 text-light">
                                    <span>Nessuna immagine disponibile</span>
                                </div>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.projects.show', $project->slug) }}" class="btn btn-success">
                                <i class="fa-solid fa-eye"></i>
                            </a>

                            <a href="{{ route('admin.projects.edit', $project->slug) }}" class="btn btn-secondary">
                                <i class="fa-solid fa-pencil"></i>
                            </a>

                            <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger delete-btn" button-name="{{ $project->title }}">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
          @include('partials.modal')
    </div>

@endsection