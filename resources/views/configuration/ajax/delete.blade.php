<div class="col-lg-4 pt-2 text-center d-block">
    <!-- Modal -->
    <div class="modal fade" id="modalDeleteConfiguration" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $titleModal }} - Supprimer une configuration</h5>
                </div>
                <div class="modal-body">
                    <p>
                        Vous supprimez la configuration {{ $configuration->type }} - {{ $configuration->libelle }} pour {{ $titleModal }} ?
                    </p>
                </div>
                {!! Form::open(['method' => 'delete', 'url' => route('configuration.destroy', $configuration)]) !!}
                <div class="modal-footer">
                    <div class="form-row">
                        <div class="col-12">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>