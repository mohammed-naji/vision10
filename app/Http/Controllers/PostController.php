<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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

    public function store(Request $request)
    {
        // Validate the data
        $request->validate([
            'title' => 'required|min:3|max:40',
            'content' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg'
        ]);


        // Upload the files
        $img_name = rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads/posts'), $img_name);


        // INSERT INTO posts (title, content, image) VALUES ('ffff', 'eeeeer', 'eeeee');
        // Add data to Database
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $img_name
        ]);

        // Redirect to the all posts
        return redirect()->route('posts.index')->with('msg', 'Post added successfully')->with('type', 'success');
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.show', compact('post'));
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        File::delete(public_path('uploads/posts/'.$post->image));
        Post::destroy($id);

        return redirect()->route('posts.index')->with('msg', 'Post deleted successfully')->with('type', 'danger');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        // Validate the data
        $request->validate([
            'title' => 'required|min:3|max:40',
            'content' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg'
        ]);

        $post = Post::findOrFail($id);

        $img_name = $post->image;
        if($request->has('image')) {            // Delete the old image
            File::delete(public_path('uploads/posts/'.$img_name));

            $img_name = rand().time().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/posts'), $img_name);
        }


        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $img_name
        ]);

        // Redirect to the all posts
        return redirect()->route('posts.index')->with('msg', 'Post added successfully')->with('type', 'info');
    }
}
