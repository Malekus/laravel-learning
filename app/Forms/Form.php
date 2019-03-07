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
        $values = array_filter($this->getFields(), function ($value) {
            return get_class($value) != 'Kris\LaravelFormBuilder\Fields\EntityType' && get_class($value) != 'Kris\LaravelFormBuilder\Fields\ButtonType';
        });

        foreach ($values as $key => $value) {
            $this->getModel()->$key = $value->getRawValue();
        }
        parent::redirectIfNotValid($destination);
    }
}