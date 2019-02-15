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
                                    <a class="dropdown-item"
                                       href="{{ route('probleme.create', ['type' => 'partenaire', 'id' => $partenaire]) }}"><span
                                                class="icon mr-2"><i class="fas fa-exclamation-triangle"></i></span>Ajouter
                                        un problème</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 p-2">
                            <ul class="list-group">
                                <li class="list-group-item atom text-white"><h5>Informations générales</h5>
                                </li>
                                <li class="list-group-item"><span class="font-weight-bold">Nom</span>
                                    : {{ $partenaire->nom  }}</li>
                                <li class="list-group-item"><span class="font-weight-bold">Prénom</span>
                                    : {{ $partenaire->prenom  }}</li>
                                <li class="list-group-item"><span class="font-weight-bold">Sexe</span>
                                    : {{ $partenaire->sexe  }}</li>
                                <li class="list-group-item"><span class="font-weight-bold">Structure</span>
                                    : {{ $partenaire->structure->libelle  }}</li>
                                <li class="list-group-item"><span class="font-weight-bold">Type</span>
                                    : {{ $partenaire->type->libelle  }}</li>

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
                                        <li class="list-group-item"><span
                                                    class="font-weight-bold">Date d'inscription</span>
                                            : {{ \Carbon\Carbon::parse($partenaire->create_at)->format('d/m/Y') }}
                                        </li>
                                        <li class="list-group-item"><span
                                                    class="font-weight-bold">Dernière activité</span>
                                            : {{ \Carbon\Carbon::parse($partenaire->update_at)->format('d/m/Y') }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>


                    @if(count($partenaire->problemes) != 0)
                        <div class="row">
                            <div class="col-12">
                                <h2>Problèmes</h2>
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Catégorie</th>
                                        <th>Type</th>
                                        <th>Date</th>
                                        <th>Résolu</th>
                                        <th>Dernière modification</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($partenaire->problemes as $key => $probleme)
                                        <tr id="{{ $probleme->id  }}">
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $probleme->categorie->libelle }}</td>
                                            <td>{{ isset($probleme->type->libelle) ? $probleme->type->libelle : "non renseigné" }}</td>
                                            <td>{{ \Carbon\Carbon::parse($probleme->created_at)->format('d/m/Y') }}</td>
                                            <td>{{ $probleme->resolu ? "oui" : "non" }}</td>
                                            <td>{{ \Carbon\Carbon::parse($probleme->update_at)->format('d/m/Y') }}</td>
                                            <td class="text-center">

                                                <a href="{{ route('probleme.resoudre', $probleme) }}"
                                                   class="btn btn-dark">
                                                    <span class="icon"><i class="fas fa-check"></i></span>
                                                </a>

                                                <a href="{{ route('action.create', $probleme) }}" class="btn btn-info">
                                                    <span class="icon"><i class="fas fa-plus"></i></span>
                                                </a>

                                                <button type="button" class="btn btn-success showModal"
                                                        data-toggle="modal">
                                                    <span class="icon"><i class="fas fa-search"></i></span>
                                                </button>
                                                <button type="button" class="btn btn-primary editModal"
                                                        data-toggle="modal">
                                                    <span class="icon"><i class="fas fa-edit"></i></span>
                                                </button>
                                                <button type="button" class="btn btn-danger deleteModal"
                                                        data-toggle="modal">
                                                    <span class="icon"><i class="fas fa-trash-alt"></i></span>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection