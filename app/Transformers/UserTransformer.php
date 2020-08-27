<?php


namespace App\Transformers;


use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{

    protected $defaultIncludes = [
    ];
    protected $availableIncludes = [
    ];

    public function transform(User $user){
        $type = '';
        if($user->role_id == 1){
            $type = 'Admin';
        }
        else{
            $type = 'Editor' ;
        }
        $transfromedData = [
            'id' =>  (int) $user->id ,
            'type' => $type,
            'Name' => $user->name ,
            'User Name' => $user->username ,
            'E-mail' => $user->email ,
        ];


        if ($user->image) {
            $transfromedData['image'] = [
                'profile Picture' => (string)image($user->image ),
            ];
        } else {
            $transfromedData['image'] = [
                'profile Picture' => (string)image('profile_cam.png'),
            ];
        }

        return $transfromedData;

    }


}
