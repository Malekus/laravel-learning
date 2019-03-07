@extends('layout.base')

@section('titre')
    · Ajouter une personne
@endsection

@section('content')
    @include('layout.headerTop', ['titleHeader' => "Ajouter une personne", 'iconHeader' => 'fa-user'])
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
        <div class="form-row text-center col-12">
            {!! form_row($form->submit) !!}
        </div>
        {!! form_end($form) !!}
    </div>
    @include('layout.headerBottom')
@endsection