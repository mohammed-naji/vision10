<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormsController extends Controller
{
    public function form1()
    {
        return view('forms.form1');
    }

    public function form1_data(Request $request)
    {
        // dd($request->all());
        // dd($request->except('_token'));
        // dd($request->only('name', 'email'));

        $name = $request->name;
        $email = $request->email;
        $age = $request->age;

        return "Welcome ($name), your email is ($email) and your age is ($age)";
    }

    public function form2()
    {
        return view('forms.form2');
    }

    public function form2_data(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        // dd($request->all());
        $name = $request->name;
        $age = $request->age;

        return view('forms.form2_data', compact('name', 'age'));
    }

    public function form3()
    {
        return view('forms.form3');
    }

    public function form3_data(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:20|string',
            'email' => 'required|email|ends_with:@gmail.com',
            'age' => 'required|max:60'
        ], [
            'email.ends_with' => 'sorry, we only accept the gmail service',
        ]);

        dd($request->all());
    }

    public function form4()
    {
        // $alpha = range('a', 'z');
        // dd($alpha[rand(0,  count($alpha) -1 )]);
        return view('forms.form4');
    }

    public function form4_data(Request $request)
    {
        $request->validate([
            'cv' => 'required|image|mimes:png|max:100'
        ]);

        // dd($request->all());
        // $img_name = rand().time().$request->file('cv')->getClientOriginalName(); // zina.jpg
        // // abc.jpg => 9878964654547856566abc.jpg;
        // $request->file('cv')->move(public_path('uploads'), $img_name);
        $alpha = range('a', 'z');
        $char = $alpha[rand(0,  count($alpha) -1 )];
        // dd($alpha[rand(0,  count($alpha) -1 )]);
        $ex = strtolower($request->file('cv')->getClientOriginalExtension());
        $img_name = rand().'_'.rand().rand().'_'.rand().'_'.$char.'.'.$ex;
        // zina.jpg => 5654546661665_9876545646452464424_6465446_r.jpg
        $request->file('cv')->move(public_path('uploads'), $img_name);
    }
}
