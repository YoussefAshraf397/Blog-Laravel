<?php

namespace App\Http\Controllers\Editor;

use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index()
    {
        $posts = Auth::user()->posts;
        return view('editor.comments',compact('posts'));
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        if ($comment->post->user->id == Auth::id())
        {
            $comment->delete();
            toastr()->success('Comment Successfully Deleted');
        } else {
            toastr()->error('You are not authorized to delete this comment');
        }
        return redirect()->back();
    }
}
