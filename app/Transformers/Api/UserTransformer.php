<?php

namespace App\Transformers\Api;

use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract{

    public function transform($user){
        return[
            'id' => $user->id,
            'student_id' => $user->student->id,
            'name' => $user->name,
            'token' => $user->token,
            'expires_id' => $user->expires_in
        ];
    }
}


?>