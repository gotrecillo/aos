<?php

namespace App\Http\Controllers;

use Backpack\MenuCRUD\app\Models\MenuItem;
use Backpack\PageManager\app\Models\Page;

class PageController extends Controller
{

    protected $data;

    public function home()
    {
        return $this->index('home');
    }

    public function index($slug)
    {
        $menu = MenuItem::getTree();

        $page = Page::findBySlug($slug);

        if ( ! $page) {
            abort(404, 'Please go back to our <a href="' . url('') . '">homepage</a>.');
        }

        $this->data['menu'] = $menu;
        $this->data['title'] = $page->title;
        $this->data['page']  = $page->withFakes();

        return view('pages.' . $page->template, $this->data);
    }
}