@extends('layouts.admin')

@section('title', 'Tutte le tipologie')

@section('content')
    <div class="container">
        <h2 class="mt-4 mb-4 text-center">Tutte le tipologie</h2>
        <div class="row justify-content-center">
            <div class="col-4">
                
                @include('partials.message')

                <div class="text-end">
                    <a href="{{ route('admin.types.create') }}" class="btn btn-success ">
                        <i class="fa-solid fa-plus"></i>
                    </a>
                </div>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Tipo</th>
                        <th scope="col">Numero di progetti</th>
                        <th scope="col">Azioni</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($types as $type)    
                            <tr>
                                <th scope="row">{{ $type->name }}</th>
                                <td class="text-center">{{ $type->projects->count() }}</td>
                                <td>
                                    <a href="{{ route('admin.types.show', $type->slug) }}" class="btn btn-success">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>

                                    <a href="{{ route('admin.types.edit', $type->slug) }}" class="btn btn-secondary">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>

                                    <form action="{{ route('admin.types.destroy', $type->slug) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger delete-btn" button-name="{{ $type->name }}">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                      <tr>
                    </tbody>
                  </table>
            </div>
        </div>

        @include('partials.modal')
    </div>
@endsection