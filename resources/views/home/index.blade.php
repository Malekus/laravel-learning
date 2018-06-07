@extends('layout.base')

@section('content')
    <div class="columns">
        <div class="column is-3">
            <div class="card">
                <div class="card-content">
                    <div class="media">
                        <div class="media-left">
                            <span class="icon is-large"><i class="fas fa-3x fa-user-circle"></i></span>
                        </div>
                        <div class="media-content">
                            <p class="title is-4">Personne</p>
                        </div>
                    </div>
                    <div class="content">
                        <p class="title is-2 has-text-centered">150</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="column is-3">
            <div class="card">
                <div class="card-content">
                    <div class="media">
                        <div class="media-left">
                            <span class="icon is-large"><i class="fas fa-3x fa-user-friends"></i></span>
                        </div>
                        <div class="media-content">
                            <p class="title is-4">Partenaire</p>
                        </div>
                    </div>
                    <div class="content">
                        <p class="title is-2 has-text-centered">150</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="column is-3">
            <div class="card">
                <div class="card-content">
                    <div class="media">
                        <div class="media-left">
                            <span class="icon is-large"><i class="fas fa-3x fa-exclamation-triangle"></i></span>
                        </div>
                        <div class="media-content">
                            <p class="title is-4">Problème</p>
                        </div>
                    </div>
                    <div class="content">
                        <p class="title is-2 has-text-centered">150</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="column is-3">
            <div class="card">
                <div class="card-content">
                    <div class="media">
                        <div class="media-left">
                            <span class="icon is-large"><i class="fas fa-3x fa-calendar-check"></i></span>
                        </div>
                        <div class="media-content">
                            <p class="title is-4">Rendez-vous</p>
                        </div>
                    </div>
                    <div class="content">
                        <p class="title is-2 has-text-centered">150</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="columns">
        <div class="column">
            {!! $chart->container() !!}
        </div>
    </div>

    {!! $chart->script() !!}


@endsection
