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
                    <th scope="col">Structure</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($partenaires as $key => $partenaire)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $partenaire->nom  }}</td>
                        <td>{{ $partenaire->prenom  }}</td>
                        <td>{{ \Carbon\Carbon::parse($partenaire->update_at)->format('d/m/Y') }}</td>
                        <td>{{ $partenaire->structure->libelle  }}</td>
                        <td class="text-center">
                            <a href="#"
                               class="btn btn-success">
                                <span class="icon"><i class="fas fa-search"></i></span>
                            </a>
                            <a href="#"
                               class="btn btn-info">
                                <span class="icon"><i class="fas fa-edit"></i></span>
                            </a>
                            <a href="#"
                               class="btn btn-dark">
                                <span class="icon"><i class="fas fa-redo-alt"></i></span>
                            </a>
                            <a href="#"
                               class="btn btn-warning">
                                <span class="icon"><i class="fas fa-calendar-alt"></i></span>
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
@include('layout.pagination', ['model' => $partenaires])