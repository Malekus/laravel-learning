<table class="table table-bordered table-hover">
    <thead class="alert alert-primary">
    <tr>
        <th scope="col">Type</th>
        <th scope="col">Libelle</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
        @foreach($configurations as $configuration)
            <tr>
                <td>{{ $configuration->type }}</td>
                <td>{{ $configuration->libelle }}</td>
                <td class="text-center">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target={{ "#showModal".$configuration->id  }}>
                        <span class="icon">
                            <i class="fas fa-search"></i>
                        </span>
                    </button>

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target={{ "#editModal".$configuration->id  }}>
                        <span class="icon">
                            <i class="fas fa-edit"></i>
                        </span>
                    </button>

                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target={{"#deleteModal".$configuration->id}}>
                        <span class="icon">
                            <i class="fas fa-trash-alt"></i>
                        </span>
                    </button>
                </td>
            </tr>
            <div class="no-height">
                @include('modal.show', ['titleModal' => 'Personne'])
                @include('modal.edit', ['titleModal' => 'Personne'])
                @include('modal.delete', ['titleModal' => 'Personne'])
            </div>
        @endforeach
    </tbody>
</table>