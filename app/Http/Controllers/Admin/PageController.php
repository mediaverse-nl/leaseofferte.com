<?php

namespace App\Http\Controllers\Admin;

use App\Pages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    protected $pages;

    public function __construct(Pages $pages)
    {
        $this->pages = $pages;
    }

    public function index()
    {
        $pages = $this->pages->get();

        return view('admin.page.index')
            ->with('pages', $pages);
    }

}


