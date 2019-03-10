@if(isset($probleme))
    <div class="form-group row justify-content-center">
        {!! Form::label('categorie', 'Catégorie', ['class' => 'col-4 col-form-label']) !!}
        <div class="col-8">
            {!! Form::select('categorie', \App\Configuration::where(['champ' => 'Catégorie', 'categorie' => 'Problème'])->orderBy('libelle')->pluck('libelle', 'id'), $probleme->categorie->id,['class' => 'form-control']) !!}
            <div class="invalid-feedback">
                Saisir une catégorie
            </div>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        {!! Form::label('type', 'Type', ['class' => 'col-4 col-form-label']) !!}
        <div class="col-8">
            {!! Form::select('type', \App\Configuration::where(['champ' => 'Type', 'categorie' => 'Problème'])->orderBy('libelle')->pluck('libelle', 'id'), $probleme->type->id,['class' => 'form-control']) !!}
            <div class="invalid-feedback">
                Saisir un type
            </div>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        {!! Form::label('accompagnement', 'Accompagnement', ['class' => 'col-4 col-form-label']) !!}
        <div class="col-8">
            {!! Form::select('accompagnement', \App\Configuration::where(['champ' => 'Accompagnement', 'categorie' => 'Problème'])->orderBy('libelle')->pluck('libelle', 'id'), $probleme->accompagnement->id,['class' => 'form-control']) !!}
            <div class="invalid-feedback">
                Saisir un accompagnement
            </div>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        {!! Form::label('dateProbleme', 'Date', ['class' => 'col-4 col-form-label']) !!}
        <div class="col-8">
            {!! Form::date('dateProbleme', $probleme->dateProbleme,['class' => 'form-control']) !!}
            <div class="invalid-feedback">
                Saisir une date
            </div>
        </div>
    </div>
@else
    <div class="form-group row justify-content-center">
        {!! Form::label('categorie', 'Catégorie', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::select('categorie', \App\Configuration::where(['champ' => 'Catégorie', 'categorie' => 'Problème'])->orderBy('libelle')->pluck('libelle', 'id'), null,['class' => 'form-control']) !!}
            <div class="invalid-feedback">
                Saisir une catégorie
            </div>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        {!! Form::label('type', 'Type', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::select('type', \App\Configuration::where(['champ' => 'Type', 'categorie' => 'Problème'])->orderBy('libelle')->pluck('libelle', 'id'), null,['class' => 'form-control']) !!}
            <div class="invalid-feedback">
                Saisir un type
            </div>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        {!! Form::label('accompagnement', 'Accompagnement', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::select('accompagnement', \App\Configuration::where(['champ' => 'Accompagnement', 'categorie' => 'Problème'])->orderBy('libelle')->pluck('libelle', 'id'), null,['class' => 'form-control']) !!}
            <div class="invalid-feedback">
                Saisir un accompagnement
            </div>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        {!! Form::label('dateProbleme', 'Date', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::date('dateProbleme', \Carbon\Carbon::now(),['class' => 'form-control']) !!}
            <div class="invalid-feedback">
                Saisir une date
            </div>
        </div>
    </div>

@section('javascript')
    <script>
        $(document).ready(function () {
            var shortDate = function (myDate) {
                if (myDate.length == 2) return myDate.concat("/");
                if (myDate.length == 5) return myDate.concat("/");
                if (myDate.length == 10) return myDate.slice(0, -1);
                return myDate;
            };

            $('#date_naissance').keypress(function () {
                $('#date_naissance').val(shortDate($('#date_naissance').val()));
            });
        });
    </script>
@endsection
@endif