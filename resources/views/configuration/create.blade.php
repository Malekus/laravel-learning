

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
             (function() {
                'use strict';
                window.addEventListener('load', function() {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function(form) {
                        form.addEventListener('submit', function(event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
            })();

             */



            $(document).ready(function () {
                $('#formAddConfiguration').on('submit', function (e) {



                    var forms = $('#formAddConfiguration');
                    forms.validate();
                    console.log(forms.valid());

                    return false;

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                    //$('#modalAddConfiguration').modal('toggle');

                    $.ajax({
                        url: '{{ url('/configuration') }}',
                        method: 'POST',
                        data: {
                            categorie : $('#setting_categorie').val(),
                            type : $('#setting_type').val(),
                            libelle : $('#setting_libelle').val()
                        },
                        success: function (data) {
                            console.log(data)
                        },
                        error: function(data){
                            console.log("fail");
                        }
                    });




                })
            });

        </script>
    @endsection