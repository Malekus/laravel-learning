@extends('layout.base')

@section('content')
    <div class="columns">
        <div class="column">
            <div class="card">
                <div class="column">
                    <p class="title is-2">Ajouter une personne</p>
                </div>
                <div class="column is-8 is-offset-2">
                    {!! Form::open(['url' => route('personne.store')]) !!}

                    @include('personne.form')

                    <div class="field is-grouped is-grouped-centered">
                        <p class="control">
                            <button class="button is-link">Ajouter</button>
                        </p>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
