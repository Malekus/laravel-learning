@extends('layout.base')

@section('titre')
    · Personne
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 pb-2">
                            <h1><i class="fas fa-user"></i>  Personne</h1>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="float-left">
                                {!! Form::open(['method' => 'get','url' => route('personne.index'), 'class' => 'form-inline']) !!}
                                    <div class="form-group mb-2">
                                        {!! Form::text('nom', null, ['class' => 'form-control', 'placeholder' => "Nom"]) !!}
                                    </div>
                                        <button type="submit" class="btn btn-info mx-sm-3 mb-2">
                                            Rechercher
                                        </button>
                                {!! Form::close() !!}
                            </div>

                            <div class="float-right">
                                <a href="{{ route('personne.create') }}" class="btn btn-success">
                                    <span class="fas fa-plus"></span> Ajouter une personne
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 mt-2">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Prénom</th>
                                        <th scope="col">Dernière activité</th>
                                        <th scope="col">Matricule Caf</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($personnes as $key => $personne)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>{{ $personne->nom  }}</td>
                                            <td>{{ $personne->prenom  }}</td>
                                            <td>{{ \Carbon\Carbon::parse($personne->update_at)->format('d/m/Y') }}</td>
                                            <td>{{ $personne->matricule_caf  }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('personne.show', $personne) }}"
                                                   class="btn btn-success">
                                                    <span class="icon"><i class="fas fa-search"></i></span>
                                                </a>
                                                <a href="{{ route('personne.edit', $personne) }}" class="btn btn-info">
                                                    <span class="icon"><i class="fas fa-edit"></i></span>
                                                </a>
                                                <a href="{{ route('personne.routine',$personne) }}"
                                                   class="btn btn-dark">
                                                    <span class="icon"><i class="fas fa-redo-alt"></i></span>
                                                </a>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target={{"#modalPersonneSupprimer".$personne->id}}>
                                                    <span class="icon"><i class="fas fa-times"></i></span>
                                                </button>
                                                <div class="modal fade" id={{"modalPersonneSupprimer".$personne->id}} tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">Personne - Supprimer une personne</h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                {!! Form::open(['method' => 'delete', 'url' => route('personne.destroy', $personne)]) !!}
                                                                <div class="form-row text-center">
                                                                    <p class="col-12">
                                                                        Voulez-vous supprimer {{ $personne->nom }} {{ $personne->prenom }} ?
                                                                    </p>
                                                                </div>
                                                                <div class="form-row text-center">
                                                                    <div class="col-12">
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                                                                        <button type="submit" class="btn btn-primary">Supprimer</button>
                                                                    </div>
                                                                </div>
                                                                {!! Form::close() !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">Précédent</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Suivant</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
