<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Site3Controller extends Controller
{
    public function about()
    {
        return view('site3.about');
    }

    public function experience()
    {
        return view('site3.experience');
    }

    public function educations()
    {
        return view('site3.educations');
    }

    public function skills()
    {
        return view('site3.skills');
    }

    public function interests()
    {
        return view('site3.interests');
    }

    public function awards()
    {
        return view('site3.awards');
    }
}
