<?php

namespace App\Forms;

use App\Configuration;

class RoutineActionForm extends Form
{
    public function buildForm()
    {
        $wrapper = 'form-group row';
        $attr_class = 'form-control subFormAction';
        $label_attr = 'col-form-label';

        $this
            ->add('action', 'entity', [
                'label' => 'Action',
                'wrapper' => ['class' => $wrapper],
                'attr' => ['class' => $attr_class],
                'label_attr' => ['class' => $label_attr],
                'class' => Configuration::class,
                'property' => 'libelle',
                'query_builder' => function (\App\Configuration $model) {
                    return $model->where(['champ' => 'Action', 'categorie' => 'Action']);
                },
                'empty_value' => 'Sélectionnez une action',
                'rules' => 'required',
                'error_messages' => [
                    'action.required' => 'Ce champ est obligatoire'
                ]
            ])
            ->add('complement', 'entity', [
                'label' => 'Dirigé vers',
                'wrapper' => ['class' => $wrapper],
                'attr' => ['class' => $attr_class],
                'label_attr' => ['class' => $label_attr],
                'class' => Configuration::class,
                'property' => 'libelle',
                'query_builder' => function (\App\Configuration $model) {
                    return $model->where(['champ' => 'Dirigé vers', 'categorie' => 'Action']);
                },
                'empty_value' => 'Sélectionnez une information complémentaire',
                'rules' => 'required',
                'error_messages' => [
                    'complement.required' => 'Ce champ est obligatoire'
                ]
            ])
            ->add('dateAction', 'date', [
                'label' => 'Date du rendez-vous',
                'wrapper' => ['class' => $wrapper],
                'attr' => ['class' => $attr_class],
                'label_attr' => ['class' => $label_attr],
                'value' => \Carbon\Carbon::now()->format('Y-m-d'),
            ])
            ->add('deplacement', 'select', [
                'label' => 'Déplacement',
                'wrapper' => ['class' => $wrapper],
                'attr' => ['class' => $attr_class],
                'label_attr' => ['class' => $label_attr],
                'choices' => [1 => 'oui', 0 => 'non'],
                'default_value' => 0
            ])
            ->add('duree', 'select', [
                'label' => 'Durée',
                'wrapper' => ['class' => $wrapper],
                'attr' => ['class' => $attr_class],
                'label_attr' => ['class' => $label_attr],
                'choices' => [0 => '00:00', 5 => '00:05', 10 => '00:10', 15 => '00:15', 20 => '00:20', 25 => '00:25', 30 => '00:30', 35 => '00:35', 40 => '00:40', 45 => '00:45', 50 => '00:50', 55 => '00:55', 60 => '01:00'],
                'default_value' => 0
            ])
            ->add('information', 'select', [
                'label' => 'Information',
                'wrapper' => ['class' => $wrapper],
                'attr' => ['class' => $attr_class],
                'label_attr' => ['class' => $label_attr],
                'choices' => [1 => 'oui', 0 => 'non'],
                'default_value' => 0
            ])
            ->add('droitOuvert', 'select', [
                'label' => 'Ouverture de droit',
                'wrapper' => ['class' => $wrapper],
                'attr' => ['class' => $attr_class],
                'label_attr' => ['class' => $label_attr],
                'choices' => [1 => 'oui', 0 => 'non'],
                'default_value' => 0
            ])
            ->add('maintienDroit', 'select', [
                'label' => 'Maintien de droit',
                'wrapper' => ['class' => $wrapper],
                'attr' => ['class' => $attr_class],
                'label_attr' => ['class' => $label_attr],
                'choices' => [1 => 'oui', 0 => 'non'],
                'default_value' => 0
            ])
            ->add('conflit', 'select', [
                'label' => 'Conflit',
                'wrapper' => ['class' => $wrapper],
                'attr' => ['class' => $attr_class],
                'label_attr' => ['class' => $label_attr],
                'choices' => [1 => 'oui', 0 => 'non'],
                'default_value' => 0
            ])
            ->add('perduDeVue', 'select', [
                'label' => 'Perdu de vue',
                'wrapper' => ['class' => $wrapper],
                'attr' => ['class' => $attr_class],
                'label_attr' => ['class' => $label_attr],
                'choices' => [1 => 'oui', 0 => 'non'],
                'default_value' => 0
            ])
            ->add('judiciarisation', 'select', [
                'label' => 'Judiciarisation',
                'wrapper' => ['class' => $wrapper],
                'attr' => ['class' => $attr_class],
                'label_attr' => ['class' => $label_attr],
                'choices' => [1 => 'oui', 0 => 'non'],
                'default_value' => 0
            ])
            ->add('avancement', 'select', [
                'label' => 'Avancement',
                'wrapper' => ['class' => $wrapper],
                'attr' => ['class' => $attr_class],
                'label_attr' => ['class' => $label_attr],
                'choices' => ['en cours' => 'en cours', 'terminé' => 'terminé'],
                'default_value' => 'terminé'
            ]);
    }
}
