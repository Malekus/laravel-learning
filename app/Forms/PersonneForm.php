<?php

namespace App\Forms;

use App\Configuration;

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
                    'label' => 'Nom',
                    'wrapper' => ['class' => $wrapper],
                    'attr' => ['class' => $attr_class],
                    'label_attr' => ['class' => $label_attr],
                    'errors' => ['class' => 'text-danger'],
                    'rules' => 'required',
                    'error_messages' => [
                        'nom.required' => 'Ce champ est obligatoire'
                    ]
                ])
                ->add('prenom', 'text', [
                    'label' => 'Prénom',
                    'wrapper' => ['class' => $wrapper],
                    'attr' => ['class' => $attr_class],
                    'label_attr' => ['class' => $label_attr],
                ])
                ->add('date_naissance', 'date', [
                    'label' => 'Date de naissance',
                    'wrapper' => ['class' => $wrapper],
                    'attr' => ['class' => $attr_class],
                    'label_attr' => ['class' => $label_attr],
                ])
                ->add('sexe', 'select', [
                    'label' => 'Sexe',
                    'wrapper' => ['class' => $wrapper],
                    'attr' => ['class' => $attr_class],
                    'label_attr' => ['class' => $label_attr],
                    'choices' => ['homme' => 'Homme', 'femme' => 'Femme'],
                    'empty_value' => 'Sélectionnez un sexe'
                ])
                ->add('enfant', 'number', [
                    'label' => 'Enfant',
                    'wrapper' => ['class' => $wrapper],
                    'attr' => ['class' => $attr_class],
                    'label_attr' => ['class' => $label_attr],
                ])
                ->add('csp', 'entity', [
                    'label' => 'CSP',
                    'wrapper' => ['class' => $wrapper],
                    'attr' => ['class' => $attr_class],
                    'label_attr' => ['class' => $label_attr],
                    'class' => Configuration::class,
                    'property' => 'libelle',
                    'query_builder' => function (\App\Configuration $model) {
                        return $model->where(['champ' => 'CSP', 'categorie' => 'Personne']);
                    },
                    'empty_value' => 'Sélectionnez un Contrat de sécurisation professionnelle(CSP)'
                ])
                ->add('categorie', 'entity', [
                    'label' => 'Catégorie',
                    'wrapper' => ['class' => $wrapper],
                    'attr' => ['class' => $attr_class],
                    'label_attr' => ['class' => $label_attr],
                    'class' => Configuration::class,
                    'property' => 'libelle',
                    'query_builder' => function (\App\Configuration $model) {
                        return $model->where(['champ' => 'Catégorie', 'categorie' => 'Personne']);
                    },
                    'empty_value' => 'Sélectionnez une catégorie'
                ])
                ->add('nationalite', 'text', [
                    'label' => 'Nationalité',
                    'wrapper' => ['class' => $wrapper],
                    'attr' => ['class' => $attr_class],
                    'label_attr' => ['class' => $label_attr],
                ])
                ->add('logement', 'entity', [
                    'label' => 'Logement',
                    'wrapper' => ['class' => $wrapper],
                    'attr' => ['class' => $attr_class],
                    'label_attr' => ['class' => $label_attr],
                    'class' => Configuration::class,
                    'property' => 'libelle',
                    'query_builder' => function (\App\Configuration $model) {
                        return $model->where(['champ' => 'Logement', 'categorie' => 'Personne']);
                    },
                    'empty_value' => 'Sélectionnez un logement'
                ])
                ->add('telephone', 'text', [
                    'label' => 'Téléphone',
                    'wrapper' => ['class' => $wrapper],
                    'attr' => ['class' => $attr_class],
                    'label_attr' => ['class' => $label_attr],
                    'rules' => 'nullable|digits:10|numeric|max:10',
                    'error_messages' => [
                        'telephone.digits' => 'Ce numéro de téléphone n\'est pas correct.',
                        'telephone.numeric' => 'Ce n\'est pas un numéro de téléphone.',
                        'telephone.max' => '',
                    ]
                ])
                ->add('email', 'email', [
                    'label' => 'Email',
                    'wrapper' => ['class' => $wrapper],
                    'attr' => ['class' => $attr_class],
                    'label_attr' => ['class' => $label_attr],
                    'rules' => 'nullable|email',
                    'error_messages' => [
                        'email.email' => 'Ce champ n\'est pas une adresse mail.'
                    ]
                ])
                ->add('adresse', 'text', [
                    'label' => 'Adresse',
                    'wrapper' => ['class' => $wrapper],
                    'attr' => ['class' => $attr_class],
                    'label_attr' => ['class' => $label_attr],
                ])
                ->add('code_postale', 'text', [
                    'label' => 'Code Postale',
                    'wrapper' => ['class' => $wrapper],
                    'attr' => ['class' => $attr_class],
                    'label_attr' => ['class' => $label_attr],
                ])
                ->add('ville', 'text', [
                    'label' => 'Ville',
                    'wrapper' => ['class' => $wrapper],
                    'attr' => ['class' => $attr_class],
                    'label_attr' => ['class' => $label_attr],
                ])
                ->add('prioritaire', 'text', [
                    'label' => 'Quartier Prioritaire',
                    'wrapper' => ['class' => $wrapper],
                    'attr' => ['class' => $attr_class],
                    'label_attr' => ['class' => $label_attr],
                ])
                ->add('matricule_caf', 'text', [
                    'label' => 'Matricule Caf',
                    'wrapper' => ['class' => $wrapper],
                    'attr' => ['class' => $attr_class],
                    'label_attr' => ['class' => $label_attr],
                    'rules' => 'nullable|numeric|digits:10|max:7',
                    'error_messages' => [
                        'matricule_caf.digits' => 'La taille du matricule Caf n\'est pas correct.',
                        'matricule_caf.numeric' => 'Il n\'y a pas de lettre dans un matricule Caf.',
                    ]
                ])
                ->add('ajouter', 'submit', [
                    'label' => 'Ajouter',
                    'wrapper' => ['class' => 'col-12'],
                    'attr' => ['class' => 'btn btn-primary'],
                ]);
        } elseif ($this->getData('type') === 'edit') {

        }
    }
}
