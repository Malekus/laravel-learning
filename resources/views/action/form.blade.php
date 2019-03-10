@if(isset($edit))

    <div class="form-group row justify-content-center">
        {!! Form::label('action', 'Action', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::select('action', \App\Configuration::where(['champ' => 'Action', 'categorie' => 'Action'])->pluck('libelle', 'id'), $action->action->id,['class' => 'form-control']) !!}
            <div class="invalid-feedback">
                Saisir un action
            </div>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        {!! Form::label('complement', 'Dirigé vers', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::select('complement', \App\Configuration::where(['champ' => 'Dirigé vers', 'categorie' => 'Action'])->pluck('libelle', 'id'), $action->complement->id,['class' => 'form-control']) !!}
            <div class="invalid-feedback">
                Saisir un complément
            </div>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        {!! Form::label('deplacement', 'Déplacement', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::select('deplacement', [1 => 'oui', 0 => 'non'], $action->deplacement, ['class' => 'form-control']) !!}
            <div class="invalid-feedback">
                Saisir un déplacement
            </div>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        {!! Form::label('dateAction', 'Date', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::date('dateAction', $action->dateAction,['class' => 'form-control']) !!}
            <div class="invalid-feedback">
                Saisir une date
            </div>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        {!! Form::label('duree', 'Durée', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::select('duree', [5 => 5, 10 => 10, 15 => 15, 20 => 20, 25 => 25, 30 => 30, 35 => 35, 40 => 40, 45 => 45, 50 => 50, 55 => 55], $action->duree, ['class' => 'form-control']) !!}
            <div class="invalid-feedback">
                Saisir une durée
            </div>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        {!! Form::label('information', 'Information', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::select('information', [1 => 'oui', 0 => 'non'], $action->information, ['class' => 'form-control']) !!}
            <div class="invalid-feedback">
                Saisir une information
            </div>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        {!! Form::label('droitOuvert', 'Ouverture de droit', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::select('droitOuvert', [1 => 'oui', 0 => 'non'], $action->droitOuvert, ['class' => 'form-control']) !!}
            <div class="invalid-feedback">
                Saisir une ouverture de droit
            </div>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        {!! Form::label('maintienDroit', 'Maintien de droit', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::select('maintienDroit', [1 => 'oui', 0 => 'non'], $action->maintienDroit, ['class' => 'form-control']) !!}
            <div class="invalid-feedback">
                Saisir un maintien de droit
            </div>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        {!! Form::label('conflit', 'Conflit', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::select('conflit', [1 => 'oui', 0 => 'non'], $action->conflit, ['class' => 'form-control']) !!}
            <div class="invalid-feedback">
                Saisir un conflit
            </div>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        {!! Form::label('perduDeVue', 'Perdu de vue', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::select('perduDeVue', [1 => 'oui', 0 => 'non'], $action->perduDeVue, ['class' => 'form-control']) !!}
            <div class="invalid-feedback">
                Saisir une perdu de vue
            </div>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        {!! Form::label('judiciarisation', 'Judiciarisation', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::select('judiciarisation', [1 => 'oui', 0 => 'non'], $action->judiciarisation, ['class' => 'form-control']) !!}
            <div class="invalid-feedback">
                Saisir un nom
            </div>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        {!! Form::label('avancement', 'Avancement', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::select('avancement', ['en cours' => 'en cours', 'terminé' => 'terminé'], $action->avancement, ['class' => 'form-control']) !!}
            <div class="invalid-feedback">
                Saisir un nom
            </div>
        </div>
    </div>

@else
    @if(isset($probleme))
        <div class="form-group row justify-content-center">
            {!! Form::label('probleme', 'Problème', ['class' => 'col-lg-2 col-form-label']) !!}
            <div class="col-lg-6">
                <select class="form-control" id="probleme" name="probleme" required="required">
                    <option value="{{ $probleme->id }}"> {{ $probleme->categorie->libelle}}
                        - {{ $probleme->type->libelle }}</option>
                </select>
                <div class="invalid-feedback">
                    Saisir un problème
                </div>
            </div>
        </div>
    @endif
    @if(isset($problemes))
        <div class="form-group row justify-content-center">
            {!! Form::label('probleme', 'Problème', ['class' => 'col-lg-2 col-form-label']) !!}
            <div class="col-lg-6">
                <select class="form-control" id="probleme" name="probleme" required="required">
                    @foreach($problemes as $probleme)
                        <option value="{{ $probleme->id }}"> {{ $probleme->categorie->libelle}}
                            - {{ $probleme->type->libelle }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    Saisir un problème
                </div>
            </div>
        </div>
    @endif



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
        {!! Form::label('dateAction', 'Date', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::date('dateAction', \Carbon\Carbon::now(),['class' => 'form-control']) !!}
            <div class="invalid-feedback">
                Saisir une date
            </div>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        {!! Form::label('deplacement', 'Déplacement', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::select('deplacement', [1 => 'oui', 0 => 'non'], 0, ['class' => 'form-control']) !!}
            <div class="invalid-feedback">
                Saisir un déplacement
            </div>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        {!! Form::label('duree', 'Durée', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::select('duree', [5 => 5, 10 => 10, 15 => 15, 20 => 20, 25 => 25, 30 => 30, 35 => 35, 40 => 40, 45 => 45, 50 => 50, 55 => 55], 5, ['class' => 'form-control']) !!}
            <div class="invalid-feedback">
                Saisir une durée
            </div>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        {!! Form::label('information', 'Information', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::select('information', [1 => 'oui', 0 => 'non'], 1, ['class' => 'form-control']) !!}
            <div class="invalid-feedback">
                Saisir une information
            </div>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        {!! Form::label('droitOuvert', 'Ouverture de droit', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::select('droitOuvert', [1 => 'oui', 0 => 'non'], 1, ['class' => 'form-control']) !!}
            <div class="invalid-feedback">
                Saisir une ouverture de droit
            </div>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        {!! Form::label('maintienDroit', 'Maintien de droit', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::select('maintienDroit', [1 => 'oui', 0 => 'non'], 1, ['class' => 'form-control']) !!}
            <div class="invalid-feedback">
                Saisir un maintien de droit
            </div>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        {!! Form::label('conflit', 'Conflit', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::select('conflit', [1 => 'oui', 0 => 'non'], 1, ['class' => 'form-control']) !!}
            <div class="invalid-feedback">
                Saisir un conflit
            </div>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        {!! Form::label('perduDeVue', 'Perdu de vue', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::select('perduDeVue', [1 => 'oui', 0 => 'non'], 1, ['class' => 'form-control']) !!}
            <div class="invalid-feedback">
                Saisir une perdu de vue
            </div>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        {!! Form::label('judiciarisation', 'Judiciarisation', ['class' => 'col-lg-2 col-form-label']) !!}
        <div class="col-lg-6">
            {!! Form::select('judiciarisation', [1 => 'oui', 0 => 'non'], 1, ['class' => 'form-control']) !!}
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

@endif

