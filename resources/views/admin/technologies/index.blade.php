@extends('layouts.admin')

@section('title', 'Tutte le tecnologie')

@section('content')
    <div class="container">
        <h2 class="mt-4 mb-4 text-center">Tutte le tecnologie</h2>

        @include('partials.message')
        @include('partials.error')
        
        <div class="row justify-content-between">
            <div class="col-5">
                <form action="{{ route('admin.technologies.store') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Aggiungi una nuova tecnologia" name="name">
                        <button class="btn btn-outline-primary" type="submit">Aggiungi</button>
                    </div>
                </form>
            </div>

            <div class="col-6">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Nome Tecnologia</th>
                        <th scope="col">Numero progetti</th>
                        <th scope="col">Azioni</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($technologies as $technology)
                        <tr>
                            <th scope="row">
                                <form id="form-{{ $technology->slug }}" action="{{ route('admin.technologies.update', $technology->slug) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="name" class="form-control border-0" value="{{ $technology->name }}">
                                </form>
                            </th>
                            <td>{{ $technology->projects->count() }}</td>
                            <td>
                                <a href="{{ route('admin.technologies.show', $technology->slug) }}" class="btn btn-success">
                                    <i class="fa-solid fa-eye"></i>
                                </a>

                                <button type="sumbit" form="form-{{ $technology->slug }}" class="btn btn-warning">
                                    <i class="fa-solid fa-pencil"></i>
                                </button>

                                <form action="{{ route('admin.technologies.destroy', $technology->slug) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger delete-btn" button-name="{{ $technology->name }}">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <span>Nessuna tecnologia</span>
                        @endforelse
                    </tbody>
                  </table>
            </div>
        </div>

        @include('partials.modal')
    </div>
@endsection