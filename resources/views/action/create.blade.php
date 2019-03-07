@extends('layout.base')
{{--



@section('titre')
    · Ajouter un rendez-vous
@endsection

@section('content')
    @include('layout.headerTop', ['titleHeader' => "Ajouter un rendez-vous", 'iconHeader' => 'fa-cogs'])
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



--}}







@section('titre')
    · Ajouter un rendez-vous
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body sizeCard">
                    <div class="row">
                        <div class="col-12 pb-2">
                            <h1><i class="fas fa-user mr-3"></i>Ajouter un rendez-vous</h1>
                        </div>
                        <div class="col-lg-12">
                            {!! Form::open(['method'=> 'post', 'url' => route('action.store'), 'novalidate']) !!}

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


@section('javascript')
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict';
            window.addEventListener('load', function () {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
@endsection

{{--

 'class' => 'needs-validation',

--}}