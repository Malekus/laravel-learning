<?php

namespace App\Forms;

use App\Configuration;

class ProblemeForm extends Form
{
    public function buildForm()
    {
        if ($this->getModel() && $this->getModel()->id) {
            $method = 'PUT';
            $url = route('probleme.update', $this->getModel()->id);
        } else {
            $method = 'POST';
            $url = route('probleme.store', ['type' => $this->getData('type'), 'id' => $this->getData('id')]);

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
            ->add('categorie', 'entity', [
                'label' => 'Catégorie',
                'wrapper' => ['class' => $wrapper],
                'attr' => ['class' => $attr_class],
                'label_attr' => ['class' => $label_attr],
                'class' => Configuration::class,
                'property' => 'libelle',
                'query_builder' => function (\App\Configuration $model) {
                    return $model->where(['champ' => 'Catégorie', 'categorie' => 'Problème']);
                },
                'empty_value' => 'Sélectionnez une catégorie',
                'rules' => 'required',
                'error_messages' => [
                    'categorie.required' => 'Ce champ est obligatoire'
                ]
            ])
            ->add('type', 'entity', [
                'label' => 'Type',
                'wrapper' => ['class' => $wrapper],
                'attr' => ['class' => $attr_class],
                'label_attr' => ['class' => $label_attr],
                'class' => Configuration::class,
                'property' => 'libelle',
                'query_builder' => function (\App\Configuration $model) {
                    return $model->where(['champ' => 'Type', 'categorie' => 'Problème']);
                },
                'empty_value' => 'Sélectionnez un type',
                'rules' => 'required',
                'error_messages' => [
                    'type.required' => 'Ce champ est obligatoire'
                ]
            ])
            ->add('accompagnement', 'entity', [
                'label' => 'Accompagnement',
                'wrapper' => ['class' => $wrapper],
                'attr' => ['class' => $attr_class],
                'label_attr' => ['class' => $label_attr],
                'class' => Configuration::class,
                'property' => 'libelle',
                'query_builder' => function (\App\Configuration $model) {
                    return $model->where(['champ' => 'Accompagnement', 'categorie' => 'Problème']);
                },
                'empty_value' => 'Sélectionnez un accompagnement',
                'rules' => 'required',
                'error_messages' => [
                    'accompagnement.required' => 'Ce champ est obligatoire'
                ]
            ])
            ->add('dateProbleme', 'date', [
                'label' => 'Date',
                'wrapper' => ['class' => $wrapper],
                'attr' => ['class' => $attr_class],
                'label_attr' => ['class' => $label_attr]
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
