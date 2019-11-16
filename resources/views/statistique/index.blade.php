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

                    <script src="https://code.highcharts.com/highcharts.js"></script>
                    <script src="https://code.highcharts.com/modules/exporting.js"></script>
                    <script src="https://code.highcharts.com/modules/export-data.js"></script>
                    <script src="https://code.highcharts.com/modules/broken-axis.js"></script>

                    <script type="text/javascript">
                        Highcharts.wrap(Highcharts.Chart.prototype, 'init', function (proceed, options, callback) {
                            if (options.chart && options.chart.forExport && options.series) {
                                $.each(options.series, function () {
                                    //if (this.visible === false) {
                                        this.showInLegend = false;
                                        //console.log(this)
                                    //}
                                });
                            }
                            return proceed.call(this, options, callback);
                        });
                    </script>

                    <div class="row">
                        <div class="col-12 my-5">
                            {!! App::make(\App\Http\Controllers\GrapheController::class)->makeChart($dateNow, 'sexe') !!}
                        </div>

                        <div class="col-12 my-5">
                            {!! App::make(\App\Http\Controllers\GrapheController::class)->makeChart($dateNow, 'probleme') !!}
                        </div>

                        <div class="col-12 my-5">
                            {!! App::make(\App\Http\Controllers\GrapheController::class)->makeChart($dateNow, 'action') !!}
                        </div>

                        <div class="col-12 my-5">
                            {!! App::make(\App\Http\Controllers\GrapheController::class)->makeChart($dateNow, 'age') !!}
                        </div>

                        <div class="col-12 my-5">
                            {!! App::make(\App\Http\Controllers\GrapheController::class)->makeChart($dateNow, 'rdvCourrier') !!}
                        </div>

                        <div class="col-12 my-5">
                        {!! App::make(\App\Http\Controllers\GrapheController::class)->makeChart($dateNow, 'nbAccompagnement') !!}
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
