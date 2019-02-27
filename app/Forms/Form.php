<?php
/**
 * Created by IntelliJ IDEA.
 * User: Moi
 * Date: 25/02/2019
 * Time: 08:17
 */

namespace App\Forms;


class Form extends \Kris\LaravelFormBuilder\Form
{
    public function redirectIfNotValid($destination = null)
    {
        $values = $this->getFieldValues();
        foreach ($values as $key => $value) {
            $this->getModel()->$key = $value;
        }
        parent::redirectIfNotValid($destination);
    }

    public function buildForm()
    {
        if ($this->getModel() && $this->getModel()->id) {
            $method = 'PUT';
            $url = route('personne.update', $this->getModel()->id);
        } else {
            $method = 'POST';
            $url = route('personne.store');

        }

        $this->formOptions = [
            'method' => $method,
            'url' => $url,
            'novalidate',

        ];

        parent::buildForm();
    }


}