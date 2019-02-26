<?php

namespace App\Forms;

class PersonneForm extends Form
{
    public function buildForm()
    {

        parent::buildForm();

        $wrapper = 'form-group row justify-content-center';
        $attr_class = 'form-control'; // col-lg-6';
        $label_attr = 'col-form-label'; // col-lg-2 ';

        if ($this->getData('type') === 'create') {
            $this
                ->add('nom', 'text', [
                    'wrapper' => ['class' => $wrapper],
                    'attr' => ['class' => $attr_class],
                    'label_attr' => ['class' => $label_attr],
                    'errors' => ['class' => 'text-danger'],
                    'rules' => 'required',
                    'error_messages' => [
                        'nom.required' => 'Ce champ est obligatoire'
                    ]
                ])
                ->add('prenom', 'email', [
                    'wrapper' => ['class' => $wrapper],
                    'attr' => ['class' => $attr_class],
                    'label_attr' => ['class' => $label_attr],
                ])
                ->add('date_naissance', 'text', [
                    'wrapper' => ['class' => $wrapper],
                    'attr' => ['class' => $attr_class],
                    'label_attr' => ['class' => $label_attr],
                ])
                ->add('sexe', 'text', [
                    'wrapper' => ['class' => $wrapper],
                    'attr' => ['class' => $attr_class],
                    'label_attr' => ['class' => $label_attr],
                ])
                ->add('enfant', 'text', [
                    'wrapper' => ['class' => $wrapper],
                    'attr' => ['class' => $attr_class],
                    'label_attr' => ['class' => $label_attr],
                ])
                ->add('csp', 'text', [
                    'wrapper' => ['class' => $wrapper],
                    'attr' => ['class' => $attr_class],
                    'label_attr' => ['class' => $label_attr],
                ])
                ->add('categorie', 'text', [
                    'wrapper' => ['class' => $wrapper],
                    'attr' => ['class' => $attr_class],
                    'label_attr' => ['class' => $label_attr],
                ])
                ->add('nationalite', 'text', [
                    'wrapper' => ['class' => $wrapper],
                    'attr' => ['class' => $attr_class],
                    'label_attr' => ['class' => $label_attr],
                ])
                ->add('logement', 'text', [
                    'wrapper' => ['class' => $wrapper],
                    'attr' => ['class' => $attr_class],
                    'label_attr' => ['class' => $label_attr],
                ])
                ->add('telephone', 'text', [
                    'wrapper' => ['class' => $wrapper],
                    'attr' => ['class' => $attr_class],
                    'label_attr' => ['class' => $label_attr],
                ])
                ->add('email', 'text', [
                    'wrapper' => ['class' => $wrapper],
                    'attr' => ['class' => $attr_class],
                    'label_attr' => ['class' => $label_attr],
                ])
                ->add('adresse', 'text', [
                    'wrapper' => ['class' => $wrapper],
                    'attr' => ['class' => $attr_class],
                    'label_attr' => ['class' => $label_attr],
                ])
                ->add('code_postale', 'text', [
                    'wrapper' => ['class' => $wrapper],
                    'attr' => ['class' => $attr_class],
                    'label_attr' => ['class' => $label_attr],
                ])
                ->add('ville', 'text', [
                    'wrapper' => ['class' => $wrapper],
                    'attr' => ['class' => $attr_class],
                    'label_attr' => ['class' => $label_attr],
                ])
                ->add('prioritaire', 'text', [
                    'wrapper' => ['class' => $wrapper],
                    'attr' => ['class' => $attr_class],
                    'label_attr' => ['class' => $label_attr],
                ])
                ->add('matricule_caf', 'text', [
                    'wrapper' => ['class' => $wrapper],
                    'attr' => ['class' => $attr_class],
                    'label_attr' => ['class' => $label_attr],
                ])
                ->add('ajouter', 'submit', [
                    'wrapper' => ['class' => 'col-12'],
                    'attr' => ['class' => 'btn btn-primary'],
                ]);
        } elseif ($this->getData('type') === 'edit') {

        }
    }
}
