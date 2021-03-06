@extends('layout.base')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card sizeCard">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <h1>{{ strtoupper($personne->nom) }} {{ $personne->prenom  }}</h1>
                        </div>

                        <div class="col-4">

                            <div class="float-right ml-2">
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
                                        <a class="dropdown-item"
                                           href="{{ route('probleme.create', ['type' => 'personne', 'id' => $personne]) }}"><span
                                                    class="icon mr-2"><i class="fas fa-exclamation-triangle"></i></span>Ajouter
                                            un problème</a>
                                        <a class="dropdown-item" href="{{ route('action.create', $personne) }}">
                                            <span class="icon mr-2"><i class="fas fa-cogs"></i></span>Ajouter un rendez-vous</a>
                                        <a class="dropdown-item"
                                           href="{{ route('personne.createCafDate', ['id' => $personne]) }}"><span
                                                    class="icon mr-2"><i
                                                        class="fas fa-list-ul"></i></span>Ajouter une date Caf</a>
                                        <a class="dropdown-item"
                                           href="{{ route('personne.addListCafDate', ['id' => $personne]) }}"><span
                                                    class="icon mr-2"><i
                                                        class="fas fa-calendar-alt"></i></span>Ajouter à la liste Caf du mois
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="float-right ml-2">
                                <a class="btn btn-info my-2" href="{{ route('personne.routine', ['id' => $personne]) }}"><span class="icon mr-2"><i
                                                class="fas fa-redo-alt"></i></span>Ajouter une routine</a>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 p-2">
                            <ul class="list-group">
                                <li class="list-group-item atom text-white"><h5>Informations générales</h5>
                                </li>
                                <li class="list-group-item"><span class="font-weight-bold">Nom</span>
                                    : {{ $personne->nom  }}</li>
                                <li class="list-group-item"><span class="font-weight-bold">Prénom</span>
                                    : {{ $personne->prenom  }}</li>
                                <li class="list-group-item"><span class="font-weight-bold">Date de naissance</span>
                                    : {{ \Carbon\Carbon::parse($personne->date_naissance)->format('d/m/Y')  }}</li>
                                <li class="list-group-item"><span class="font-weight-bold">Sexe</span>
                                    : {{ $personne->sexe  }}</li>
                                <li class="list-group-item"><span class="font-weight-bold">Enfant</span>
                                    : {{ $personne->enfant  }}</li>
                                <li class="list-group-item"><span class="font-weight-bold">CSP</span>
                                    : {{ isset($personne->csp->libelle) ? $personne->csp->libelle : "non renseigné"  }}
                                </li>
                                <li class="list-group-item"><span class="font-weight-bold">Catégorie</span>
                                    : {{ isset($personne->categorie->libelle) ? $personne->categorie->libelle : "non renseigné"  }}
                                </li>
                                <li class="list-group-item"><span class="font-weight-bold">Nationalité</span>
                                    : {{ $personne->nationalite  }}</li>
                                <li class="list-group-item"><span class="font-weight-bold">Logement</span>
                                    : {{ isset($personne->logement->libelle) ? $personne->logement->libelle : "non renseigné"  }}
                                </li>
                                <li class="list-group-item"><span class="font-weight-bold">Prioritaire</span>
                                    : {{ $personne->prioritaire ? "oui" : "non" }}</li>
                            </ul>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 p-2">
                            <div class="row">
                                <div class="col-12 pb-2">
                                    <ul class="list-group">
                                        <li class="list-group-item atom text-white"><h5>Contact</h5></li>
                                        <li class="list-group-item"><span class="font-weight-bold">Adresse</span>
                                            : {{ $personne->adresse  }}</li>
                                        <li class="list-group-item"><span class="font-weight-bold">Code postale</span>
                                            : {{ $personne->code_postale  }}</li>
                                        <li class="list-group-item"><span class="font-weight-bold">Ville</span>
                                            : {{ $personne->ville  }}</li>
                                        <li class="list-group-item"><span class="font-weight-bold">Téléphone</span>
                                            : {{ $personne->telephone  }}</li>
                                        <li class="list-group-item"><span class="font-weight-bold">Email</span>
                                            : {{ $personne->email  }}</li>
                                    </ul>
                                </div>
                                <div class="col-12 pb-2">
                                    <ul class="list-group">
                                        <li class="list-group-item atom text-white"><h5>Activité</h5></li>
                                        <li class="list-group-item"><span class="font-weight-bold">Nb problème</span>
                                            : {{ count($personne->problemes) }}</li>
                                        <li class="list-group-item"><span class="font-weight-bold">Nb rendez-vous</span>
                                            : {{ count($actions) }}
                                        </li>
                                        <li class="list-group-item"><span
                                                    class="font-weight-bold">Dernière activité</span>
                                            : {{ \Carbon\Carbon::parse($personne->updated_at)->format('d/m/Y') }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>


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
                                            <td>{{ \Carbon\Carbon::parse($probleme->dateProbleme)->format('d/m/Y') }}</td>
                                            <td>{{ $probleme->resolu ? \Carbon\Carbon::parse($probleme->resolu)->format('d/m/Y') : "non" }}</td>
                                            <td>{{ \Carbon\Carbon::parse($probleme->updated_at)->format('d/m/Y') }}</td>
                                            <td class="text-center">

                                                <a href="{{ route('probleme.resoudre', $probleme) }}"
                                                   class="btn btn-dark">
                                                    <span class="icon"><i class="fas fa-check"></i></span>
                                                </a>

                                                <a href="{{ route('action.create', ['personne' => $personne, 'probleme' => $probleme]) }}" class="btn btn-info">
                                                    <span class="icon"><i class="fas fa-plus"></i></span>
                                                </a>

                                                <button type="button" class="btn btn-success showModalProbleme"
                                                        data-toggle="modal">
                                                    <span class="icon"><i class="fas fa-search"></i></span>
                                                </button>
                                                <button type="button" class="btn btn-primary editModalProbleme"
                                                        data-toggle="modal">
                                                    <span class="icon"><i class="fas fa-edit"></i></span>
                                                </button>
                                                <button type="button" class="btn btn-danger deleteModalProbleme"
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
                                            <td>{{ $action->probleme->categorie->libelle }}
                                                - {{ $action->probleme->type->libelle }}</td>
                                            <td>{{ $action->action->libelle }}</td>
                                            <td>{{ isset($action->complement->libelle) ? $action->complement->libelle : "non renseigné" }}</td>
                                            <td>{{ $action->avancement ? "terminé" : "en cours"}}</td>
                                            <td>{{ \Carbon\Carbon::parse($action->updated_at)->format('d/m/Y') }}</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-success showModalAction"
                                                        data-toggle="modal">
                                                    <span class="icon"><i class="fas fa-search"></i></span>
                                                </button>
                                                <button type="button" class="btn btn-primary editModalAction"
                                                        data-toggle="modal">
                                                    <span class="icon"><i class="fas fa-edit"></i></span>
                                                </button>
                                                <button type="button" class="btn btn-danger deleteModalAction"
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


                    @if(count($personne->listeCaf) != 0)
                        <div class="row">
                            <div class="col-12">
                                <h2>Liste date Caf</h2>
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Motif</th>
                                        <th>Crée le</th>
                                        <th>Dernière modification</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($personne->listeCaf as $key => $value)
                                        <tr id="{{ $value->id  }}">
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ \Carbon\Carbon::parse($value->dateCaf)->format('d/m/Y') }}</td>
                                            <td>{{ isset($value->motif->libelle) ? $value->motif->libelle : "non renseigné"  }}</td>
                                            <td>{{ \Carbon\Carbon::parse($value->created_at)->format('d/m/Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($value->updated_at)->format('d/m/Y') }}</td>
                                            <td class="text-center">

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

            $(document).on('click', '.showModalProbleme', function (e) {
                e.preventDefault();
                console.log('showModalProbleme');

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

            $(document).on('click', '.editModalProbleme', function (e) {
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

            $(document).on('click', '.deleteModalProbleme', function (e) {
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

            $(document).on('click', '.showModalAction', function (e) {
                e.preventDefault();
                console.log('showModalAction');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                var url = '{{ url('action/:id/showModal') }}';
                url = url.replace(':id', $(this).parents('tr').attr('id'));

                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function (data) {
                        $('.no-height').empty().append(data);
                        $('#modalShowAction').modal();
                        console.log(data);
                    },
                    error: function (data) {
                        console.log("fail");
                    }
                });

            });

            $(document).on('click', '.editModalAction', function (e) {
                e.preventDefault();
                console.log('editModalAction');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                var url = '{{ url('action/:id/editModal') }}';
                url = url.replace(':id', $(this).parents('tr').attr('id'));
                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function (data) {
                        $('.no-height').empty().append(data);
                        $('#modalEditAction').modal();
                        console.log(data);
                    },
                    error: function (data) {
                        console.log("fail");
                    }
                });

            });

            $(document).on('click', '.deleteModalAction', function (e) {
                e.preventDefault();
                console.log('deleteModalAction');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                var url = '{{ url('action/:id/deleteModal') }}';
                url = url.replace(':id', $(this).parents('tr').attr('id'));
                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function (data) {
                        $('.no-height').empty().append(data);
                        $('#modalDeleteAction').modal();
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