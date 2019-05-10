@extends('layout.base')

@section('titre')
    · Statistique
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card sizeCard">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 pb-2">
                            <h1><i class="fas fa-chart-bar"></i> Statistique</h1>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="float-left w-100">
                                {!! Form::open(['method' => 'get','url' => route('statistique.index'), 'class' => 'form-inline w-100']) !!}
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
                        <div class="col-12 my-5">

                            {!! App::make(\App\Http\Controllers\StatistiqueController::class)->stats($dateNow, 'sexe') !!}

                        </div>

                        <div class="col-12 my-5">
                            {!! App::make(\App\Http\Controllers\StatistiqueController::class)->stats($dateNow, 'probleme') !!}
                        </div>

                        <div class="col-12 my-5">
                            {!! App::make(\App\Http\Controllers\StatistiqueController::class)->stats($dateNow, 'action') !!}
                        </div>

                        <div class="col-12 my-5">
                            {!! App::make(\App\Http\Controllers\StatistiqueController::class)->stats($dateNow, 'age') !!}
                        </div>

                        <div class="col-12 my-5">
                            {!! App::make(\App\Http\Controllers\StatistiqueController::class)->stats($dateNow, 'rdv_courrier') !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

