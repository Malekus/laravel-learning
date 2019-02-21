<div class="form-group row justify-content-center">
    {!! Form::label('probleme', 'Problème', ['class' => 'col-lg-2 col-form-label']) !!}
    <div class="col-lg-6">
        <select class="form-control" id="probleme" name="probleme" required="required">
            @foreach($problemes as $probleme)
                <option value="{{ $probleme->id }}"> {{ $probleme->categorie->libelle}} - {{ $probleme->type->libelle }}</option>
            @endforeach
        </select>
        <div class="invalid-feedback">
            Saisir un problème
        </div>
    </div>
</div>

<div class="form-group row justify-content-center">
    {!! Form::label('action', 'Action', ['class' => 'col-lg-2 col-form-label']) !!}
    <div class="col-lg-6">
        {!! Form::select('action', \App\Configuration::where(['champ' => 'Action', 'categorie' => 'Action'])->pluck('libelle', 'id'), null,['class' => 'form-control']) !!}
        <div class="invalid-feedback">
            Saisir un action
        </div>
    </div>
</div>

<div class="form-group row justify-content-center">
    {!! Form::label('complement', 'Dirigé vers', ['class' => 'col-lg-2 col-form-label']) !!}
    <div class="col-lg-6">
        {!! Form::select('complement', \App\Configuration::where(['champ' => 'Dirigé vers', 'categorie' => 'Action'])->pluck('libelle', 'id'), null,['class' => 'form-control']) !!}
        <div class="invalid-feedback">
            Saisir un complément
        </div>
    </div>
</div>

<div class="form-group row justify-content-center">
    {!! Form::label('deplacement', 'Déplacement', ['class' => 'col-lg-2 col-form-label']) !!}
    <div class="col-lg-6">
        {!! Form::text('deplacement', null, ['class' => 'form-control']) !!}
        <div class="invalid-feedback">
            Saisir un déplacement
        </div>
    </div>
</div>

<div class="form-group row justify-content-center">
    {!! Form::label('duree', 'Durée', ['class' => 'col-lg-2 col-form-label']) !!}
    <div class="col-lg-6">
        {!! Form::text('duree', null, ['class' => 'form-control']) !!}
        <div class="invalid-feedback">
            Saisir une durée
        </div>
    </div>
</div>

<div class="form-group row justify-content-center">
    {!! Form::label('information', 'Information', ['class' => 'col-lg-2 col-form-label']) !!}
    <div class="col-lg-6">
        {!! Form::text('information', null, ['class' => 'form-control']) !!}
        <div class="invalid-feedback">
            Saisir une information
        </div>
    </div>
</div>

<div class="form-group row justify-content-center">
    {!! Form::label('droitOuvert', 'Ouverture de droit', ['class' => 'col-lg-2 col-form-label']) !!}
    <div class="col-lg-6">
        {!! Form::text('droitOuvert', null, ['class' => 'form-control']) !!}
        <div class="invalid-feedback">
            Saisir une ouverture de droit
        </div>
    </div>
</div>

<div class="form-group row justify-content-center">
    {!! Form::label('maintienDroit', 'Maintien de droit', ['class' => 'col-lg-2 col-form-label']) !!}
    <div class="col-lg-6">
        {!! Form::text('maintienDroit', null, ['class' => 'form-control']) !!}
        <div class="invalid-feedback">
            Saisir un maintien de droit
        </div>
    </div>
</div>

<div class="form-group row justify-content-center">
    {!! Form::label('conflit', 'Conflit', ['class' => 'col-lg-2 col-form-label']) !!}
    <div class="col-lg-6">
        {!! Form::text('conflit', null, ['class' => 'form-control']) !!}
        <div class="invalid-feedback">
            Saisir un conflit
        </div>
    </div>
</div>

<div class="form-group row justify-content-center">
    {!! Form::label('perduDeVue', 'Nom', ['class' => 'col-lg-2 col-form-label']) !!}
    <div class="col-lg-6">
        {!! Form::text('perduDeVue', null, ['class' => 'form-control',]) !!}
        <div class="invalid-feedback">
            Saisir une perdu de vue
        </div>
    </div>
</div>

<div class="form-group row justify-content-center">
    {!! Form::label('judiciarisation', 'Judiciarisation', ['class' => 'col-lg-2 col-form-label']) !!}
    <div class="col-lg-6">
        {!! Form::text('judiciarisation', null, ['class' => 'form-control']) !!}
        <div class="invalid-feedback">
            Saisir un nom
        </div>
    </div>
</div>

<div class="form-group row justify-content-center">
    {!! Form::label('avancement', 'Avancement', ['class' => 'col-lg-2 col-form-label']) !!}
    <div class="col-lg-6">
        {!! Form::select('avancement', ['en cours' => 'en cours', 'terminé' => 'terminé'], 'en cours', ['class' => 'form-control']) !!}
        <div class="invalid-feedback">
            Saisir un nom
        </div>
    </div>
</div>

