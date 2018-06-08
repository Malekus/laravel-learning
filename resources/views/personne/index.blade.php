@extends('layout.base')

@section('content')
    <div class="columns">
        <div class="column">
            <div class="card">
                <div class="">
                    <div class="column">
                        <p class="title is-2">Personne</p>
                    </div>
                    <div class="column">
                        <div class="level">
                            <div class="level-left">
                                <div class="field is-grouped">
                                    <p class="control is-expanded">
                                        <input class="input" type="text" placeholder="nom">
                                    </p>
                                    <p class="control">
                                        <a class="button is-info">
                                            Rechercher
                                        </a>
                                    </p>
                                </div>



                            </div>
                            <div class="level-right">
                                <div class="buttons">
                                    <p class="control">
                                        <a href="{{ route('index') }}" class="button is-success"><span class="icon is-small"><i class="fas fa-plus"></i></span><span>Ajouter une personne</span></a>
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="column">
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
                                            <a href="{{ route('index') }}" class="button is-success">
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
                    </div>

                    <div class="column">
                        <nav class="pagination is-centered" role="navigation" aria-label="pagination">
                            <a class="pagination-previous">Précédent</a>
                            <a class="pagination-next">Suivant</a>
                            <ul class="pagination-list">
                                <li><a class="pagination-link" aria-label="Goto page 1">1</a></li>
                                <li><span class="pagination-ellipsis">&hellip;</span></li>
                                <li><a class="pagination-link" aria-label="Goto page 45">45</a></li>
                                <li><a class="pagination-link is-current" aria-label="Page 46" aria-current="page">46</a></li>
                                <li><a class="pagination-link" aria-label="Goto page 47">47</a></li>
                                <li><span class="pagination-ellipsis">&hellip;</span></li>
                                <li><a class="pagination-link" aria-label="Goto page 86">86</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
