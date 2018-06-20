@extends('layout.base')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h1>Ajouter une personne</h1>
                        </div>
                        <div class="col-lg-12">
                            {!! Form::open(['url' => route('personne.store'), 'class' => 'needs-validation', 'novalidate']) !!}

                            <div class="form-group row justify-content-center">
                                {!! Form::label('nom', 'Nom', ['class' => 'col-lg-2 col-form-label']) !!}
                                <div class="col-lg-6">
                                    {!! Form::text('nom', null, ['class' => 'form-control', 'required']) !!}
                                    <div class="invalid-feedback">
                                        Saisir un nom
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