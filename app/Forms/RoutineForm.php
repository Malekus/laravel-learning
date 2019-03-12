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
        $this->formOptions = [
            'method' => 'POST',
            'url' => route('personne.routine', $this->getData('id')),
            'novalidate'

        ];

        $this
            ->add('probleme', 'form', [
                'label' => 'Problème',
                'class' => RoutineProblemeForm::class
            ])
            /*->add('action', 'form', [
                'label' => 'Action',
                'class' => RoutineActionForm::class
            ])*/

            ->add('action', 'collection', [
                'type' => 'form',
                'property' => 'name',    // Which property to use on the tags model for value, defualts to id

                'data' => [],            // Data is automatically bound from model, here we can override it
                'options' => [    // these are options for a single type
                    'label' => false,
//                    'attr' => ['class' => 'tag'],
  //                  'label' => 'Action',
                    'class' => RoutineActionForm::class,
                ]
            ])
            ->add('submit', 'submit', [
                'label' => 'Ajouter',
                'wrapper' => ['class' => 'col-12'],
                'attr' => ['class' => 'btn btn-primary'],
            ]);

    }
}
