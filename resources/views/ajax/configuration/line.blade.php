<tr class="alert alert-success" id="{{ $configuration->id }}">
    <td>{{ $configuration->type }}</td>
    <td>{{ $configuration->libelle  }}</td>
    <td class="text-center">
        <button type="button" class="btn btn-success showModal" data-toggle="modal"><span class="icon"><i class="fas fa-search"></i></span></button>
        <button type="button" class="btn btn-primary editModal" data-toggle="modal"><span class="icon"><i class="fas fa-edit"></i></span></button>
        <button type="button" class="btn btn-danger deleteModal" data-toggle="modal"><span class="icon"><i class="fas fa-trash-alt"></i></span></button>
    </td>
</tr>