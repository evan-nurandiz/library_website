<?php

namespace App\Transformers\Api;

use League\Fractal\TransformerAbstract;

class ProfileTransformer extends TransformerAbstract{

    public function transform($profile){
        return[
            'name' => $profile->name,
            'nim' => $profile->nim,
            'departement' => $profile->departement,
            'major' => $profile->majors,
            'class' => $profile->class,
            'gender' => $profile->gender,
        ];
    }
}


?>