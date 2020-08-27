<?php


namespace App\Transformers;


use App\Tag;
use League\Fractal\TransformerAbstract;

class TagTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
    ];
    protected $availableIncludes = [
    ];

    public function transform(Tag $tag){
        $transfromedData = [
            'id' =>  (int) $tag->id ,
            'Name' => $tag->name ,
            'Slug' => $tag->slug ,
        ];

        return $transfromedData;
    }

}
