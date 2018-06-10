@extends('layout.base')

@section('content')
    <div class="columns">
        <div class="column">
            <div class="card">
                <div class="column">
                    <p class="title is-2">Configuration</p>
                </div>
                <div class="column">
                    <div id="tabConfiguration" class="tabs is-large">
                        <ul>
                            <li><a data-toggle="tab" href="#personne">Personne</a></li>
                            <li><a data-toggle="tab" href="#probleme">Problème</a></li>
                            <li><a data-toggle="tab" href="#partenaire">Partenaire</a></li>
                            <li><a data-toggle="tab" href="#action">Rendez-vous</a></li>
                        </ul>
                    </div>

                    <div class="column tab-content">
                        <div id="personne" class="tab-pane fade in active">
                            personeee
                        </div>
                        <div id="probleme" class="tab-pane fade in active">
                            probleme
                        </div>
                        <div id="partenaire" class="tab-pane fade in active">
                            partenaire
                        </div>
                        <div id="action" class="tab-pane fade in active">
                            rendez vous
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



@endsection

