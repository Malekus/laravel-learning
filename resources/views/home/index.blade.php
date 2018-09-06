@extends('layout.base')

@section('content')
        <div class="row no-gutters">
            <div class="col-lg-3 col-md-6 p-2">
                <div class="card">
                    <div class="card-body">
                        This is some text within a card body.
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 p-2">
                <div class="card">
                    <div class="card-body">
                        This is some text within a card body.
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 p-2">
                <div class="card">
                    <div class="card-body">
                        This is some text within a card body.
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 p-2">
                <div class="card">
                    <div class="card-body">
                        This is some text within a card body.
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
