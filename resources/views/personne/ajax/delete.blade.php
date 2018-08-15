<div class="modal fade"
     id="modalDeletePersonne" tabindex="-1"
     role="dialog"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Personne - Supprimer une personne</h5>
            </div>
            <div class="modal-body">
                {!! Form::open(['method' => 'delete', 'url' => route('personne.destroy', $personne)]) !!}
                <div class="form-row text-center">
                    <p class="col-12">
                        Voulez-vous
                        supprimer {{ $personne->nom }} {{ $personne->prenom }}
                        ?
                    </p>
                </div>
                <div class="form-row text-center">
                    <div class="col-12">
                        <button type="button" class="btn btn-danger"
                                data-dismiss="modal">Annuler
                        </button>
                        <button type="submit"
                                class="btn btn-primary">Supprimer
                        </button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>