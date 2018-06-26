

    <!-- Modal -->
<div class="modal fade" id="modalAddConfiguration" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Personne - Ajouter une configuration</h5>
            </div>

            {{--
                , 'url' => route('configuration.store')
            --}}

            <div class="modal-body">
                {!! Form::open(['id' => 'formAddConfiguration', 'method' => 'post', 'class' => 'needs-validation', 'novalidate']) !!}
                <div class="form-group row justify-content-center">
                    {!! Form::label('categorie', 'Catégorie', ['class' => 'col-lg-4 col-form-label']) !!}
                    <div class="col-lg-8">
                        {!! Form::select('categorie', \App\Configuration::field('Personne', 'categorie'), 'Personne',['class' => 'form-control', 'required', 'id'=> "setting_categorie"]) !!}
                        <div class="invalid-feedback">
                            Saisir une catégorie
                        </div>
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    {!! Form::label('type', 'Type', ['class' => 'col-4 col-form-label']) !!}
                    <div class="col-8">
                        {!! Form::select('type', \App\Configuration::field('Personne', 'type'), null,['class' => 'form-control', 'required', 'id'=> "setting_type"]) !!}
                        <div class="invalid-feedback">
                            Saisir un type
                        </div>
                    </div>
                </div>
                <div class="form-group row justify-content-center">
                    {!! Form::label('libelle', 'Libellé', ['class' => 'col-4 col-form-label']) !!}
                    <div class="col-8">
                        {!! Form::text('libelle', null, ['class' => 'form-control', 'required', 'id'=> "setting_libelle"]) !!}
                        <div class="invalid-feedback">
                            Saisir un libellé
                        </div>
                    </div>
                </div>

                {{--

                <label for="libelle" class="col-4 col-form-label">Libelle</label>
                    <div class="col-8">
                        <input type="text" class="form-control" id="libelle" placeholder="Libellé">
                        <div class="invalid-feedback">
                            Saisir un libellé
                        </div>
                    </div>



                --}}

                <div class="form-row text-center">
                    <div class="col-12">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary" id="btnAjouterConfiguration">Ajouter</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>


    @section('jafter')
        <script>
/*


             */



            $(document).ready(function () {
                $('#formAddConfiguration').on('submit', function (e) {
                    e.preventDefault();
                    var loader = '<i class="fas fa-sync fa-spin mx-2"></i>';

                    $('a.nav-item.nav-link.active.show').add(loader);


                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '{{ url('/configuration') }}',
                        method: 'POST',
                        data: $(this).serialize(),
                        dataType: "json",
                        success: function (data) {
                            $('#modalAddConfiguration').modal('toggle');
                            $.ajax({
                                url: '{{ url('/ajax/Personne/Catégorie') }}',
                                method: 'GET',
                                success: function (data) {
                                    $('#PersonneCatégorie').replaceWith(data);
                                }
                            });
                        },
                        error: function(data){
                            console.log("fail");
                        }
                    });


                })
            });
        </script>
    @endsection