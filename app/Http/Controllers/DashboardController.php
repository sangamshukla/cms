<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class DashboardController extends Controller
{
    public function index()
    {
        //the body of the function
        $user=User::where('id', auth()->user()->id)->get();
        return view('dashboard', compact('user'));
    }
    public function show($id)
    {
        $post=Post::findOrFail($id);
        //the body of the function
        return view('posts', compact('post'));
    }
    public function post(Request $request)
    {
        Comment::create([
            'comment'=>$request->comment,
            'user_id'=>auth()->user()->id,
            'post_id'=>$request->post_id
        ]);
        return redirect(route('post-detail', $request->post_id))->with('msg','comemnt added');
    }
    public function create()
    {
        return view('create-post');
    }
    public function store(Request $request)
    {
        Post::create([
            'user_id'=>auth()->user()->id,
            'title'=>$request->title,
            'image'=>"file.jpg",
            'description'=>$request->description
        ]);
        return redirect('dashboard')->with('success', 'Post has been submitted');
    }
    public function home()
    {
        $posts=Post::all();
        return view('welcome', compact('posts'));
        //the body of the function
    }
}
