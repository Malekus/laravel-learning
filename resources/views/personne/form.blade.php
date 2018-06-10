<div class="field is-horizontal">
    <div class="field-label is-normal">
        {!! Form::label('nom', 'Nom', ['class' => 'label']) !!}
    </div>
    <div class="field-body">
        <div class="field">
            <p class="control">
                {!! Form::text('nom', null, ['class' => 'input']) !!}
            </p>
        </div>
    </div>
</div>

<div class="field is-horizontal">
    <div class="field-label is-normal">
        {!! Form::label('prenom', 'Prénom', ['class' => 'label']) !!}
    </div>
    <div class="field-body">
        <div class="field">
            <p class="control">
                {!! Form::text('prenom', null, ['class' => 'input']) !!}
            </p>
        </div>
    </div>
</div>

<div class="field is-horizontal">
    <div class="field-label is-normal">
        {!! Form::label('date_naissance', 'Date naissance', ['class' => 'label']) !!}
    </div>
    <div class="field-body">
        <div class="field">
            <p class="control">
                {!! Form::text('date_naissance', null, ['class' => 'input']) !!}
            </p>
        </div>
    </div>
</div>

<div class="field is-horizontal">
    <div class="field-label is-normal">
        {!! Form::label('sexe', 'Sexe', ['class' => 'label']) !!}
    </div>
    <div class="field-body">
        <div class="field">
            <p class="control">
                {!! Form::select('sexe', array('homme'=>"Homme", 'femme'=>"Femme"), 'homme', ['class' => 'select is-fullwidth']) !!}
            </p>
        </div>
    </div>
</div>

<div class="field is-horizontal">
    <div class="field-label is-normal">
        {!! Form::label('enfant', 'Enfant', ['class' => 'label']) !!}
    </div>
    <div class="field-body">
        <div class="field">
            <p class="control">
                {!! Form::text('enfant', null, ['class' => 'input']) !!}
            </p>
        </div>
    </div>
</div>

<div class="field is-horizontal">
    <div class="field-label is-normal">
        {!! Form::label('csp', 'CSP', ['class' => 'label']) !!}
    </div>
    <div class="field-body">
        <div class="field">
            <p class="control">
                {!! Form::text('csp', null, ['class' => 'input']) !!}
            </p>
        </div>
    </div>
</div>

<div class="field is-horizontal">
    <div class="field-label is-normal">
        {!! Form::label('categorie', 'Catégorie', ['class' => 'label']) !!}
    </div>
    <div class="field-body">
        <div class="field">
            <p class="control">
                {!! Form::text('categorie', null, ['class' => 'input']) !!}
            </p>
        </div>
    </div>
</div>

<div class="field is-horizontal">
    <div class="field-label is-normal">
        {!! Form::label('nationalite', 'Nationalité', ['class' => 'label']) !!}
    </div>
    <div class="field-body">
        <div class="field">
            <p class="control">
                {!! Form::text('nationalite', null, ['class' => 'input']) !!}
            </p>
        </div>
    </div>
</div>

<div class="field is-horizontal">
    <div class="field-label is-normal">
        {!! Form::label('logement', 'Logement', ['class' => 'label']) !!}
    </div>
    <div class="field-body">
        <div class="field">
            <p class="control">
                {!! Form::text('logement', null, ['class' => 'input']) !!}
            </p>
        </div>
    </div>
</div>

<div class="field is-horizontal">
    <div class="field-label is-normal">
        {!! Form::label('telephone', 'Téléphone', ['class' => 'label']) !!}
    </div>
    <div class="field-body">
        <div class="field">
            <p class="control">
                {!! Form::text('telephone', null, ['class' => 'input']) !!}
            </p>
        </div>
    </div>
</div>

<div class="field is-horizontal">
    <div class="field-label is-normal">
        {!! Form::label('email', 'Email', ['class' => 'label']) !!}
    </div>
    <div class="field-body">
        <div class="field">
            <p class="control">
                {!! Form::text('email', null, ['class' => 'input']) !!}
            </p>
        </div>
    </div>
</div>

<div class="field is-horizontal">
    <div class="field-label is-normal">
        {!! Form::label('adresse', 'Adresse', ['class' => 'label']) !!}
    </div>
    <div class="field-body">
        <div class="field">
            <p class="control">
                {!! Form::text('adresse', null, ['class' => 'input']) !!}
            </p>
        </div>
    </div>
</div>

<div class="field is-horizontal">
    <div class="field-label is-normal">
        {!! Form::label('code_postale', 'Code postale', ['class' => 'label']) !!}
    </div>
    <div class="field-body">
        <div class="field">
            <p class="control">
                {!! Form::text('code_postale', null, ['class' => 'input']) !!}
            </p>
        </div>
    </div>
</div>

<div class="field is-horizontal">
    <div class="field-label is-normal">
        {!! Form::label('ville', 'Ville', ['class' => 'label']) !!}
    </div>
    <div class="field-body">
        <div class="field">
            <p class="control">
                {!! Form::text('ville', null, ['class' => 'input']) !!}
            </p>
        </div>
    </div>
</div>

<div class="field is-horizontal">
    <div class="field-label">
        {!! Form::label('prioritaire', 'Prioritaire', ['class' => 'label']) !!}
    </div>
    <div class="field-body">
        <div class="field is-narrow">
            <p class="control">
                {!! Form::radio('prioritaire', 1, ['class' => 'radio']) !!} Oui
                {!! Form::radio('prioritaire', 0, true, ['class' => 'radio']) !!} Non
            </p>
        </div>
    </div>
</div>

<div class="field is-horizontal">
    <div class="field-label is-normal">
        {!! Form::label('matricule_caf', 'Matricule caf', ['class' => 'label']) !!}
    </div>
    <div class="field-body">
        <div class="field">
            <p class="control">
                {!! Form::text('matricule_caf', null, ['class' => 'input']) !!}
            </p>
        </div>
    </div>
</div>
