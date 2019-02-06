@extends('layout.base')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <h1>{{ strtoupper($personne->nom) }} {{ $personne->prenom  }}</h1>
                        </div>

                        <div class="col-4">
                            <div class="dropdown">
                                <button class="btn btn-success dropdown-toggle pull-right my-2" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                    Ajouter une action
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('personne.edit', $personne) }}"><span
                                                class="icon mr-2"><i class="fas fa-edit"></i></span>Modifier la personne</a>
                                    <a class="dropdown-item" href="#"><span class="icon mr-2"><i
                                                    class="fas fa-trash-alt"></i></span>Supprimer la personne</a>
                                    <a class="dropdown-item" href="{{ route('probleme.create', $personne) }}"><span
                                                class="icon mr-2"><i class="fas fa-exclamation-triangle"></i></span>Ajouter
                                        un problème</a>
                                    <a class="dropdown-item" href="#"><span class="icon mr-2"><i
                                                    class="fas fa-cogs"></i></span>Ajouter un rendez-vous</a>
                                    <a class="dropdown-item" href="#"><span class="icon mr-2"><i
                                                    class="fas fa-redo-alt"></i></span>Ajouter une routine</a>
                                    <a class="dropdown-item" href="#"><span class="icon mr-2"><i
                                                    class="fas fa-list-ul"></i></span>Ajouter une date CAF</a>
                                    <a class="dropdown-item" href="{{ route('personne.cafMois', $personne) }}"><span class="icon mr-2"><i
                                                    class="fas fa-calendar-alt"></i></span>Ajouter à la liste CAF du
                                        mois</a>
                                </div>
                            </div>
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
                                <li class="list-group-item"><span class="font-weight-bold">CSP</span>
                                    : {{ isset($personne->csp->libelle) ? $personne->csp->libelle : "non reseigné"  }}</li>
                                <li class="list-group-item"><span class="font-weight-bold">Catégorie</span>
                                    : {{ isset($personne->categorie->libelle) ? $personne->categorie->libelle : "non reseigné"  }}</li>
                                <li class="list-group-item"><span class="font-weight-bold">Nationalité</span> : {{ $personne->nationalite  }}</li>
                                <li class="list-group-item"><span class="font-weight-bold">Logement</span>
                                    : {{ isset($personne->logement->libelle) ? $personne->logement->libelle : "non reseigné"  }}</li>
                                <li class="list-group-item"><span class="font-weight-bold">Prioritaire</span>
                                    : {{ $personne->prioritaire ? "oui" : "non" }}</li>
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
                                        <li class="list-group-item"><span class="font-weight-bold">Nb problème</span>
                                            : {{ count($personne->problemes) }}</li>
                                        <li class="list-group-item"><span class="font-weight-bold">Nb rendez-vous</span>
                                            : {{ count($actions) }}
                                        </li>
                                        <li class="list-group-item"><span class="font-weight-bold">Dernière activité</span> : {{ \Carbon\Carbon::parse($personne->update_at)->format('d/m/Y') }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <td></td>

                    @if(count($personne->problemes) != 0)
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
                                        @foreach($personne->problemes as $key => $probleme)
                                            <tr id="{{ $probleme->id  }}">
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $probleme->categorie->libelle }}</td>
                                                <td>{{ isset($probleme->type->libelle) ? $probleme->type->libelle : "non renseigné" }}</td>
                                                <td>{{ \Carbon\Carbon::parse($probleme->created_at)->format('d/m/Y') }}</td>
                                                <td>{{ $probleme->resolu ? "oui" : "non" }}</td>
                                                <td>{{ \Carbon\Carbon::parse($probleme->update_at)->format('d/m/Y') }}</td>
                                                <td class="text-center">

                                                    <a href="{{ route('probleme.resoudre', $probleme) }}" class="btn btn-dark">
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

                    @if(count($actions) != 0)
                        <div class="row">
                            <div class="col-12">
                                <h2>Rendez-vous</h2>
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Problème</th>
                                        <th>Type</th>
                                        <th>Dirigé vers</th>
                                        <th>Avancement</th>
                                        <th>Dernière modification</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($actions as $key => $action)
                                            <tr id="{{ $action->id  }}">
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $action->probleme->categorie->libelle }} - {{ $action->probleme->type->libelle }}</td>
                                                <td>{{ $action->action->libelle }}</td>
                                                <td>{{ isset($action->complement->libelle) ? $action->complement->libelle : "non renseigné" }}</td>
                                                <td>{{ $action->avancement ? "terminé" : "en cours"}}</td>
                                                <td>{{ \Carbon\Carbon::parse($action->update_at)->format('d/m/Y') }}</td>
                                                <td>
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


@section('javascript')
    <script>
        $(document).ready(function () {

            $(document).on('click', '.showModal', function (e) {
                e.preventDefault();
                console.log('showModal');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                var url = '{{ url('probleme/:probleme/showModal') }}';
                url = url.replace(':probleme', $(this).parents('tr').attr('id'));

                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function (data) {
                        $('.no-height').empty().append(data);
                        $('#modalShowProbleme').modal();
                        console.log(data);
                    },
                    error: function (data) {
                        console.log("fail");
                    }
                });

            });

            $(document).on('click', '.editModal', function (e) {
                e.preventDefault();
                console.log('editModal');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                var url = '{{ url('probleme/:probleme/editModal') }}';
                url = url.replace(':probleme', $(this).parents('tr').attr('id'));
                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function (data) {
                        $('.no-height').empty().append(data);
                        $('#modalEditProbleme').modal();
                        console.log(data);
                    },
                    error: function (data) {
                        console.log("fail");
                    }
                });

            });

            $(document).on('click', '.deleteModal', function (e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                var url = '{{ url('probleme/:probleme/deleteModal') }}';
                url = url.replace(':probleme', $(this).parents('tr').attr('id'));

                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function (data) {
                        $('.no-height').empty().append(data);
                        $('#modalDeleteProbleme').modal();
                        console.log(data);
                    },
                    error: function (data) {
                        console.log("fail");
                    }
                });

            });
        });
    </script>

    <script language=JavaScript>

        var message = "function disabled";

        function rtclickcheck(keyp) {
            if (navigator.appName == "Netscape" && keyp.which == 3) {
                return false;
            }

            if (navigator.appVersion.indexOf("MSIE") != -1 && event.button == 2) {
                return false;
            }
        }

        document.onmousedown = rtclickcheck;

    </script>
@endsection