<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Post;
use App\Transformers\PostTransformer;
use Illuminate\Http\Request;

class SearchController extends BaseApiController
{
    public function index(Request $request) {
        $user = auth()->user();
        $query = $request->input('title');

        if($request->has('title')) {
            $posts = Post::where('title','LIKE',"%$query%")->approved()->published()->get();
        }

        return $this->transformDataModInclude($posts, ['category' , 'tag'], new PostTransformer(), 'Post' );
    }
}
