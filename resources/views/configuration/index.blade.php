@extends('layout.base')

@section('titre')
    · Configuration
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 pb-2">
                            <h1><i class="fas fa-cogs"></i>  Configuration</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-personne-tab" data-toggle="tab"
                                       href="#nav-personne" role="tab" aria-controls="nav-personne"
                                       aria-selected="true">Personne</a>
                                    <a class="nav-item nav-link" id="nav-partenaire-tab" data-toggle="tab"
                                       href="#nav-partenaire" role="tab" aria-controls="nav-partenaire"
                                       aria-selected="false">Partenaire</a>
                                    <a class="nav-item nav-link" id="nav-probleme-tab" data-toggle="tab"
                                       href="#nav-probleme" role="tab" aria-controls="nav-probleme"
                                       aria-selected="false">Problème</a>
                                    <a class="nav-item nav-link" id="nav-action-tab" data-toggle="tab"
                                       href="#nav-action" role="tab" aria-controls="nav-action" aria-selected="false">Rendez-vous</a>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-personne" role="tabpanel"
                                     aria-labelledby="nav-personne-tab">
                                    {!! \App\Http\Controllers\ConfigurationController::content('Personne') !!}
                                </div>
                                <div class="tab-pane fade" id="nav-partenaire" role="tabpanel"
                                     aria-labelledby="nav-partenaire-tab">
                                    {!! \App\Http\Controllers\ConfigurationController::content('PartenaireExport') !!}
                                </div>
                                <div class="tab-pane fade" id="nav-probleme" role="tabpanel"
                                     aria-labelledby="nav-probleme-tab">
                                    {!! \App\Http\Controllers\ConfigurationController::content('Problème') !!}
                                </div>
                                <div class="tab-pane fade" id="nav-action" role="tabpanel"
                                     aria-labelledby="nav-action-tab">
                                    {!! \App\Http\Controllers\ConfigurationController::content('Action') !!}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('javascript')
    <script>

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

        $(document).ready(function () {
            $(document).on('click', '.addModal', function (e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                var configuration = $('.nav-item.nav-link.active').text();
                var url = '{{ url('/configuration/addModal/:configuration')}}';
                url = url.replace(':configuration', configuration);

                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function (data) {
                        $('.no-height').empty().append(data);
                        $('#modalAddConfiguration').modal();
                        $('#setting_libelle').val("");
                    },
                    error: function (data) {
                        $('.nav-item.nav-link.active i').remove();
                        console.log("fail");

                    }
                });

            });

            $(document).on('click', '.showModal', function (e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                var url = '{{ url('/configuration/showModal/:configuration')}}';
                url = url.replace(':configuration', $(this).parents('tr').attr('id'));

                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function (data) {
                        $('.no-height').empty().append(data);
                        $('#modalShowConfiguration').modal();
                        $('#setting_libelle').val("");
                    },
                    error: function (data) {
                        console.log("fail");

                    }
                });

            });

            $(document).on('click', '.editModal', function (e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                var configuration = $(this).parents('tr').attr('id');
                var url = '{{ url('/configuration/editModal/:configuration')}}';
                url = url.replace(':configuration', configuration);

                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function (data) {
                        $('.no-height').empty().append(data);
                        $('#modalEditConfiguration').modal();
                        $('#setting_libelle').val("");
                    },
                    error: function (data) {
                        console.log("fail");

                    }
                });

            });

            $(document).on('click', '.deleteModal', function (e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                var configuration = $(this).parents('tr').attr('id');
                var url = '{{ url('/configuration/deleteModal/:configuration')}}';
                url = url.replace(':configuration', configuration);
                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function (data) {
                        console.log(data);
                        $('.no-height').empty().append(data);
                        $('#modalDeleteConfiguration').modal();
                    },
                    error: function (data) {
                        console.log("fail");

                    }
                });
            });
        });
    </script>
@endsection