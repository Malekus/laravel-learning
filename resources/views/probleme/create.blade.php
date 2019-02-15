@extends('layout.base')

@section('titre')
    · Ajouter un problème
@endsection

@section('content')
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

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('javascript')
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
    'use strict';
    window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
    form.addEventListener('submit', function(event) {
    if (form.checkValidity() === false) {
    event.preventDefault();
    event.stopPropagation();
    }
    form.classList.add('was-validated');
    }, false);
    });
    }, false);
    })();
@endsection

