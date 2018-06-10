@extends('layout.base')

@section('content')
    <div class="columns">
        <div class="column">
            <div class="card">
                <div class="column">
                    <p class="title is-2">Modifier la personne</p>
                </div>
                <div class="column is-8 is-offset-2">
                    {!! Form::open(['method' => 'put', 'url' => route('personne.update', $personne)]) !!}


                    {{--

                    @foreach($personne->toArray() as $key => $value)
                        @if($key != 'id' && $key != 'created_at' && $key != 'updated_at')
                            <div class="field is-horizontal">
                                <div class="field-label is-normal">
                                    {!! Form::label($key, str_replace('_', ' ', ucfirst($key)), ['class' => 'label']) !!}
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

                    --}}

                    @include('personne.form', ['personne' => $personne])

                    <div class="field is-grouped is-grouped-centered">
                        <p class="control">
                            <button class="button is-link">Mettre à jour</button>
                        </p>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
