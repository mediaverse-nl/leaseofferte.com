<?php

namespace App\Http\Controllers\Admin;

use App\Forms\CreatePageForm;
use App\Forms\EditPageForm;
use App\Pages;
use App\Traits\ActivityTraits;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kris\LaravelFormBuilder\FormBuilder;

class PageController extends Controller
{
    use ActivityTraits, SoftDeletes;

    protected $pages;

    public function __construct(Pages $pages)
    {
        $this->pages = $pages->withTrashed();
    }

    public function index()
    {
        $pages = $this->pages->orderBy('deleted_at')->get();

        return view('admin.page.index')
            ->with('pages', $pages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(CreatePageForm::class, [
            'method' => 'POST',
            'url' => route('admin.pages.store')
        ]);

        return view('admin.page.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(CreatePageForm::class);

        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        $this->pages->insert($form->getFieldValues());

        $this->logCreatedActivity($this->pages, $form->getFieldValues());

        return redirect()->route('admin.pages.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(FormBuilder $formBuilder, $id)
    {
        $page = $this->pages->findOrFail($id);

        $form = $formBuilder->create(EditPageForm::class, [
            'method' => 'PATCH',
            'url' => route('admin.pages.update', $id),
            'model' => $page,
        ]);

        return view('admin.page.edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormBuilder $formBuilder, $id)
    {
        $form = $formBuilder->create(EditPageForm::class, [], $this->pages->findOrFail($id)->toArray());

        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        $page = $this->pages->where('id', '=', $id);
        $newPage = $form->getFieldValues();

        $this->logUpdatedActivity($this->pages, $page, $newPage);

        $page->update($form->getFieldValues());

        return redirect()->route('admin.pages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = $this->pages->findOrFail($id);

        $this->logDeletedActivity($page, $page->get());

        if ($page->trashed()){
            $page->restore($id);
        }else{
            $page->delete($id);
        }

        return redirect()->back();
    }
}


