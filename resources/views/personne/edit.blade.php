@extends('layout.base')

@section('titre')
    · Modifier une personne
@endsection

@section('content')
    @include('layout.headerTop', ['titleHeader' => "Modifier une personne"])

    <div class="col-lg-12">
        {!! Form::open(['method' => 'put', 'url' => route('personne.update', $personne), 'class' => 'needs-validation', 'novalidate']) !!}

        @include('personne.form', ['personne' => $personne])

        {!! Form::close() !!}
    </div>

    @include('layout.headerBottom')
@endsection

