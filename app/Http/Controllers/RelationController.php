<?php

namespace App\Http\Controllers;

use App\Models\Insurance;
use App\Models\User;
use Illuminate\Http\Request;

class RelationController extends Controller
{
    public function one_to_one()
    {
        // $user = User::find(2);
        // // $in = Insurance::where('user_id', 2)->first();

        // dd($user->insurance);

        $in = Insurance::find(1);

        dd($in->user);

    }
}
