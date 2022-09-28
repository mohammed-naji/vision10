<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Site1Controller extends Controller
{
    public function index()
    {
        $title = 'Grayscale';
        return view('site1.index', compact('title'));
    }
}
