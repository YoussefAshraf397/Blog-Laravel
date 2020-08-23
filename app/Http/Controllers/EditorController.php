<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class EditorController extends Controller
{
    public function profile($username)
    {
        $editor = User::where('username',$username)->first();
        $posts = $editor->posts()->approved()->published()->get();
        return view('profile',compact('editor','posts'));
    }
}
