@extends('layout.base')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
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
                                        <span class="icon">
                                          <i class="fas fa-search"></i>
                                        </span>
                                                    <span></span>
                                                </a>
                                                <a href="{{ route('personne.edit', $personne) }}" class="btn btn-info">
                                        <span class="icon">
                                          <i class="fas fa-edit"></i>
                                        </span>
                                                    <span></span>
                                                </a>
                                                <a href="{{ route('index') }}" class="btn btn-dark">
                                        <span class="icon">
                                          <i class="fas fa-redo-alt"></i>
                                        </span>
                                                    <span></span>
                                                </a>
                                                <a href="{{ route('index') }}" class="btn btn-danger">
                                        <span class="icon">
                                          <i class="fas fa-times"></i>
                                        </span>
                                                    <span></span>
                                                </a>
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

{{--



                        <div class="col align-self-center">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                </ul>
                            </nav>
                        </div>


{!! Form::open(['method' => 'get','url' => route('personne.index')]) !!}
                                <div class="field is-grouped">
                                    <p class="control is-expanded">
                                        {!! Form::text('nom', null, ['class' => 'input', 'placeholder' => "Nom"]) !!}
                                    </p>
                                    <p class="control">
                                        <button class="button is-info">
                                            Rechercher
                                        </button>
                                    </p>
                                </div>
                                {!! Form::close() !!}


                                                        <table class="table is-bordered is-narrow is-hoverable is-fullwidth">
                            <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Dernière activité</th>
                                <th>Matricule Caf</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($personnes as $personne)
                                <tr>
                                    <td>{{ $personne->nom  }}</td>
                                    <td>{{ $personne->prenom  }}</td>
                                    <td>{{ \Carbon\Carbon::parse($personne->update_at)->format('d/m/Y') }}</td>
                                    <td>{{ $personne->matricule_caf  }}</td>
                                    <td class="has-text-centered">
                                        <a href="{{ route('personne.show', $personne) }}" class="button is-success">
                                        <span class="icon">
                                          <i class="fas fa-search"></i>
                                        </span>
                                            <span>Afficher</span>
                                        </a>
                                        <a href="{{ route('personne.edit', $personne) }}" class="button is-info">
                                        <span class="icon">
                                          <i class="fas fa-edit"></i>
                                        </span>
                                            <span>Modifier</span>
                                        </a>
                                        <a href="{{ route('index') }}" class="button is-active">
                                        <span class="icon">
                                          <i class="fas fa-redo-alt"></i>
                                        </span>
                                            <span>Routine</span>
                                        </a>
                                        <a href="{{ route('index') }}" class="button is-danger">
                                        <span class="icon">
                                          <i class="fas fa-times"></i>
                                        </span>
                                            <span>Supprimer</span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

--}}