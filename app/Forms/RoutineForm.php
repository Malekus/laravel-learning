<?php

namespace App\Forms;

/*
class ProblemeForm
{
    public function buildForm()
    {


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
                'label_attr' => ['class' => $label_attr],
                'value' => \Carbon\Carbon::now()->format('Y-m-d'),
            ]);
    }
}
*/

class RoutineForm extends Form
{
    public function buildForm()
    {
        $wrapper = 'form-group row justify-content-center A';
        $attr_class = 'form-control B';
        $label_attr = 'col-form-label C';

        $this->formOptions = [
            'method' => 'POST',
            'url' => route('personne.routine', $this->getData('id')),
            'novalidate',
            'class' => 'needs-validation'

        ];

        $this
            ->add('probleme', 'form', [
                'label' => 'Problème',
                'class' => RoutineProblemeForm::class
            ])
            ->add('action', 'collection', [
                'type' => 'form',
                'data' => [],
                'options' => [
                    'label' => false,
                    'class' => RoutineActionForm::class,
                ],
                'label' => false,
                'template' => 'personne.form_action',
                'rules' => 'nullable',
            ])
            ->add('submit', 'submit', [
                'label' => 'Ajouter',
                'wrapper' => ['class' => 'col-12'],
                'attr' => ['class' => 'btn btn-primary'],
            ]);
    }
}
