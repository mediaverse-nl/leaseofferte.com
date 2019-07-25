<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class CategoryForm extends Form
{
    public function buildForm()
    {
        dd($this->getData('categories'));
        $this
            ->add('category_id', 'collection', [
                'choices' => $this->getData('categories'),
                'choice_options' => [
                    'wrapper' => ['class' => 'choice-wrapper'],
                    'label_attr' => ['class' => 'label-class'],
                    'field_name' => 'name',
                    'property' => 'short_name',

                ],
                'type' => 'select',
                'property' => 'name',
                'prototype' => true,
                'field_type' => 'tessst',
                'empty_value' => '--- select category ---',
                'name' => 'category_ids',
                'field_name' => 'name',
//                'selected' => ,
//                'expanded' => true,
//                'multiple' => false,
                'label_show' => false,
            ], true);
    }
}
