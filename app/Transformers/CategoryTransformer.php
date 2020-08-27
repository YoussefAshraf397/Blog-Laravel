<?php


namespace App\Transformers;


use App\Category;
use League\Fractal\TransformerAbstract;

class CategoryTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
    ];
    protected $availableIncludes = [
    ];

    public function transform(Category $category){
        $transfromedData = [
            'id' =>  (int) $category->id ,
            'Name' => $category->name ,
            'Slug' => $category->slug ,
            'Picture' => $category->image
        ];

        return $transfromedData;
    }

}
