{{--

@extends('layout.base')

@section('titre')
    · Ajouter une routine
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body sizeCard">
                    <div class="row">

                        @include('layout.title', ['title' => 'Ajouter une routine', 'icon' => 'fa-user'])

                        <div class="col-lg-12">

                            {!! Form::open(['method' => 'post', 'url' => route('personne.routine', ['personne' => $personne]), 'class' => 'needs-validation', 'novalidate']) !!}

                            @include('probleme.form')

                            @include('action.form')


                            <div class="form-row text-center">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Ajouter</button>
                                </div>
                            </div>

                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{!! form($form) !!}

--}}

@extends('layout.base')

@section('titre')
    · Ajouter une routine
@endsection

@section('content')
    @include('layout.headerTop', ['titleHeader' => "Ajouter une routine", 'iconHeader' => 'fa-user'])

    <div class="col-lg-12">
        {!! form_start($form) !!}
        @foreach($form->probleme->getFields() as $key => $value)
            <div class="form-group row justify-content-center">
                <div class="col-2">
                    {!! form_label($form->probleme->$key) !!}
                </div>
                <div class="col-6">
                    {!! form_widget($form->probleme->$key) !!}
                    {!! form_errors($form->probleme->$key) !!}
                </div>
            </div>
        @endforeach

        @foreach($form->action->getFields() as $key => $value)
            <div class="form-group row justify-content-center">
                <div class="col-2">
                    {!! form_label($form->action->$key) !!}
                </div>
                <div class="col-6">
                    {!! form_widget($form->action->$key) !!}
                    {!! form_errors($form->action->$key) !!}
                </div>
            </div>
        @endforeach
        <div class="form-row text-center col-12">
            {!! form_row($form->submit) !!}
        </div>
        {!! form_end($form) !!}
    </div>

    @include('layout.headerBottom')
@endsection

{{--
{!! form_start($form) !!}
        @foreach($form->getFields() as $key => $value)
            @if($key != 'submit')
                <div class="form-group row justify-content-center">

                    <div class="col-2">
                        {!! form_label($form->$key) !!}
                    </div>
                    <div class="col-6">
                        {!! form_widget($form->$key) !!}
                        {!! form_errors($form->$key) !!}
                    </div>
                </div>
            @endif
        @endforeach
        <div class="form-row text-center col-12">
            {!! form_row($form->submit) !!}
        </div>
        {!! form_end($form) !!}
--}}