<div class="form-group row justify-content-center">
    {!! Form::label('dateCaf', 'Date', ['class' => 'col-lg-2 col-form-label']) !!}
    <div class="col-lg-6">
        {!! Form::date('dateCaf', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
        <div class="invalid-feedback">
            Saisir une date
        </div>
    </div>
</div>

<div class="form-group row justify-content-center">
    {!! Form::label('motif', 'Motif', ['class' => 'col-lg-2 col-form-label']) !!}
    <div class="col-lg-6">
        {!! Form::select('motif', \App\Configuration::where(['champ' => 'Motif', 'categorie' => 'Caf'])->pluck('libelle', 'id'), null,['class' => 'form-control']) !!}
        <div class="invalid-feedback">
            Saisir un motif
        </div>
    </div>
</div>

<div class="form-row text-center">
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </div>
</div>