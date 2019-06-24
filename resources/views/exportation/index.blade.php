@extends('layout.base')

@section('titre')
    · Exportation
@endsection

@section('content')
    @dump($dateNow)

    <div class="row">
        <div class="col-12">
            <div class="card sizeCard">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 pb-2">
                            <h1><i class="fas fa-exchange-alt"></i>  Exportation</h1>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="float-left w-100">
                                {!! Form::open(['method' => 'get','url' => route('exportation.index'), 'class' => 'form-inline w-100']) !!}
                                <div class="form-group mb-2 col-4 p-0">
                                    {!! Form::text('search', null, ['class' => 'form-control col-12', 'placeholder' => "Exemple : 2014, 04/2017, 04/2014 - 08/2018 "]) !!}
                                </div>
                                <button type="submit" class="btn btn-info mx-sm-3 mb-2">
                                    Rechercher
                                </button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 mt-2">
                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapsePersonne" aria-expanded="true" aria-controls="collapsePersonne">
                                                Personne
                                            </button>
                                            <a href="{{ route('exportation.exportExcel', [$dateNow, 'personne']) }}"><span><i class="fas fa-download"></i></span></a>
                                        </h5>
                                    </div>

                                    <div id="collapsePersonne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            {!! App::make(\App\Http\Controllers\ExportationController::class)->ajaxModel($dateNow, 'personne') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsePartenaire" aria-expanded="false" aria-controls="collapsePartenaire">
                                                Partenaire
                                            </button>
                                            <a href="{{ route('exportation.exportExcel', [$dateNow, 'partenaire']) }}"><span><i class="fas fa-download"></i></span></a>
                                        </h5>
                                    </div>
                                    <div id="collapsePartenaire" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body">
                                            {!! App::make(\App\Http\Controllers\ExportationController::class)->ajaxModel($dateNow, 'partenaire') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseProbleme" aria-expanded="false" aria-controls="collapseProbleme">
                                                Problème
                                            </button>
                                            <a href="{{ route('exportation.exportExcel', [$dateNow, 'probleme']) }}"><span><i class="fas fa-download"></i></span></a>
                                        </h5>
                                    </div>
                                    <div id="collapseProbleme" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                        <div class="card-body">
                                            {!! App::make(\App\Http\Controllers\ExportationController::class)->ajaxModel($dateNow, 'probleme') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseAction" aria-expanded="false" aria-controls="collapseAction">
                                                Rendez-vous
                                            </button>
                                            <a href="{{ route('exportation.exportExcel', [$dateNow, 'action']) }}"><span><i class="fas fa-download"></i></span></a>
                                        </h5>
                                    </div>
                                    <div id="collapseAction" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body">
                                            {!! App::make(\App\Http\Controllers\ExportationController::class)->ajaxModel($dateNow, 'action') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseCaf" aria-expanded="false" aria-controls="collapseCaf">
                                                Liste Caf
                                            </button>
                                            <a href="{{ route('exportation.exportExcel', [$dateNow, 'listeCaf']) }}"><span><i class="fas fa-download"></i></span></a>
                                        </h5>
                                    </div>
                                    <div id="collapseCaf" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                        <div class="card-body">
                                            {!! App::make(\App\Http\Controllers\ExportationController::class)->ajaxModel($dateNow, 'listeCaf') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
@endsection