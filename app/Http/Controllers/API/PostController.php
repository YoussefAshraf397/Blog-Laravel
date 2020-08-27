<?php

namespace App\Http\Controllers\API;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Transformers\CategoryTransformer;
use App\Transformers\PostTransformer;
use Illuminate\Http\Request;

class PostController extends BaseApiController
{
    public $successStatus = 200;

    public function listAllPosts(){
        $posts = Post::latest()->approved()->published()->paginate(5);

        return $this->transformDataModInclude($posts, ['category' , 'tag'], new PostTransformer(), 'Post' );
    }

    public function listAllPostsForVisitors(){
        $posts = Post::latest()->approved()->published()->paginate(5);

        return $this->transformDataModInclude($posts, ['category' , 'tag'], new PostTransformer(), 'Post' );
    }

    public function viewPost($postId){
        $post = Post::find($postId);
        if($post){
            if($post->is_approved){
                return $this->transformDataModInclude($post, ['category' , 'tag'], new PostTransformer(), 'Post' );
            }

        }
        return response()->json('This Post Not Found' , 404);
    }

    public function listAllCategories(){
        $categories = Category::latest()->get();
        return $this->transformDataModInclude($categories, '', new CategoryTransformer(), 'Category' );
    }
}
