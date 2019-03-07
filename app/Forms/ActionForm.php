<?php

namespace App\Forms;

use App\Configuration;
use App\Personne;
use App\Probleme;
use Kris\LaravelFormBuilder\Form;

class ActionForm extends Form
{
    public function buildForm()
    {
        if ($this->getModel() && $this->getModel()->id) {
            $method = 'PUT';
            $url = route('probleme.update', $this->getModel()->id);
        } else {
            $method = 'POST';
            $url = route('action.store');

        }

        $this->formOptions = [
            'method' => $method,
            'url' => $url,
            'novalidate'

        ];


        $wrapper = 'form-group row justify-content-center';
        $attr_class = 'form-control';
        $label_attr = 'col-form-label';

        $this
            ->add('probleme', 'entity', [
                'label' => 'Problème',
                'wrapper' => ['class' => $wrapper],
                'attr' => ['class' => $attr_class],
                'label_attr' => ['class' => $label_attr],
                'class' => Probleme::class,
                'property' => 'categorie_id',
                'query_builder' => function (\App\Probleme $model) {
                    return $model->where('personne_id', 58);
                },
                'empty_value' => 'Sélectionnez un type'
            ]);

        if ($this->getData('typeForm') === 'create') {
            $this->
            add('submit', 'submit', [
                'label' => 'Ajouter',
                'wrapper' => ['class' => 'col-12'],
                'attr' => ['class' => 'btn btn-primary'],
            ]);
        } else {
            $this->
            add('submit', 'submit', [
                'label' => 'Mettre à jour',
                'wrapper' => ['class' => 'col-12'],
                'attr' => ['class' => 'btn btn-success'],
            ]);
        }
    }
}
