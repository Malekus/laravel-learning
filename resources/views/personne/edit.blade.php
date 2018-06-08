@extends('layout.base')

@section('content')
    <div class="columns">
        <div class="column">
            <div class="card">
                <div class="column">
                    <p class="title is-2">Modifier la personne</p>
                </div>
                <div class="column is-centered">
                    {!! Form::open(['method' => 'put', 'url' => route('personne.update', $personne)]) !!}
                    @foreach($personne->toArray() as $key => $value)
                        @if($key != 'id' && $key != 'created_at' && $key != 'updated_at')
                            <div class="field is-horizontal">
                                <div class="field-label is-normal">
                                    {!! Form::label($key, ucfirst($key), ['class' => 'label']) !!}
                                </div>
                                <div class="field-body">
                                    <div class="field">
                                        <p class="control">
                                            {!! Form::text($key, $value, ['class' => 'input']) !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <button class="button is-link">Mettre à jour</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection


{{--
<div class="field is-horizontal">
    <div class="field-label is-normal">
        {!! Form::label('nom', 'Nom', ['class' => 'label']) !!}
    </div>
    <div class="field-body">
        <div class="field">
            <p class="control">
                {!! Form::text('nom', $personne->nom, ['class' => 'input']) !!}
            </p>
        </div>
    </div>
</div>
--}}