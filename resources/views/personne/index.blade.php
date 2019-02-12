@extends('layout.base')

@section('titre')
    · Personne
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card sizeCard">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 pb-2">
                            <h1><i class="fas fa-user"></i> Personne</h1>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="float-left">
                                {!! Form::open(['method' => 'get','url' => route('personne.index'), 'class' => 'form-inline']) !!}
                                <div class="form-group mb-2">
                                    {!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => "Nom ou Matricule CAF"]) !!}
                                </div>
                                <button type="submit" class="btn btn-info mx-sm-3 mb-2">
                                    Rechercher
                                </button>
                                {!! Form::close() !!}
                            </div>

                            <div class="float-right">
                                <a href="{{ route('personne.create') }}" class="btn btn-success">
                                    <span class="fas fa-plus"></span> Ajouter une personne
                                </a>
                            </div>
                        </div>
                    </div>
                    <div id="remplacer">
                        <div class="row">
                            <div class="col-12 mt-2">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nom</th>
                                            <th scope="col">Prénom</th>
                                            <th scope="col">Dernière activité</th>
                                            <th scope="col">Matricule Caf</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($personnes as $key => $personne)
                                            <tr>
                                                <th scope="row">{{ $key + 1 }}</th>
                                                <td>{{ $personne->nom  }}</td>
                                                <td>{{ $personne->prenom  }}</td>
                                                <td>{{ \Carbon\Carbon::parse($personne->update_at)->format('d/m/Y') }}</td>
                                                <td>{{ $personne->matricule_caf  }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('personne.show', $personne) }}"
                                                       class="btn btn-success">
                                                        <span class="icon"><i class="fas fa-search"></i></span>
                                                    </a>
                                                    <a href="{{ route('personne.edit', $personne) }}"
                                                       class="btn btn-info">
                                                        <span class="icon"><i class="fas fa-edit"></i></span>
                                                    </a>
                                                    <a href="{{ route('personne.routine',$personne) }}"
                                                       class="btn btn-dark">
                                                        <span class="icon"><i class="fas fa-redo-alt"></i></span>
                                                    </a>
                                                    <a href="#"
                                                       class="btn btn-warning">
                                                        <span class="icon"><i class="fas fa-calendar-alt"></i></span>
                                                    </a>
                                                    <button type="button" class="btn btn-danger deleteModal"
                                                            data-toggle="modal">
                                                        <span class="icon"><i class="fas fa-trash-alt"></i></span>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                        @include('layout.pagination', ['model' => $personnes])


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('javascript')

    <script>
        $(document).ready(function () {
            $(document).on('click', '.page-item', function (e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{ url('personne/list') }}',
                    method: 'post',
                    data: {
                        page: $(this).find('a').attr('href').split('=')[1],
                        search: new URL(window.location).searchParams.get("search")
                    },
                    datatype: 'json',
                    success: function (data) {
                        $('#remplacer').hide();
                        $('#remplacer').empty();
                        $('#remplacer').append(data);
                        $('#remplacer').fadeIn(500);
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

                console.log();
                var url = '{{ url('/personne/:personne/deleteModal')}}';
                var personne = $(this).parents('td').find('a').first().attr("href");
                personne = personne.substring(personne.lastIndexOf("/") + 1, personne.length);
                url = url.replace(':personne', personne);

                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function (data) {
                        console.log(data);
                        $('.nav-item.nav-link.active i').remove();
                        $('.no-height').empty();
                        $('.no-height').append(data);
                        $('#modalDeletePersonne').modal();
                    },
                    error: function (data) {
                        console.log("fail");
                    }
                });
            });
        });
    </script>
@endsection