<?php

namespace App\Forms;

use App\Category;
use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class CreateCategoryForm extends Form
{
    public function buildForm()
    {
//        dd($this->getRequest());
        $this
            ->add('title', Field::TEXT, [
                'rules' => 'required|min:1|unique:categories,title,'.$this->getRequest()->title.',id,category_id,'.$this->getRequest()->category_id,
            ])
            ->add('category_id', 'select', [
                'empty_value' => '--- select category ---',
                'choices' => Category::all()->pluck('title', 'id')->toArray(),
                'rules' => 'unique:categories,category_id,'.$this->getRequest()->category_id.',id,title,'.$this->getRequest()->title,
//                'rules' => 'required|unique:categories,id,'.$this->id.',NULL,id,title,'.$this->value,
//                'unique:servers,ip,'.$this->id.',NULL,id,hostname,'.$request->input('hostname')
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
