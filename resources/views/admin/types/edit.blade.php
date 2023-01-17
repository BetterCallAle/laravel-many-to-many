@extends('layouts.admin')

@section('title', "Modifica $type->name")

@section('content')
    <div class="container mt-3">
        <h2 class="text-center">Stai modificando{{ $type->name }}</h2>
        <div class="row justify-content-center">
            <div class="col-5">
                @include('partials.error')

                <form action="{{ route('admin.types.update', $type->slug) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mt-4 mb-4">
                        <label for="name" class="form-label">Inserisci il nome della nuova tipologia</label>
                        <input type="text" id="name" class="form-control" name="name" value="{{ old('name', $type->name) }}">
                    </div>
        
                    <button type="submit" class="btn btn-success">Aggiungi</button>
                    <button type="reset" class="btn btn-secondary">Resetta</button>
                </form>
            </div>
        </div>
    </div>
@endsection