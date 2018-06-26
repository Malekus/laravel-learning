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
                            <h1><i class="fas fa-cogs mr-2"></i>Configuration</h1>
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
                                            @foreach($types as $type)
                                                {!! \App\Http\Controllers\AjaxController::configTab('Personne', $type->type ) !!}
                                            @endforeach
                                        </div>

                                        <div class="col-lg-4 pt-2 text-center">
                                            <div class="">
                                                <button type="button" class="btn btn-md btn-success" data-toggle="modal" data-target="#modalAddConfiguration">
                                                    Ajouter une configuration
                                                </button>
                                            </div>
                                            @include('configuration.create')
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


@endsection
