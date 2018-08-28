@extends('layout.base')

@section('titre')
    Test
@endsection

@section('content')


    <div class="col-lg-12">
        {!! Form::open(['url' => route('test.form'), 'class' => 'needs-validation', 'novalidate']) !!}

        <div class="form-group row justify-content-center">
            {!! Form::label('categorie', 'Catégorie', ['class' => 'col-lg-2 col-form-label']) !!}
            <div class="col-lg-6">
                {!! Form::select('categorie', $config, null,['class' => 'form-control', 'required']) !!}
                <div class="invalid-feedback">
                    Saisir une catégorie
                </div>
            </div>
        </div>

        <div class="form-group row justify-content-center">
            {!! Form::label('type', 'Type', ['class' => 'col-lg-2 col-form-label']) !!}
            <div class="col-lg-6">
                {!! Form::select('type', $config, null,['class' => 'form-control', 'required']) !!}
                <div class="invalid-feedback">
                    Saisir une type
                </div>
            </div>
        </div>

        <div class="form-row text-center">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
        </div>

        {!! Form::close() !!}
    </div>
@endsection

