@extends('layout.base')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h1>{{ strtoupper($personne->nom) }} {{ $personne->prenom  }}</h1>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 p-2">
                            <ul class="list-group">
                                <li class="list-group-item active bg-info text-white"><h5>Informations générales</h5>
                                </li>
                                <li class="list-group-item"><span class="font-weight-bold">Nom</span> : {{ $personne->nom  }}</li>
                                <li class="list-group-item"><span class="font-weight-bold">Prénom</span> : {{ $personne->prenom  }}</li>
                                <li class="list-group-item"><span class="font-weight-bold">Date de naissance</span> : {{ \Carbon\Carbon::parse($personne->date_naissance)->format('d/m/Y')  }}</li>
                                <li class="list-group-item"><span class="font-weight-bold">Sexe</span> : {{ $personne->sexe  }}</li>
                                <li class="list-group-item"><span class="font-weight-bold">Enfant</span> : {{ $personne->enfant  }}</li>
                                <li class="list-group-item"><span class="font-weight-bold">CSP</span> : {{ $personne->csp  }}</li>
                                <li class="list-group-item"><span class="font-weight-bold">Catégorie</span> : {{ $personne->categorie  }}</li>
                                <li class="list-group-item"><span class="font-weight-bold">Nationalité</span> : {{ $personne->nationalite  }}</li>
                                <li class="list-group-item"><span class="font-weight-bold">Logement</span> : {{ $personne->logement  }}</li>
                                <li class="list-group-item"><span class="font-weight-bold">Prioritaire</span> : {{ $personne->prioritaire ? "oui" : "nom" }}</li>
                            </ul>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 p-2">
                            <div class="row">
                                <div class="col-12 pb-2">
                                    <ul class="list-group">
                                        <li class="list-group-item active bg-info text-white"><h5>Contact</h5></li>
                                        <li class="list-group-item"><span class="font-weight-bold">Adresse</span> : {{ $personne->adresse  }}</li>
                                        <li class="list-group-item"><span class="font-weight-bold">Code postale</span> : {{ $personne->code_postale  }}</li>
                                        <li class="list-group-item"><span class="font-weight-bold">Ville</span> : {{ $personne->ville  }}</li>
                                        <li class="list-group-item"><span class="font-weight-bold">Téléphone</span> : {{ $personne->telephone  }}</li>
                                        <li class="list-group-item"><span class="font-weight-bold">Email</span> : {{ $personne->email  }}</li>
                                    </ul>
                                </div>
                                <div class="col-12 pb-2">
                                    <ul class="list-group">
                                        <li class="list-group-item active bg-info text-white"><h5>Activité</h5></li>
                                        <li class="list-group-item"><span class="font-weight-bold">Nb problème</span> : {{ 5 }}</li>
                                        <li class="list-group-item"><span class="font-weight-bold">Nb rendez-vous</span> : {{ 5 }}</li>
                                        <li class="list-group-item"><span class="font-weight-bold">Dernière activité</span> : {{ \Carbon\Carbon::parse($personne->update_at)->format('d/m/Y') }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <td></td>

                    <div class="row">
                        <div class="col-12">
                            <h2>Problèmes</h2>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <h2>Rendez-vous</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


