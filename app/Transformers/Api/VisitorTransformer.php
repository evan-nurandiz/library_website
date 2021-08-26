<?php

namespace App\Transformers\Api;

use League\Fractal\TransformerAbstract;

class VisitorTransformer extends TransformerAbstract{

    public function transform($visitor){
        return[
            'id' => $visitor->id,
            'date' => $visitor->date,
            'time' => $visitor->time
        ];
    }
}


?>