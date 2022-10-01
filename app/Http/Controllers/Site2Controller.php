<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Site2Controller extends Controller
{
    public function index()
    {
        $title = 'First Website';
        $desc = 'This is new content from Controller';
        return view('site2.index', compact('title', 'desc'));
    }

    public function about()
    {
        return view('site2.about');
    }

    public function contact()
    {
        return view('site2.contact');
    }

    public function post()
    {
        return view('site2.post');
    }
}
