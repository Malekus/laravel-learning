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
        {!! Form::text('prenom', null, ['class' => 'form-control', 'required']) !!}
        <div class="invalid-feedback">
            Saisir un prénom
        </div>
    </div>
</div>

<div class="form-group row justify-content-center">
    {!! Form::label('sexe', 'Sexe', ['class' => 'col-lg-2 col-form-label']) !!}
    <div class="col-lg-6">
        {!! Form::select('sexe', ['homme' => 'Homme', 'femme' => 'Femme'], 'homme', ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group row justify-content-center">
    {!! Form::label('structure', 'Structure', ['class' => 'col-lg-2 col-form-label']) !!}
    <div class="col-lg-6">
        {!! Form::select('structure', \App\Configuration::where(['champ' => 'Structure', 'categorie' => 'PartenaireExport'])->pluck('libelle', 'id'), null,['class' => 'form-control']) !!}
        <div class="invalid-feedback">
            Saisir un structure
        </div>
    </div>
</div>

<div class="form-group row justify-content-center">
    {!! Form::label('type', 'Type', ['class' => 'col-lg-2 col-form-label']) !!}
    <div class="col-lg-6">
        {!! Form::select('type', \App\Configuration::where(['champ' => 'Type', 'categorie' => 'PartenaireExport'])->pluck('libelle', 'id'), null,['class' => 'form-control']) !!}
        <div class="invalid-feedback">
            Saisir un type
        </div>
    </div>
</div>

<div class="form-row text-center">
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </div>
</div>