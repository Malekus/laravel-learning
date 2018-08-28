<div class="col-lg-4 pt-2 text-center d-block">
    <!-- Modal -->
    <div class="modal fade" id="modalDeleteProbleme" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Supprimer un problème</h5>
                </div>
                <div class="modal-body">
                    <p>
                        Vous supprimez le problème {{ $probleme->categorie->libelle}} - {{ $probleme->type->libelle }} pour {{ $probleme->personne->nom }} {{ $probleme->personne->prenom }} ?
                    </p>
                </div>
                {!! Form::open(['method' => 'delete', 'url' => route('probleme.destroy', $probleme)]) !!}
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