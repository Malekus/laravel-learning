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
                                <div class="field has-addons">
                                    <div class="control">
                                        <input class="input" type="text" placeholder="nom">
                                    </div>
                                    <div class="control">
                                        <a class="button is-info">
                                            Rechercher
                                        </a>
                                    </div>
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
                </div>
            </div>
        </div>
    </div>
@endsection

{{--
@section('content')
       <div class="columns">
           <div class="column">
               <div class="card">
                   <div class="card-content">
                       <div class="media-content">
                           <p class="title is-2">Personnes</p>
                           <div class="level">
                               <div class="field has-addons">
                                   <p class="control">
                                       <input class="input" type="text" placeholder="Find a post">
                                   </p>
                                   <p class="control">
                                       <button class="button">
                                           Search
                                       </button>
                                   </p>
                               </div>
                           </div>
                       </div>
                       <div class="content">
                           <div class="">
                               <table class="table is-bordered is-narrow is-hoverable is-fullwidth">
                                   <thead>
                                   <tr>
                                       <th>One</th>
                                       <th>Two</th>
                                   </tr>
                                   </thead>
                                   <tbody>
                                   <tr>
                                       <td>Three</td>
                                       <td>Four</td>
                                   </tr>
                                   <tr>
                                       <td>Five</td>
                                       <td>Six</td>
                                   </tr>
                                   <tr>
                                       <td>Seven</td>
                                       <td>Eight</td>
                                   </tr>
                                   <tr>
                                       <td>Nine</td>
                                       <td>Ten</td>
                                   </tr>
                                   <tr>
                                       <td>Eleven</td>
                                       <td>Twelve</td>
                                   </tr>
                                   </tbody>
                               </table>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
@endsection
   --}}

