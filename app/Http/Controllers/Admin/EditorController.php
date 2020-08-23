<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class EditorController extends Controller
{
    public function index()
    {
        $editors = User::editors()
            ->withCount('posts')
            ->withCount('comments')
            ->withCount('favorite_posts')
            ->get();
        return view('admin.editors',compact('editors'));
    }

    public function destroy($id)
    {
        $author = User::findOrFail($id)->delete();

        toastr()->success('Editor Successfully Deleted');
        return redirect()->back();
    }
}
