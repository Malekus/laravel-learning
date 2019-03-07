<div class="col-lg-4 pt-2 text-center d-block">
    <!-- Modal -->
    <div class="modal fade" id="modalShowAction" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Afficher un rendez-vous</h5>
                </div>
                <div class="modal-body">
                    <ul class="list-group">
                        <li class="list-group-item"><span
                                    class="font-weight-bold">Problème : </span>{{ $action->probleme->categorie->libelle }}
                            - {{ $action->probleme->type->libelle }}</li>
                        <li class="list-group-item"><span
                                    class="font-weight-bold">Type : </span>{{ $action->action->libelle  }}</li>
                        <li class="list-group-item"><span
                                    class="font-weight-bold">Dirigé vers : </span>{{ $action->complement->libelle  }}</li>
                        <li class="list-group-item"><span
                                    class="font-weight-bold">Avancement : </span>{{ $action->avancement }}</li>
                        <li class="list-group-item"><span
                                    class="font-weight-bold">Déplacement: </span>{{ $action->deplacement ? "oui" : "non" }}</li>
                        <li class="list-group-item"><span
                                    class="font-weight-bold">Durée : </span>{{ $action->duree }}</li>

                        <li class="list-group-item"><span
                                    class="font-weight-bold">Créé le : </span>{{ \Carbon\Carbon::parse($action->created_at)->format('d/m/Y')  }}
                        </li>
                        <li class="list-group-item"><span
                                    class="font-weight-bold">Dernière modification : </span>{{ \Carbon\Carbon::parse($action->updated_at)->format('d/m/Y')  }}
                        </li>
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
