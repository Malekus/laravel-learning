<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class PersonneForm extends Form
{
    public function buildForm()
    {

        $wrapper = 'form-group row justify-content-center';
        $attr_class = 'form-control col-lg-6';
        $label_attr = 'col-lg-2 col-form-label';

        if ($this->getData('type') === 'create') {
            $this
                ->add('nom', 'text', [
                    'wrapper' => ['class' => $wrapper],
                    'attr' => ['class' => $attr_class],
                    'label_attr' => ['class' => $label_attr],
                    'errors' => ['class' => 'invalid-feedback'],
                    'rules' => 'required',
                    'error_messages' => [
                        'nom.required' => 'le nom est obligatoire'
                    ]
                ])
                ->add('prenom', 'email', [
                    'wrapper' => ['class' => 'form-group row justify-content-center'],
                    'attr' => ['class' => 'form-control col-lg-6'],
                    'label_attr' => ['class' => 'col-lg-2 col-form-label'],
                ])
                ->add('date_naissance', 'text', [
                    'wrapper' => ['class' => 'form-group row justify-content-center'],
                    'attr' => ['class' => 'form-control col-lg-6'],
                    'label_attr' => ['class' => 'col-lg-2 col-form-label'],
                ])
                ->add('sexe', 'text', [
                    'wrapper' => ['class' => 'form-group row justify-content-center'],
                    'attr' => ['class' => 'form-control col-lg-6'],
                    'label_attr' => ['class' => 'col-lg-2 col-form-label'],
                ])
                ->add('enfant', 'text', [
                    'wrapper' => ['class' => 'form-group row justify-content-center'],
                    'attr' => ['class' => 'form-control col-lg-6'],
                    'label_attr' => ['class' => 'col-lg-2 col-form-label'],
                ])
                ->add('csp', 'text', [
                    'wrapper' => ['class' => 'form-group row justify-content-center'],
                    'attr' => ['class' => 'form-control col-lg-6'],
                    'label_attr' => ['class' => 'col-lg-2 col-form-label'],
                ])
                ->add('categorie', 'text', [
                    'wrapper' => ['class' => 'form-group row justify-content-center'],
                    'attr' => ['class' => 'form-control col-lg-6'],
                    'label_attr' => ['class' => 'col-lg-2 col-form-label'],
                ])
                ->add('nationalite', 'text', [
                    'wrapper' => ['class' => 'form-group row justify-content-center'],
                    'attr' => ['class' => 'form-control col-lg-6'],
                    'label_attr' => ['class' => 'col-lg-2 col-form-label'],
                ])
                ->add('logement', 'text', [
                    'wrapper' => ['class' => 'form-group row justify-content-center'],
                    'attr' => ['class' => 'form-control col-lg-6'],
                    'label_attr' => ['class' => 'col-lg-2 col-form-label'],
                ])
                ->add('telephone', 'text', [
                    'wrapper' => ['class' => 'form-group row justify-content-center'],
                    'attr' => ['class' => 'form-control col-lg-6'],
                    'label_attr' => ['class' => 'col-lg-2 col-form-label'],
                ])
                ->add('email', 'text', [
                    'wrapper' => ['class' => 'form-group row justify-content-center'],
                    'attr' => ['class' => 'form-control col-lg-6'],
                    'label_attr' => ['class' => 'col-lg-2 col-form-label'],
                ])
                ->add('adresse', 'text', [
                    'wrapper' => ['class' => 'form-group row justify-content-center'],
                    'attr' => ['class' => 'form-control col-lg-6'],
                    'label_attr' => ['class' => 'col-lg-2 col-form-label'],
                ])
                ->add('code_postale', 'text', [
                    'wrapper' => ['class' => 'form-group row justify-content-center'],
                    'attr' => ['class' => 'form-control col-lg-6'],
                    'label_attr' => ['class' => 'col-lg-2 col-form-label'],
                ])
                ->add('ville', 'text', [
                    'wrapper' => ['class' => 'form-group row justify-content-center'],
                    'attr' => ['class' => 'form-control col-lg-6'],
                    'label_attr' => ['class' => 'col-lg-2 col-form-label'],
                ])
                ->add('prioritaire', 'text', [
                    'wrapper' => ['class' => 'form-group row justify-content-center'],
                    'attr' => ['class' => 'form-control col-lg-6'],
                    'label_attr' => ['class' => 'col-lg-2 col-form-label'],
                ])
                ->add('matricule_caf', 'text', [
                    'wrapper' => ['class' => 'form-group row justify-content-center'],
                    'attr' => ['class' => 'form-control col-lg-6'],
                    'label_attr' => ['class' => 'col-lg-2 col-form-label'],
                ])
                ->add('ajouter', 'submit', [
                    'wrapper' => ['class' => 'col-12'],
                    'attr' => ['class' => 'btn btn-primary'],
                ]);
        } elseif ($this->getData('type') === 'edit') {

        }
    }
}
