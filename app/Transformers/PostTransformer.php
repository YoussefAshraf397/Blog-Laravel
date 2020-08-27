<?php


namespace App\Transformers;


use App\Category;
use App\Post;
use League\Fractal\TransformerAbstract;

class PostTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
        'category',
        'tag',
    ];
    protected $availableIncludes = [

    ];

    public function transform(Post $post){
        $transfromedData = [
            'id' =>  (int) $post->id ,
            'Title' => $post->title ,
            'Slug' => $post->slug ,
            'Body' => str_limit($post->body , 50),
            'Picture' => $post->image
        ];

        return $transfromedData;
    }

    public function includeCategory(Post $post)
    {
        if ($post->categories) {
            return $this->collection($post->categories, new CategoryTransformer(), 'Category');
        }
    }

    public function includeTag(Post $post)
    {
        if ($post->tags) {
            return $this->collection($post->tags, new TagTransformer(), 'Tag');
        }
    }


}
