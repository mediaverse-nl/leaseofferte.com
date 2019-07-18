<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class CreateProductForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('title', Field::TEXT, [
                'rules' => 'required|min:2|max:120'
            ])
            ->add('description', Field::TEXT, [
                'rules' => 'max:5000'
            ])
            ->add('images', 'standalone', [
//                'rules' => 'max:5000'
            ])
            ->add('meta_title', Field::TEXT, [
                'rules' => 'max:70'
            ])
            ->add('meta_description', Field::TEXTAREA, [
                'rules' => 'max:160'
            ])
            ->add('submit', 'submit', ['label' => 'Save form', 'attr' => ['class' => 'btn btn-success']]);
    }
}
