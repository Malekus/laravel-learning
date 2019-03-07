@extends('layout.base')

@section('titre')
    · Ajouter un problème
@endsection

@section('content')
    @include('layout.headerTop', ['titleHeader' => "Ajouter un problème", 'iconHeader' => 'fa-exclamation-triangle'])
    <div class="col-lg-12">
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
        <div class="form-row text-center col-">
            {!! form_row($form->submit) !!}
        </div>
        {!! form_end($form) !!}
    </div>
    @include('layout.headerBottom')
@endsection

{{--

    <div class="row">
        <div class="col-12">
            <div class="card sizeCard">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 pb-2">
                            <h1>Ajouter une problème</h1>
                        </div>

                        <div class="col-lg-12">
                            {!! Form::open(['url' => route('probleme.store', ['type' => $type, 'id' => $id]), 'class' => 'needs-validation', 'novalidate']) !!}

                            @include('probleme.form')

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
--}}



