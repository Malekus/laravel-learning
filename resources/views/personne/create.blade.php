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

                            <div class="form-group row justify-content-center">
                                {!! Form::label('prenom', 'Prénom', ['class' => 'col-lg-2 col-form-label']) !!}
                                <div class="col-lg-6">
                                    {!! Form::text('prenom', null, ['class' => 'form-control', 'required']) !!}
                                    <div class="invalid-feedback">
                                        Saisir un nom
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                {!! Form::label('date_naissance', 'Date de naissance', ['class' => 'col-lg-2 col-form-label']) !!}
                                <div class="col-lg-6">
                                    {!! Form::text('date_naissance', null, ['class' => 'form-control', 'required']) !!}
                                    <div class="invalid-feedback">
                                        Saisir un nom
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                {!! Form::label('sexe', 'Sexe', ['class' => 'col-lg-2 col-form-label']) !!}
                                <div class="col-lg-6">
                                    {!! Form::text('sexe', null, ['class' => 'form-control', 'required']) !!}
                                    <div class="invalid-feedback">
                                        Saisir un nom
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                {!! Form::label('enfant', 'Enfant', ['class' => 'col-lg-2 col-form-label']) !!}
                                <div class="col-lg-6">
                                    {!! Form::text('enfant', null, ['class' => 'form-control', 'required']) !!}
                                    <div class="invalid-feedback">
                                        Saisir un nom
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                {!! Form::label('csp', 'CSP', ['class' => 'col-lg-2 col-form-label']) !!}
                                <div class="col-lg-6">
                                    {!! Form::text('csp', null, ['class' => 'form-control', 'required']) !!}
                                    <div class="invalid-feedback">
                                        Saisir un nom
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                {!! Form::label('categorie', 'Catégorie', ['class' => 'col-lg-2 col-form-label']) !!}
                                <div class="col-lg-6">
                                    {!! Form::text('categorie', null, ['class' => 'form-control', 'required']) !!}
                                    <div class="invalid-feedback">
                                        Saisir un nom
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                {!! Form::label('nationalite', 'Nationalité', ['class' => 'col-lg-2 col-form-label']) !!}
                                <div class="col-lg-6">
                                    {!! Form::text('nationalite', null, ['class' => 'form-control', 'required']) !!}
                                    <div class="invalid-feedback">
                                        Saisir un nom
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                {!! Form::label('logement', 'Logement', ['class' => 'col-lg-2 col-form-label']) !!}
                                <div class="col-lg-6">
                                    {!! Form::text('logement', null, ['class' => 'form-control', 'required']) !!}
                                    <div class="invalid-feedback">
                                        Saisir un nom
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                {!! Form::label('telephone', 'Téléphone', ['class' => 'col-lg-2 col-form-label']) !!}
                                <div class="col-lg-6">
                                    {!! Form::text('telephone', null, ['class' => 'form-control', 'required']) !!}
                                    <div class="invalid-feedback">
                                        Saisir un nom
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                {!! Form::label('email', 'Email', ['class' => 'col-lg-2 col-form-label']) !!}
                                <div class="col-lg-6">
                                    {!! Form::text('email', null, ['class' => 'form-control', 'required']) !!}
                                    <div class="invalid-feedback">
                                        Saisir un nom
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                {!! Form::label('adresse', 'Adresse', ['class' => 'col-lg-2 col-form-label']) !!}
                                <div class="col-lg-6">
                                    {!! Form::text('adresse', null, ['class' => 'form-control', 'required']) !!}
                                    <div class="invalid-feedback">
                                        Saisir un nom
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                {!! Form::label('code_postale', 'Code Postale', ['class' => 'col-lg-2 col-form-label']) !!}
                                <div class="col-lg-6">
                                    {!! Form::text('code_postale', null, ['class' => 'form-control', 'required']) !!}
                                    <div class="invalid-feedback">
                                        Saisir un nom
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                {!! Form::label('ville', 'Ville', ['class' => 'col-lg-2 col-form-label']) !!}
                                <div class="col-lg-6">
                                    {!! Form::text('ville', null, ['class' => 'form-control', 'required']) !!}
                                    <div class="invalid-feedback">
                                        Saisir un nom
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                {!! Form::label('prioritaire', 'Prioritaire', ['class' => 'col-lg-2 col-form-label']) !!}
                                <div class="col-lg-6">
                                    {!! Form::text('prioritaire', null, ['class' => 'form-control', 'required']) !!}
                                    <div class="invalid-feedback">
                                        Saisir un nom
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                {!! Form::label('matricule_caf', 'Matricule CAF', ['class' => 'col-lg-2 col-form-label']) !!}
                                <div class="col-lg-6">
                                    {!! Form::text('matricule_caf', null, ['class' => 'form-control', 'required']) !!}
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