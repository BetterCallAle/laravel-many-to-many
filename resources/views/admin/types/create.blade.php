@extends('layouts.admin')

@section('title', 'Crea un nuovo tipo')

@section('content')
    <div class="mt-3 container">
        <div class="row justify-content-center">
            <div class="col-5">
                @include('partials.error')
                <form action="{{ route('admin.types.store') }}" method="POST">
                    @csrf
                    
        
                    <div class="mt-4 mb-4">
                        <label for="name" class="form-label">Inserisci il nome della nuova tipologia</label>
                        <input type="text" id="name" class="form-control" name="name">
                    </div>
        
                    <button type="submit" class="btn btn-success">Aggiungi</button>
                    <button type="reset" class="btn btn-secondary">Resetta</button>
                </form>
            </div>
        </div>
    </div>
@endsection