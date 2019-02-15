@extends('layout.base')

@section('titre')
    · Ajouter une personne
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body sizeCard">
                    <div class="row">
                        <div class="col-12 pb-2">
                            <h1><i class="fas fa-user mr-3"></i>Ajouter une personne</h1>
                        </div>
                        <div class="col-lg-12">
                            {!! Form::open(['url' => route('personne.store'), 'class' => 'needs-validation', 'novalidate']) !!}

                            @include('personne.form')

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
        </script>
@endsection

