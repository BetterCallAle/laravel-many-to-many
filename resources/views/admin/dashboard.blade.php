@extends('layouts.admin')

@section('title', 'dashboard')

@section('content')
<div class="container mt-5 py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h6>La dashboard di {{ Auth::user()->name }}</h4>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <p>Bentornato {{ Auth::user()->name }}! Hai correttamente effettuato l'accesso.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
