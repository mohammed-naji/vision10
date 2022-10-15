<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        // $posts = Post::all();
        // $posts = Post::get();
        // $posts = Post::orderBy('id', 'desc')->paginate(30);
        // $posts = Post::simplepaginate(20);
        // $posts = Post::limit(10)->get();
        // $posts = Post::where('id', '=', 100)->get();
        // $posts = Post::where('id', '<=', 100)->get();
        // $posts = Post::find(1500);
        // if(!$posts) {
        //     abort(404);
        // }
        // $posts = Post::findOrFail(2001);
        // dd($posts->title);

        if($request->has('search')) {
            $posts = Post::orderBy('id', 'desc')
            ->where('title', 'like', '%'.$request->search.'%')
            ->paginate(10);
        }else {
            $posts = Post::orderBy('id', 'desc')->paginate(10);
        }

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }
}
