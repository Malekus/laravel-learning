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
                            <a href="{{ route('personne.edit', $personne) }}"
                               class="btn btn-info">
                                <span class="icon"><i class="fas fa-edit"></i></span>
                            </a>
                            <a href="{{ route('personne.routine',$personne) }}"
                               class="btn btn-dark">
                                <span class="icon"><i class="fas fa-redo-alt"></i></span>
                            </a>
                            <button type="button" class="btn btn-danger deleteModal" data-toggle="modal">
                                <span class="icon"><i class="fas fa-trash-alt"></i></span>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>

@include('personne.ajax.pagination')