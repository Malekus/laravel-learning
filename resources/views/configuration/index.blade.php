@extends('layout.base')

@section('titre')
    · Configuration
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 pb-2">
                            <h1><i class="fas fa-cogs"></i>  Configuration</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-personne-tab" data-toggle="tab"
                                       href="#nav-personne" role="tab" aria-controls="nav-personne"
                                       aria-selected="true">Personne</a>
                                    <a class="nav-item nav-link" id="nav-partenaire-tab" data-toggle="tab"
                                       href="#nav-partenaire" role="tab" aria-controls="nav-partenaire"
                                       aria-selected="false">Partenaire</a>
                                    <a class="nav-item nav-link" id="nav-probleme-tab" data-toggle="tab"
                                       href="#nav-probleme" role="tab" aria-controls="nav-probleme"
                                       aria-selected="false">Problème</a>
                                    <a class="nav-item nav-link" id="nav-action-tab" data-toggle="tab"
                                       href="#nav-action" role="tab" aria-controls="nav-action" aria-selected="false">Rendez-vous</a>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-personne" role="tabpanel"
                                     aria-labelledby="nav-personne-tab">
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
                                                                        <th scope="col">Type</th>
                                                                        <th scope="col">Libelle</th>
                                                                        <th scope="col">Action</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <tr>
                                                                        <td>{{ $configuration->type }}</td>
                                                                        <td>{{ $configuration->libelle }}</td>
                                                                        <td class="text-center">
                                                                            <button type="button"
                                                                                    class="btn btn-primary"
                                                                                    data-toggle="modal"
                                                                                    data-target={{ "#showModal".$configuration->id  }}>
                                                                                <span class="icon"><i
                                                                                            class="fas fa-search"></i></span>
                                                                            </button>

                                                                            <button type="button" class="btn btn-danger"
                                                                                    data-toggle="modal"
                                                                                    data-target={{ "#deleteModal".$configuration->id  }}>
                                                                                <span class="icon"><i
                                                                                            class="fas fa-trash-alt"></i></span>
                                                                            </button>
                                                                        </td>
                                                                        </td>
                                                                    </tr>
                                                                    <div class="d-none">
                                                                        @include('modal.show', ['titleModal' => 'Personne'])
                                                                        @include('modal.delete', ['titleModal' => 'Personne'])

                                                                    </div>
                                                                    @else
                                                                        @if($configurations[$key-1]->type == $configuration->type)
                                                                            <tr>
                                                                                <td>{{ $configuration->type }}</td>
                                                                                <td>{{ $configuration->libelle }}</td>
                                                                                <td class="text-center">
                                                                                    <button type="button"
                                                                                            class="btn btn-primary"
                                                                                            data-toggle="modal"
                                                                                            data-target={{ "#showModal".$configuration->id  }}>
                                                                                        <span class="icon"><i
                                                                                                    class="fas fa-search"></i></span>
                                                                                    </button>

                                                                                    <button type="button"
                                                                                            class="btn btn-danger"
                                                                                            data-toggle="modal"
                                                                                            data-target={{ "#deleteModal".$configuration->id  }}>
                                                                                        <span class="icon"><i
                                                                                                    class="fas fa-trash-alt"></i></span>
                                                                                    </button>
                                                                                </td>
                                                                                </td>
                                                                            </tr>
                                                                            <div class="d-none">
                                                                                @include('modal.show', ['titleModal' => 'Personne'])
                                                                                @include('modal.delete', ['titleModal' => 'Personne'])

                                                                            </div>
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
                                                                        <th scope="col">Type</th>
                                                                        <th scope="col">Libelle</th>
                                                                        <th scope="col">Action</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <tr>
                                                                        <td>{{ $configuration->type }}</td>
                                                                        <td>{{ $configuration->libelle }}</td>
                                                                        <td  class="text-center">

                                                                            <button type="button"
                                                                                    class="btn btn-primary"
                                                                                    data-toggle="modal"
                                                                                    data-target={{ "#showModal".$configuration->id  }}>
                                                                                <span class="icon"><i
                                                                                            class="fas fa-search"></i></span>
                                                                            </button>

                                                                            <button type="button" class="btn btn-danger"
                                                                                    data-toggle="modal"
                                                                                    data-target={{ "#deleteModal".$configuration->id  }}>
                                                                                <span class="icon"><i
                                                                                            class="fas fa-trash-alt"></i></span>
                                                                            </button>

                                                                        </td>
                                                                    </tr>
                                                                    <div class="d-none">
                                                                        @include('modal.show', ['titleModal' => 'Personne'])
                                                                        @include('modal.delete', ['titleModal' => 'Personne'])

                                                                    </div>

                                                                    @endif
                                                                    @endif
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 pt-2 text-center">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                                                Ajouter une configuration
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Personne - Ajouter une configuration</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            {!! Form::open(['method' => 'post', 'url' => route('configuration.store'), 'class' => 'needs-validation', 'novalidate']) !!}
                                                            <div class="form-group row justify-content-center">
                                                                {!! Form::label('categorie', 'Catégorie', ['class' => 'col-lg-4 col-form-label']) !!}
                                                                <div class="col-lg-8">
                                                                    {!! Form::select('categorie', \App\Configuration::field('Personne', 'categorie'), 'Personne',['class' => 'form-control', 'required']) !!}
                                                                    <div class="invalid-feedback">
                                                                        Saisir une catégorie
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row justify-content-center">
                                                                {!! Form::label('type', 'Type', ['class' => 'col-4 col-form-label']) !!}
                                                                <div class="col-8">
                                                                    {!! Form::select('type', \App\Configuration::field('Personne', 'type'), 'Personne',['class' => 'form-control', 'required']) !!}
                                                                    <div class="invalid-feedback">
                                                                        Saisir un type
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row justify-content-center">
                                                                {!! Form::label('libelle', 'Libellé', ['class' => 'col-4 col-form-label']) !!}
                                                                <div class="col-8">
                                                                    {!! Form::text('libelle', null, ['class' => 'form-control', 'required']) !!}
                                                                    <div class="invalid-feedback">
                                                                        Saisir un libellé
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-row text-center">
                                                                <div class="col-12">
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                                                                    <button type="submit" class="btn btn-primary">Ajouter</button>
                                                                </div>
                                                            </div>
                                                            {!! Form::close() !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                    </div>

                                </div>
                                <div class="tab-pane fade" id="nav-partenaire" role="tabpanel"
                                     aria-labelledby="nav-partenaire-tab">partenaire
                                </div>
                                <div class="tab-pane fade" id="nav-probleme" role="tabpanel"
                                     aria-labelledby="nav-probleme-tab">probleme
                                </div>
                                <div class="tab-pane fade" id="nav-action" role="tabpanel"
                                     aria-labelledby="nav-action-tab">action
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('javascript')
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
@endsection
