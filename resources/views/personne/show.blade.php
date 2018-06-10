@extends('layout.base')

@section('content')
    <div class="columns">
        <div class="column">
            <div class="card">
                <div class="column">
                    <p class="title is-2">{{ $personne->nom }} {{ $personne->prenom }}</p>
                </div>

            </div>
        </div>
    </div>
@endsection
