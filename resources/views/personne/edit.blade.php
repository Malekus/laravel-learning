@extends('layout.base')

@section('content')
    <div class="columns">
        <div class="column">
            <div class="card">
                <div class="column">
                    <p class="title is-2">Modifier la personne</p>
                </div>
                <div class="column">
                    {!! Form::open() !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
