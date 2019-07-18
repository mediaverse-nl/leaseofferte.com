<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class CategoryForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('category_id', 'select', [
                'choices' => $this->getData('categories'),
                'choice_options' => [
                    'wrapper' => ['class' => 'choice-wrapper'],
                    'label_attr' => ['class' => 'label-class'],
                ],
                'selected' => [],
                'expanded' => true,
                'multiple' => false,
                'label_show' => false,
            ]);
    }
}
