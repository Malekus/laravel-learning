<div class="modal fade" id="modalAddConfiguration" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $titleModal }} - Ajouter une
                    configuration</h5>
            </div>
            <div class="modal-body">
                {!! Form::open(['method' => 'post', 'url' => route('configuration.store'), 'class' => 'needs-validation', 'novalidate']) !!}

                <div class="form-group row justify-content-center">
                    {!! Form::label('categorie', 'Catégorie', ['class' => 'col-lg-4 col-form-label']) !!}
                    <div class="col-lg-8">
                        {!! Form::select('categorie', \App\Configuration::groupBy('categorie')->pluck('categorie', 'categorie'), $titleModal,['class' => 'form-control', 'required']) !!}
                        <div class="invalid-feedback">
                            Saisir une catégorie
                        </div>
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    {!! Form::label('champ', 'Champ', ['class' => 'col-4 col-form-label']) !!}
                    <div class="col-8">
                        {!! Form::select('champ', \App\Configuration::where('categorie', $titleModal)->orderBy('champ')->pluck('champ', 'champ'), null,['class' => 'form-control', 'required']) !!}
                        <div class="invalid-feedback">
                            Saisir un type
                        </div>
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    {!! Form::label('libelle', 'Libellé', ['class' => 'col-4 col-form-label']) !!}
                    <div class="col-8">
                        {!! Form::text('libelle', null, ['class' => 'form-control', 'required']) !!}
                        <div class="invalid-feedback">
                            Saisir un libellé
                        </div>
                    </div>
                </div>

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