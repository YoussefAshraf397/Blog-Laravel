<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request) {
        $user = auth()->user();
        $query = $request->input('title');

        if($request->has('title')) {
            $posts = Post::where('title','LIKE',"%$query%")->approved()->published()->get();
        }

        return response()->json($posts);
    }
}
