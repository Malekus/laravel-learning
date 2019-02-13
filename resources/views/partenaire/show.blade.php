@extends('layout.base')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card sizeCard">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <h1>{{ strtoupper($partenaire->nom) }} {{ $partenaire->prenom  }}</h1>
                        </div>

                        <div class="col-4">
                            <div class="dropdown">
                                <button class="btn btn-success dropdown-toggle pull-right my-2" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                    Ajouter une action
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#"><span
                                                class="icon mr-2"><i class="fas fa-edit"></i></span>Modifier le
                                        partenaire</a>
                                    <a class="dropdown-item" href="#"><span class="icon mr-2"><i
                                                    class="fas fa-trash-alt"></i></span>Supprimer le partenaire</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 p-2">
                            <ul class="list-group">
                                <li class="list-group-item atom text-white"><h5>Informations générales</h5>
                                </li>
                                <li class="list-group-item"><span class="font-weight-bold">Nom</span> : {{ $partenaire->nom  }}</li>
                                <li class="list-group-item"><span class="font-weight-bold">Prénom</span> : {{ $partenaire->prenom  }}</li>
                                <li class="list-group-item"><span class="font-weight-bold">Sexe</span> : {{ $partenaire->sexe  }}</li>
                                <li class="list-group-item"><span class="font-weight-bold">Sexe</span> : {{ $partenaire->structure->libelle  }}</li>
                                <li class="list-group-item"><span class="font-weight-bold">Sexe</span> : {{ $partenaire->type->libelle  }}</li>

                            </ul>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 p-2">
                            <div class="row">
                                <div class="col-12 pb-2">
                                    <ul class="list-group">
                                        <li class="list-group-item atom text-white"><h5>Activités</h5></li>
                                        <li class="list-group-item"><span class="font-weight-bold">Nb problème</span>
                                            : {{ count($partenaire->problemes) }}</li>
                                        <li class="list-group-item"><span class="font-weight-bold">Nb rendez-vous</span>
                                            : 15 à faire
                                        </li>
                                        <li class="list-group-item"><span class="font-weight-bold">Nb rendez-vous</span>
                                            : 15 à faire
                                        </li>
                                        <li class="list-group-item"><span class="font-weight-bold">Date d'inscription</span>
                                            : {{ \Carbon\Carbon::parse($partenaire->create_at)->format('d/m/Y') }}
                                        </li>
                                        <li class="list-group-item"><span class="font-weight-bold">Dernière activité</span> : {{ \Carbon\Carbon::parse($partenaire->update_at)->format('d/m/Y') }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>


                    @if(count($partenaire->problemes) != 0)
                        non vide
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection