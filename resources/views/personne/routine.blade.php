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

        <div class="collection-container" data-prototype="{{ form_row($form->action->prototype()) }}">
            {!! form_row($form->action)!!}
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

        (function () {
            'use strict';
            window.addEventListener('load', function () {

                var forms = document.getElementsByClassName('needs-validation');

                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        console.log(form);
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();

        function deleteSubFormAction($prototype) {
            $btnDelete = $('<button type="button"  class="btn btn-danger delete-to-collection"><i class="fas fa-minus"></i></button>');

            $($prototype.find('.form-group.row')[0]).append($btnDelete);

            $btnDelete.click(function (e) {
                $prototype.remove();
                e.preventDefault();
                return false;
            });

        }

        $(document).ready(function () {

            /*
            var btn = "<button type=\"button\" class=\"btn btn-success add-to-collection\"><i class=\"fas fa-plus\"></i></button>";
            $('.collection-container .form-group .row label').wrap('<div class="col-md-2 offset-md-2"></div>')
            $('.collection-container .form-group .row select').wrap('<div class="col-md-6"></div>')
            $('.collection-container .form-group .row input').wrap('<div class="col-md-6"></div>')
            $('body > div.main-content > div.content > div > div > div > div > div > div.col-lg-12 > form > div.collection-container > div > div > div:nth-child(1)').append(btn);
            */
            $('.add-to-collection').on('click', function (e) {
                e.preventDefault();
                var container = $('.collection-container');
                var count = container.children().length;
                var proto = container.data('prototype').replace(/__NAME__/g, count);
                var $p = $($('.collection-container').data('prototype').replace(/__NAME__/g, $('.collection-container').children().length));
                $p.find('label').each(function (index) {
                    var x = $(this);
                    x.wrap('<div class="col-md-2 offset-md-2"></div>');
                });

                $p.find('.subFormAction').each(function (index) {
                    var x = $(this);
                    x.wrap('<div class="col-md-6"></div>');
                });

                deleteSubFormAction($p);

                container.append($p);
            });
        });

    </script>
@endsection