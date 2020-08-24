<?php

namespace App\Http\Controllers\API;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public $successStatus = 200;

    public function listAllPosts(){
        $posts = Post::latest()->approved()->published()->paginate(5);

        return response()->json(['data' => $posts], $this-> successStatus);
    }

    public function listAllPostsForVisitors(){
        $posts = Post::latest()->approved()->published()->paginate(5);

        return response()->json(['data' => $posts], $this-> successStatus);
    }

    public function viewPost($postId){
        $post = Post::find($postId);
        if($post){
            if($post->is_approved){
                return response()->json(['data' => $post], $this-> successStatus);
            }

        }
        return response()->json('This Post Not Found' , 404);
    }

    public function listAllCategories(){
        $categories = Category::latest()->get();
        return response()->json(['data' => $categories], $this-> successStatus);
    }
}
