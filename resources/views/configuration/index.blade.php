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
                                                @foreach($personnes as $key => $personne)
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
                                                                        <td>{{ $personne->type }}</td>
                                                                        <td>{{ $personne->libelle }}</td>
                                                                        <td  class="text-center"><a href="#" class="btn btn-primary"><span
                                                                                        class="icon"><i
                                                                                            class="fas fa-search"></i></span>
                                                                                <span></span>
                                                                            </a>
                                                                            <a href="#"
                                                                               class="btn btn-danger">
                                                                <span class="icon">
                                                                  <i class="fas fa-trash-alt"></i>
                                                                </span>
                                                                                <span></span>
                                                                            </a>
                                                                        </td>
                                                                        </td>
                                                                    </tr>
                                                                    @else
                                                                        @if($personnes[$key-1]->type == $personne->type)
                                                                            <tr>
                                                                                <td>{{ $personne->type }}</td>
                                                                                <td>{{ $personne->libelle }}</td>
                                                                                <td  class="text-center"><a href="#"
                                                                                       class="btn btn-primary">
                                        <span class="icon">
                                          <i class="fas fa-search"></i>
                                        </span>
                                                                                        <span></span>
                                                                                    </a>
                                                                                    <a href="#"
                                                                                       class="btn btn-danger">
                                        <span class="icon">
                                          <i class="fas fa-trash-alt"></i>
                                        </span>
                                                                                        <span></span>
                                                                                    </a>
                                                                                </td>
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
                                                                        <th scope="col">Type</th>
                                                                        <th scope="col">Libelle</th>
                                                                        <th scope="col">Action</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <tr>
                                                                        <td>{{ $personne->type }}</td>
                                                                        <td>{{ $personne->libelle }}</td>
                                                                        <td  class="text-center">
                                                                            <a href="#"
                                                                               class="btn btn-primary">
                                        <span class="icon">
                                          <i class="fas fa-search"></i>
                                        </span>
                                                                                <span></span>
                                                                            </a>
                                                                            <a href="#"
                                                                               class="btn btn-danger">
                                        <span class="icon">
                                          <i class="fas fa-trash-alt"></i>
                                        </span>
                                                                                <span></span>
                                                                            </a>
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
                                                                {!! Form::label('categorie', 'Catégorie', ['class' => 'col-4 col-form-label']) !!}
                                                                <div class="col-8">
                                                                    {!! Form::text('categorie', null, ['class' => 'form-control', 'required']) !!}
                                                                    <div class="invalid-feedback">
                                                                        Saisir une catégorie
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row justify-content-center">
                                                                {!! Form::label('type', 'Type', ['class' => 'col-4 col-form-label']) !!}
                                                                <div class="col-8">
                                                                    {!! Form::text('type', null, ['class' => 'form-control', 'required']) !!}
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
                                                            <div class="form-group row justify-content-center">
                                                                {!! Form::label('libelle2', 'Libellé 2', ['class' => 'col-4 col-form-label']) !!}
                                                                <div class="col-8">
                                                                    {!! Form::text('libelle2', null, ['class' => 'form-control']) !!}
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
    <script>
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
    </script>
@endsection

{{--

<div class="col-6">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">Type</th>
                                                        <th scope="col">Libelle</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($personnes as $key => $personne)
                                                        @if($key != 0)
                                                            @if($personnes[$key-1]->type == $personne->type)
                                                                <tr>
                                                                    <td>{{ $personne->type }}</td>
                                                                    <td>{{ $personne->libelle }}</td>
                                                                    <td>Action</td>
                                                                </tr>
                                                            @else
                                                                </tbody>
                                                                </table>
                                                                </div>
                                                                </div>
                                                                <div class="col-6">
                                                                <div class="table-responsive">
                                                                <table class="table table-bordered table-hover">
                                                                <thead>
                                                                <tr>
                                                                    <th scope="col">Type</th>
                                                                    <th scope="col">Libelle</th>
                                                                    <th scope="col">Action</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <td>{{ $personne->type }}</td>
                                                                    <td>{{ $personne->libelle }}</td>
                                                                    <td>Action</td>
                                                                </tr>
                                                            @endif
                                                                <tr>
                                                                    <td>{{ $personne->type }}</td>
                                                                    <td>{{ $personne->libelle }}</td>
                                                                    <td>{{ $personnes[$key-1]->type == $personne->type  }} </td>
                                                                </tr>
                                                            @else
                                                                <tr>
                                                                    <td>{{ $personne->type }}</td>
                                                                    <td>{{ $personne->libelle }}</td>
                                                                    <td>Action</td>
                                                                </tr>
                                                            @endif
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

--}}