@extends('layouts.admin')

@section('title', 'Aggiugni un nuovo progetto')

@section('content')
    <div class="container">
        <h2 class="mt-3 mb-3 text-center">Aggiungi un nuovo progetto</h2>

        @include('partials.error')

        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Inserisci il titolo del progetto</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
                @error('title')    
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="types" class="form-label">Seleziona la tipologia del progetto</label>
                <select name="type_id" id="types" class="form-select w-25">
                    <option value="">Nessuna tipologia</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" @selected(old('type_id') == $type->id)>{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                @forelse ($technologies as $technology)
                    <input type="checkbox" id="{{ $technology->slug }}" name="technologies[]" class="form-check-input" value="{{ $technology->id }}">
                    <label for="{{ $technology->slug }}" class="form-check-label me-3">{{ $technology->name }}</label>
                @empty
                    <p>Non ci sono ancora tecnologie da poter selezionare.</p>
                @endforelse
            </div>

            <div class="mb-3">
                <label for="cover_path" class="form-label">Inserisci l'immagine della cover</label>
                <input type="file" id="cover_path" name="cover_path" class="form-control @error('cover_path') is-invalid @enderror">

                @error('cover_path')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                
                <div class="text-center mt-3">
                    <img src="" alt="" id="preview-img" class="mb-3 show-img">
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Inserisci la descrizione</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') }}</textarea>
                @error('description')    
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Aggiungi</button>
            <button type="reset" class="btn btn-danger">Resetta</button>
        </form>
    </div>
@endsection