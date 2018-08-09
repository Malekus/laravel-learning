<div class="col-lg-4 pt-2 text-center d-block">
    <!-- Modal -->
    <div class="modal fade" id="modalEditConfiguration" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $titleModal }} - Modifier une configuration</h5>
                </div>
                {!! Form::open(['method' => 'put', 'url' => route('configuration.update', $configuration)]) !!}
                <div class="modal-body">
                    <div class="form-group row justify-content-center">
                        {!! Form::label('categorie', 'Catégorie', ['class' => 'col-lg-4 col-form-label']) !!}
                        <div class="col-lg-8">
                            {!! Form::select('categorie', \App\Configuration::field($titleModal, 'categorie'), $configuration->categorie,['class' => 'form-control', 'required']) !!}
                            <div class="invalid-feedback">
                                Saisir une catégorie
                            </div>
                        </div>
                    </div>

                    @if($titleModal != 'Problème')
                        <div class="form-group row justify-content-center">
                            {!! Form::label('type', 'Type', ['class' => 'col-4 col-form-label']) !!}
                            <div class="col-8">
                                {!! Form::select('type', \App\Configuration::field($titleModal, 'type'), $configuration->type,['class' => 'form-control', 'required']) !!}
                                <div class="invalid-feedback">
                                    Saisir un type
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="form-group row justify-content-center">
                        {!! Form::label('libelle', 'Libellé', ['class' => 'col-4 col-form-label']) !!}
                        <div class="col-8">
                            {!! Form::text('libelle', $configuration->libelle, ['class' => 'form-control', 'required']) !!}
                            <div class="invalid-feedback">
                                Saisir un libellé
                            </div>
                        </div>
                    </div>

                    @if($titleModal == 'Problème')
                        <div class="form-group row justify-content-center">
                            {!! Form::label('libelle2', 'Libellé 2', ['class' => 'col-4 col-form-label']) !!}
                            <div class="col-8">
                                {!! Form::text('libelle2', $configuration->libelle2, ['class' => 'form-control', 'required']) !!}
                                <div class="invalid-feedback">
                                    Saisir un libellé
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <div class="form-row">
                        <div class="col-12">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-primary">Modifier</button>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>