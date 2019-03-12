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

        @dd($form->action)

        <div class="collection-container" data-prototype="{{ form_row($form->action->prototype()) }}">
            @foreach($form->action->prototype()->getFields() as $key => $value)
                <div class="form-group row justify-content-center">
                    <div class="col-2">
                        {!! form_label($form->action->prototype()->getFields()[$key]) !!}
                    </div>
                    <div class="col-6">
                        {!! form_widget($form->action->prototype()->getFields()[$key]) !!}
                        {!! form_errors($form->action->prototype()->getFields()[$key]) !!}
                    </div>
                </div>
            @endforeach
            <button type="button" class="add-to-collection">Add to collection</button>
        </div>

        <div class="form-row text-center col-12">
            {!! form_row($form->submit) !!}
        </div>
        {!! form_end($form) !!}
    </div>

    @include('layout.headerBottom')
@endsection

@section('javascript')
    <script>
        $(document).ready(function () {
            $('.add-to-collection').on('click', function (e) {
                e.preventDefault();
                var container = $('.collection-container');
                var count = container.children().length;
                var proto = container.data('prototype').replace(/__NAME__/g, count);
                container.append(proto);
            });
        });
    </script>
@endsection