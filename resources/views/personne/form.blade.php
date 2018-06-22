@if(!isset($personne))
    <div class="form-group row justify-content-center">
        {!! Form::label('nom', 'Nom', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::text('nom', null, ['class' => 'form-control', 'required']) !!}
            <div class="invalid-feedback">
                Saisir un nom
            </div>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        {!! Form::label('prenom', 'Prénom', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::text('prenom', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group row justify-content-center">
        {!! Form::label('date_naissance', 'Date de naissance', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::text('date_naissance', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group row justify-content-center">
        {!! Form::label('sexe', 'Sexe', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::select('sexe', ['homme' => 'Homme', 'femme' => 'Femme'], 'homme', ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group row justify-content-center">
        {!! Form::label('enfant', 'Enfant', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::input('number', 'enfant', 0, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group row justify-content-center">
        {!! Form::label('csp', 'CSP', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::text('csp', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group row justify-content-center">
        {!! Form::label('categorie', 'Catégorie', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::text('categorie', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group row justify-content-center">
        {!! Form::label('nationalite', 'Nationalité', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::text('nationalite', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group row justify-content-center">
        {!! Form::label('logement', 'Logement', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::text('logement', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group row justify-content-center">
        {!! Form::label('telephone', 'Téléphone', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::text('telephone', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group row justify-content-center">
        {!! Form::label('email', 'Email', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::email('email', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group row justify-content-center">
        {!! Form::label('adresse', 'Adresse', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::text('adresse', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group row justify-content-center">
        {!! Form::label('code_postale', 'Code Postale', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::text('code_postale', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group row justify-content-center">
        {!! Form::label('ville', 'Ville', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::text('ville', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <fieldset class="form-group">
        <div class="row justify-content-center">
            <legend class="col-lg-2 col-form-label pt-0">Quartier prioritaire</legend>
            <div class="col-lg-6">
                <div class="form-check">
                    {!! Form::radio('prioritaire', 1, false, ['class' => 'form-check-input']) !!}
                    {!! Form::label('prioritaire', "Oui", ['class' => 'col-lg-2 form-check-label']) !!}
                </div>
                <div class="form-check">
                    {!! Form::radio('prioritaire', 0, true, ['class' => 'form-check-input']) !!}
                    {!! Form::label('prioritaire', "Non", ['class' => 'col-lg-2 form-check-label']) !!}
                </div>
            </div>
        </div>
    </fieldset>

    <div class="form-group row justify-content-center">
        {!! Form::label('matricule_caf', 'Matricule CAF', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::text('matricule_caf', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-row text-center">
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </div>
    </div>
@else
    <div class="form-group row justify-content-center">
        {!! Form::label('nom', 'Nom', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::text('nom', $personne->nom, ['class' => 'form-control', 'required']) !!}
            <div class="invalid-feedback">
                Saisir un nom
            </div>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        {!! Form::label('prenom', 'Prénom', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::text('prenom', $personne->prenom, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group row justify-content-center">
        {!! Form::label('date_naissance', 'Date de naissance', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::text('date_naissance', $personne->date_naissance, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group row justify-content-center">
        {!! Form::label('sexe', 'Sexe', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::select('sexe', ['homme' => 'Homme', 'femme' => 'Femme'], $personne->sexe, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group row justify-content-center">
        {!! Form::label('enfant', 'Enfant', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::input('number', 'enfant', $personne->enfant, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group row justify-content-center">
        {!! Form::label('csp', 'CSP', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::text('csp', $personne->csp, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group row justify-content-center">
        {!! Form::label('categorie', 'Catégorie', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::text('categorie', $personne->categorie, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group row justify-content-center">
        {!! Form::label('nationalite', 'Nationalité', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::text('nationalite', $personne->nationalite, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group row justify-content-center">
        {!! Form::label('logement', 'Logement', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::text('logement', $personne->logement, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group row justify-content-center">
        {!! Form::label('telephone', 'Téléphone', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::text('telephone', $personne->telephone, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group row justify-content-center">
        {!! Form::label('email', 'Email', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::email('email', $personne->email, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group row justify-content-center">
        {!! Form::label('adresse', 'Adresse', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::text('adresse', $personne->adresse, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group row justify-content-center">
        {!! Form::label('code_postale', 'Code Postale', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::text('code_postale', $personne->code_postale, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group row justify-content-center">
        {!! Form::label('ville', 'Ville', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::text('ville', $personne->ville, ['class' => 'form-control']) !!}
        </div>
    </div>

    <fieldset class="form-group">
        <div class="row justify-content-center">
            <legend class="col-lg-2 col-form-label pt-0">Quartier prioritaire</legend>
            <div class="col-lg-6">
                <div class="form-check">
                    {!! Form::radio('prioritaire', 1, $personne->prioritaire ? true : false, ['class' => 'form-check-input']) !!}
                    {!! Form::label('prioritaire', "Oui", ['class' => 'col-lg-2 form-check-label']) !!}
                </div>
                <div class="form-check">
                    {!! Form::radio('prioritaire', 0, $personne->prioritaire ? false : true, ['class' => 'form-check-input']) !!}
                    {!! Form::label('prioritaire', "Non", ['class' => 'col-lg-2 form-check-label']) !!}
                </div>
            </div>
        </div>
    </fieldset>

    <div class="form-group row justify-content-center">
        {!! Form::label('matricule_caf', 'Matricule CAF', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::text('matricule_caf', $personne->matricule_caf, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-row text-center">
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Modifier</button>
        </div>
    </div>
@endif





@section('javascript')


    @parent
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


@endsection