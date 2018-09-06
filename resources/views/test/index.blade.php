@extends('layout.base')

@section('titre')
    Test
@endsection

@section('content')

    {{ $personne->problemes }}


    {{ $config->logement }}

@endsection

