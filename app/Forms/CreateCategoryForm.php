<?php

namespace App\Forms;

use App\Category;
use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class CreateCategoryForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('title', Field::TEXT, [
                'rules' => 'required|min:1'
            ])
            ->add('description', Field::TEXTAREA, [
                'rules' => 'max:160'
            ])
            ->add('category_id', 'form', [
                'class' => 'App\Forms\CategoryForm',
                'formOptions' => [],
                'data' => ['categories' => array_merge([null => '-- select --'], Category::all()->pluck('title', 'id')->toArray())],
            ])
            ->add('images', 'standalone', [
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
