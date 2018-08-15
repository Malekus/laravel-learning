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
                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target={{"#modalPersonneSupprimer".$personne->id}}>
                                <span class="icon"><i class="fas fa-times"></i></span>
                            </button>
                            <div class="modal fade" id={{"modalPersonneSupprimer".$personne->id}} tabindex="-1"
                                 role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Personne - Supprimer une
                                                personne</h5>
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
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                        Annuler
                                                    </button>
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

@include('personne.ajax.pagination')

