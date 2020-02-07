@extends('layout.base')

@section('titre')
    · Modifier une personne
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body sizeCard">
                    <div class="row">
                        @include('layout.title', ['title' => 'Modifier une personne', 'icon' => 'fa-user'])
                        <div class="col-lg-12">
                            {!! Form::open(['url' => route('personne.update', $personne), 'method' => 'put', 'class' => 'needs-validation', 'novalidate']) !!}
                            @csrf()
                            <div class="form-group row justify-content-center">
                                {!! Form::label('nom', 'Nom', ['class' => 'col-lg-2 col-form-label']) !!}
                                <div class="col-lg-6">
                                    {!! Form::text('nom', $personne->nom, ['class' => 'form-control', 'required']) !!}
                                    <div class="invalid-feedback">
                                        Saisir un nom
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                {!! Form::label('prenom', 'Prénom', ['class' => 'col-lg-2 col-form-label']) !!}
                                <div class="col-lg-6">
                                    {!! Form::text('prenom', $personne->prenom, ['class' => 'form-control']) !!}
                                    <div class="invalid-feedback">
                                        Saisir un prénom
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                {!! Form::label('date_naissance', 'Date de naissance', ['class' => 'col-lg-2 col-form-label']) !!}
                                <div class="col-lg-6">
                                    {!! Form::date('date_naissance', $personne->date_naissance, ['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                {!! Form::label('sexe', 'Sexe', ['class' => 'col-lg-2 col-form-label']) !!}
                                <div class="col-lg-6">
                                    {!! Form::select('sexe', ['homme' => 'homme', 'femme' => 'femme'], $personne->sexe, ['class' => 'form-control', 'placeholder' => 'Sélectionnez un sexe']) !!}
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                {!! Form::label('enfant', 'Enfant', ['class' => 'col-lg-2 col-form-label']) !!}
                                <div class="col-lg-6">
                                    {!! Form::number('enfant', $personne->enfant, ['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                {!! Form::label('csp', 'CSP', ['class' => 'col-lg-2 col-form-label']) !!}
                                <div class="col-lg-6">
                                    {!! Form::select('csp', \App\Configuration::where(['categorie' => 'Personne', 'champ' => 'CSP'])->pluck('libelle', 'id'), $personne->csp->id, ['class' => 'form-control', 'placeholder' => 'Sélectionnez un Contrat de sécurisation professionnelle(CSP)']) !!}
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                {!! Form::label('categorie', 'Catégorie', ['class' => 'col-lg-2 col-form-label']) !!}
                                <div class="col-lg-6">
                                    {!! Form::select('categorie', \App\Configuration::where(['categorie' => 'Personne', 'champ' => 'Catégorie'])->pluck('libelle', 'id'), $personne->categorie->id, ['class' => 'form-control', 'placeholder' => 'Sélectionnez une catégorie']) !!}
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                {!! Form::label('nationalite', 'Nationalité', ['class' => 'col-lg-2 col-form-label']) !!}
                                <div class="col-lg-6">
                                    {!! Form::text('nationalite', $personne->nationalite, ['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                {!! Form::label('origine', 'Origine', ['class' => 'col-lg-2 col-form-label']) !!}
                                <div class="col-lg-6">
                                    {!! Form::text('origine', $personne->origine, ['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                {!! Form::label('logement', 'Logement', ['class' => 'col-lg-2 col-form-label']) !!}
                                <div class="col-lg-6">
                                    {!! Form::select('logement', \App\Configuration::where(['categorie' => 'Personne', 'champ' => 'Logement'])->pluck('libelle', 'id'), $personne->logement->id, ['class' => 'form-control', 'placeholder' => 'Sélectionnez un logement']) !!}
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                {!! Form::label('telephone', 'Téléphone', ['class' => 'col-lg-2 col-form-label']) !!}
                                <div class="col-lg-6">
                                    {!! Form::text('telephone', $personne->telephone, ['class' => 'form-control', 'maxlength' => 10]) !!}
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                {!! Form::label('email', 'Email', ['class' => 'col-lg-2 col-form-label']) !!}
                                <div class="col-lg-6">
                                    {!! Form::text('email', $personne->email, ['class' => 'form-control']) !!}
                                    <div class="invalid-feedback">
                                        Saisir un email
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                {!! Form::label('adresse', 'Adresse', ['class' => 'col-lg-2 col-form-label']) !!}
                                <div class="col-lg-6">
                                    {!! Form::text('adresse', $personne->adresse, ['class' => 'form-control']) !!}
                                    <div class="invalid-feedback">
                                        Saisir un adresse
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                {!! Form::label('code_postale', 'Code Postale', ['class' => 'col-lg-2 col-form-label']) !!}
                                <div class="col-lg-6">
                                    {!! Form::text('code_postale', $personne->code_postale, ['class' => 'form-control', 'maxlength' => 10]) !!}
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                {!! Form::label('ville', 'Ville', ['class' => 'col-lg-2 col-form-label']) !!}
                                <div class="col-lg-6">
                                    {!! Form::text('ville', $personne->ville, ['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                {!! Form::label('prioritaire', 'Quartier Prioritaire', ['class' => 'col-lg-2 col-form-label']) !!}
                                <div class="col-lg-6">
                                    {!! Form::select('prioritaire', [1 => 'Oui', 0 => 'Non'], $personne->prioritaire, ['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                {!! Form::label('matricule_caf', 'Matricule CAF', ['class' => 'col-lg-2 col-form-label']) !!}
                                <div class="col-lg-6">
                                    {!! Form::text('matricule_caf', $personne->matricule_caf, ['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="form-row text-center">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-success">Mettre à jour</button>
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