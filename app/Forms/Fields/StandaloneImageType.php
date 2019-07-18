<?php

namespace App\Forms\Fields;

use Kris\LaravelFormBuilder\Fields\InputType;

class StandaloneImageType extends InputType {

    public function getTemplate()
    {
        return 'admin.fields.standalone';
    }

    public function getDefaults()
    {
        return [
            'rules' => '',
            'default_value' => '',
            'attr' => [
                'placeholder' => ''
            ],
        ];
    }
}