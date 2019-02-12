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


                </div>
            </div>
        </div>
    </div>
@endsection