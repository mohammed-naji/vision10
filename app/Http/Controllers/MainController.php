<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $name = 'Ali';
        $collage = 'IT';
        $std = '20180001';
        // return view('home')->with('name', $name)->with('collage', $collage)->with('std', $std);
        return view('home', compact('name', 'collage', 'std'));
        // return view('home', [
        //     'stdname' => $name,
        //     'stdcollage' => $collage,
        //     'stdno' => $std
        // ]);
    }

    public function about()
    {
        return 'about page';
    }

    public function team()
    {
        return 'team page';
    }

    public function searvices()
    {
        return 'searvices page';
    }

    public function contact()
    {
        return view('contact');
    }

}
