@extends('layout.base')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h1>Configuration</h1>
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
                                        @foreach($personnes as $key => $personne)
                                            @if($key == 0)
                                                <div class="col-lg-4 col-md-6 pt-2">
                                                    <div class="">
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
                                            @else
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
                                                <div class="col-lg-4 col-md-6 pt-2">
                                                    <div class="">
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
                                            @endif
                                        @endforeach
                                                            </tbody>
                                                        </table>
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