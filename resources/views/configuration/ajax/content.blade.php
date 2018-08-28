<div class="row">
    <div class="col-lg-8 pt-2">
        <div class="row">

            @foreach($configurations as $key => $configuration)
                @if($key == 0)
                    <div class="col-12 pt-2">
                        <div class="">
                            <table class="table table-bordered table-hover">
                                <thead class="alert alert-primary">
                                <tr>
                                    <th scope="col">Champ</th>
                                    <th scope="col">Libelle</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr id="{{ $configuration->id }}">
                                    <td>{{ $configuration->champ }}</td>
                                    <td>{{ $configuration->libelle }}</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-success showModal" data-toggle="modal">
                                            <span class="icon"><i class="fas fa-search"></i></span>
                                        </button>
                                        <button type="button" class="btn btn-primary editModal" data-toggle="modal">
                                            <span class="icon"><i class="fas fa-edit"></i></span>
                                        </button>
                                        <button type="button" class="btn btn-danger deleteModal"
                                                data-toggle="modal">
                                            <span class="icon"><i class="fas fa-trash-alt"></i></span>
                                        </button>
                                    </td>
                                </tr>
                                @else
                                    @if($configurations[$key-1]->champ == $configuration->champ)
                                        <tr id="{{ $configuration->id }}">
                                            <td>{{ $configuration->champ }}</td>
                                            <td>{{ $configuration->libelle }}</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-success showModal"
                                                        data-toggle="modal">
                                                    <span class="icon"><i class="fas fa-search"></i></span>
                                                </button>
                                                <button type="button" class="btn btn-primary editModal"
                                                        data-toggle="modal">
                                                    <span class="icon"><i class="fas fa-edit"></i></span>
                                                </button>
                                                <button type="button" class="btn btn-danger deleteModal"
                                                        data-toggle="modal">
                                                    <span class="icon"><i class="fas fa-trash-alt"></i></span>
                                                </button>
                                            </td>
                                        </tr>
                                    @else
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12 pt-2">
                        <div class="">
                            <table class="table table-bordered table-hover">
                                <thead class="alert alert-primary">
                                <tr>
                                    <th scope="col">Champ</th>
                                    <th scope="col">Libelle</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr id="{{ $configuration->id }}">
                                    <td>{{ $configuration->champ }}</td>
                                    <td>{{ $configuration->libelle }}</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-success showModal" data-toggle="modal">
                                            <span class="icon"><i class="fas fa-search"></i></span>
                                        </button>
                                        <button type="button" class="btn btn-primary editModal" data-toggle="modal">
                                            <span class="icon"><i class="fas fa-edit"></i></span>
                                        </button>
                                        <button type="button" class="btn btn-danger deleteModal"
                                                data-toggle="modal">
                                            <span class="icon"><i class="fas fa-trash-alt"></i></span>
                                        </button>
                                    </td>
                                </tr>
                                @endif
                                @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
        </div>
    </div>
            {{--
             @if($title != 'Problème')
                @foreach($configurations as $key => $configuration)
                    @if($key == 0)
                        <div class="col-12 pt-2">
                            <div class="">
                                <table class="table table-bordered table-hover">
                                    <thead class="alert alert-primary">
                                    <tr>
                                        <th scope="col">Champ</th>
                                        <th scope="col">Libelle</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr id="{{ $configuration->id }}">
                                        <td>{{ $configuration->champ }}</td>
                                        <td>{{ $configuration->libelle }}</td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-success showModal" data-toggle="modal">
                                                <span class="icon"><i class="fas fa-search"></i></span>
                                            </button>
                                            <button type="button" class="btn btn-primary editModal" data-toggle="modal">
                                                <span class="icon"><i class="fas fa-edit"></i></span>
                                            </button>
                                            <button type="button" class="btn btn-danger deleteModal"
                                                    data-toggle="modal">
                                                <span class="icon"><i class="fas fa-trash-alt"></i></span>
                                            </button>
                                        </td>
                                    </tr>
                                    @else
                                        @if($configurations[$key-1]->champ == $configuration->champ)
                                            <tr id="{{ $configuration->id }}">
                                                <td>{{ $configuration->champ }}</td>
                                                <td>{{ $configuration->libelle }}</td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-success showModal"
                                                            data-toggle="modal">
                                                        <span class="icon"><i class="fas fa-search"></i></span>
                                                    </button>
                                                    <button type="button" class="btn btn-primary editModal"
                                                            data-toggle="modal">
                                                        <span class="icon"><i class="fas fa-edit"></i></span>
                                                    </button>
                                                    <button type="button" class="btn btn-danger deleteModal"
                                                            data-toggle="modal">
                                                        <span class="icon"><i class="fas fa-trash-alt"></i></span>
                                                    </button>
                                                </td>
                                            </tr>
                                        @else
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-12 pt-2">
                            <div class="">
                                <table class="table table-bordered table-hover">
                                    <thead class="alert alert-primary">
                                    <tr>
                                        <th scope="col">Champ</th>
                                        <th scope="col">Libelle</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr id="{{ $configuration->id }}">
                                        <td>{{ $configuration->champ }}</td>
                                        <td>{{ $configuration->libelle }}</td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-success showModal" data-toggle="modal">
                                                <span class="icon"><i class="fas fa-search"></i></span>
                                            </button>
                                            <button type="button" class="btn btn-primary editModal" data-toggle="modal">
                                                <span class="icon"><i class="fas fa-edit"></i></span>
                                            </button>
                                            <button type="button" class="btn btn-danger deleteModal"
                                                    data-toggle="modal">
                                                <span class="icon"><i class="fas fa-trash-alt"></i></span>
                                            </button>
                                        </td>
                                    </tr>
                                    @endif
                                    @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @else
                        @foreach($configurations as $key => $configuration)
                            @if($key == 0)
                                <div class="col-12 pt-2">
                                    <div class="">
                                        <table class="table table-bordered table-hover">
                                            <thead class="alert alert-primary">
                                            <tr>
                                                <th scope="col">Champ</th>
                                                <th scope="col">Libelle</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr id="{{ $configuration->id }}">
                                                <td>{{ $configuration->champ }}</td>
                                                <td>{{ $configuration->libelle }}</td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-success showModal"
                                                            data-toggle="modal">
                                                        <span class="icon"><i class="fas fa-search"></i></span>
                                                    </button>
                                                    <button type="button" class="btn btn-primary editModal"
                                                            data-toggle="modal">
                                                        <span class="icon"><i class="fas fa-edit"></i></span>
                                                    </button>
                                                    <button type="button" class="btn btn-danger deleteModal"
                                                            data-toggle="modal">
                                                        <span class="icon"><i class="fas fa-trash-alt"></i></span>
                                                    </button>
                                                </td>
                                            </tr>
                                            @else
                                                @if($configurations[$key-1]->libelle == $configuration->libelle)
                                                    <tr id="{{ $configuration->id }}">
                                                        <td>{{ $configuration->champ }}</td>
                                                        <td>{{ $configuration->libelle }}</td>
                                                        <td class="text-center">
                                                            <button type="button" class="btn btn-success showModal"
                                                                    data-toggle="modal">
                                                                <span class="icon"><i class="fas fa-search"></i></span>
                                                            </button>
                                                            <button type="button" class="btn btn-primary editModal"
                                                                    data-toggle="modal">
                                                                <span class="icon"><i class="fas fa-edit"></i></span>
                                                            </button>
                                                            <button type="button" class="btn btn-danger deleteModal"
                                                                    data-toggle="modal">
                                                        <span class="icon"><i
                                                                    class="fas fa-trash-alt"></i></span>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @else
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-12 pt-2">
                                    <div class="">
                                        <table class="table table-bordered table-hover">
                                            <thead class="alert alert-primary">
                                            <tr>
                                                <th scope="col">Champ</th>
                                                <th scope="col">Libelle</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr id="{{ $configuration->id }}">
                                                <td>{{ $configuration->champ }}</td>
                                                <td>{{ $configuration->libelle }}</td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-success showModal"
                                                            data-toggle="modal">
                                                        <span class="icon"><i class="fas fa-search"></i></span>
                                                    </button>
                                                    <button type="button" class="btn btn-primary editModal"
                                                            data-toggle="modal">
                                                        <span class="icon"><i class="fas fa-edit"></i></span>
                                                    </button>
                                                    <button type="button" class="btn btn-danger deleteModal"
                                                            data-toggle="modal">
                                                        <span class="icon"><i class="fas fa-trash-alt"></i></span>
                                                    </button>
                                                </td>
                                            </tr>
                            @endif
                        @endif
                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
            @endif--}}





    <div class="col-lg-4 pt-2 text-center">
        <button type="button" class="btn btn-success addModal" data-toggle="modal">
            Ajouter une configuration
        </button>
    </div>
</div>