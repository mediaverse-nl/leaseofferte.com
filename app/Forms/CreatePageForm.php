<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class CreatePageForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('title', Field::TEXT, [
                'rules' => 'required|min:1'
            ])
            ->add('slug', Field::TEXT, [
                'rules' => 'required|alpha_dash|min:2|max:120|unique:pages,slug,'.$this->getData('id')
            ])
            ->add('images', Field::TEXT, [
                'rules' => 'max:5000'
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
