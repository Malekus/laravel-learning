<div class="col-lg-4 pt-2 text-center d-block">
    <!-- Modal -->
    <div class="modal fade" id="modalShowProbleme" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Afficher un problème</h5>
                </div>
                <div class="modal-body">
                    <ul class="list-group">
                        <li class="list-group-item"><span class="font-weight-bold">Catégorie : </span>{{ $probleme->categorie->libelle  }}</li>
                        <li class="list-group-item"><span class="font-weight-bold">Type : </span>{{ $probleme->type->libelle  }}</li>
                        <li class="list-group-item"><span class="font-weight-bold">Créé le : </span>{{ \Carbon\Carbon::parse($probleme->created_at)->format('d/m/Y')  }}</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <div class="form-row">
                        <div class="col-12">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
