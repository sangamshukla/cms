<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {

        $users=User::all();
        // $posts=Post::where('user_id', $user_id)->get();
        return view('posts', compact('users'));
    }

}
