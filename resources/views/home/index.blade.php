@extends('layout.base')

@section('content')
    <div class="row no-gutters">
        <div class="col-lg-3 col-md-6 p-2">
            <div class="card">
                <div class="card-body">
                    <i class="fas fa-user float-right fa-4x mt-2"></i>
                    <h6 class="text-uppercase">Personne</h6>
                    <h1>{{ $personneCount }}</h1>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 p-2">
            <div class="card">
                <div class="card-body">
                    <i class="fas fa-users float-right fa-4x mt-2"></i>
                    <h6 class="text-uppercase">Partenaire</h6>
                    <h1>{{ $partenaireCount }}</h1>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 p-2">
            <div class="card">
                <div class="card-body">
                    <i class="fas fa-exclamation-triangle float-right fa-4x mt-2"></i>
                    <h6 class="text-uppercase">Problème</h6>
                    <h1>{{ $problemeCount }}</h1>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 p-2">
            <div class="card">
                <div class="card-body">
                    <i class="fas fa-cogs float-right fa-4x mt-2"></i>
                    <h6 class="text-uppercase">Rendez-vous</h6>
                    <h1>{{ $actionCount }}</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="row no-gutters">
        <div class="col-12 p-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="">Activité de la semaine</h5>
                    {!! $chart->container() !!}
                </div>
            </div>
        </div>
    </div>

    <div class="row no-gutters">
        <div class="col-12 p-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="">Activité de la semaine</h5>
                    <div id="chart1"></div>
                    {!! $chart1 !!}
                </div>
            </div>
        </div>
    </div>



    <div class="row no-gutters">
        <div class="col-6 p-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Activité de la semaine</h5>
                    Tab
                </div>
            </div>
        </div>
        <div class="col-6 p-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Activité de la semaine</h5>
                    Tab
                </div>
            </div>
        </div>
    </div>

    <div class="row no-gutters">
        <div class="col-6 p-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Caf du mois</h5>
                    Tab
                </div>
            </div>
        </div>
        <div class="col-6 p-2">
            <div class="card">
                <div class="card-body">
                    je sais pas encore

                </div>
            </div>
        </div>
    </div>

    {!! $chart->script() !!}
@endsection
