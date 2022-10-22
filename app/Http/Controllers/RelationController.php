<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Insurance;
use App\Models\Post;
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

    public function one_to_many()
    {
        // $post = Post::find(6);
        // dump($post->mycomments);

        // $post = Post::find(4);
        // dump($post->mycomments);

        $comment = Comment::find(2);

        dd($comment->post);
    }
}
