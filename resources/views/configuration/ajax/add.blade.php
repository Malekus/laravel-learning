<div class="modal fade" id="modalAddConfiguration" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $title  }} - Ajouter une
                    configuration</h5>
            </div>
            <div class="modal-body">
                {!! Form::open(['method' => 'post', 'url' => route('configuration.store'), 'class' => 'needs-validation', 'novalidate']) !!}
                <div class="form-group row justify-content-center">
                    {!! Form::label('categorie', 'Catégorie', ['class' => 'col-lg-4 col-form-label']) !!}
                    <div class="col-lg-8">
                        {!! Form::select('categorie', \App\Configuration::field($title, 'categorie'), $title,['class' => 'form-control', 'required']) !!}
                        <div class="invalid-feedback">
                            Saisir une catégorie
                        </div>
                    </div>
                </div>

                @if($title != 'Problème')
                    <div class="form-group row justify-content-center">
                        {!! Form::label('type', 'Type', ['class' => 'col-4 col-form-label']) !!}
                        <div class="col-8">
                            {!! Form::select('type', \App\Configuration::field($title, 'type'), $title,['class' => 'form-control', 'required']) !!}
                            <div class="invalid-feedback">
                                Saisir un type
                            </div>
                        </div>
                    </div>
                @endif

                <div class="form-group row justify-content-center">
                    {!! Form::label('libelle', 'Libellé', ['class' => 'col-4 col-form-label']) !!}
                    <div class="col-8">
                        {!! Form::text('libelle', null, ['class' => 'form-control', 'required']) !!}
                        <div class="invalid-feedback">
                            Saisir un libellé
                        </div>
                    </div>
                </div>

                @if($title == 'Problème')
                    <div class="form-group row justify-content-center">
                        {!! Form::label('libelle2', 'Libellé 2', ['class' => 'col-4 col-form-label']) !!}
                        <div class="col-8">
                            {!! Form::text('libelle2', null, ['class' => 'form-control', 'required']) !!}
                            <div class="invalid-feedback">
                                Saisir un libellé 2
                            </div>
                        </div>
                    </div>
                @endif

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