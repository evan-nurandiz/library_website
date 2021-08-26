<?php

namespace App\Transformers\RaspberryPi;

use League\Fractal\TransformerAbstract;

class BookTransformer extends TransformerAbstract{

    public function transform($books){
        return[
            'id' => $books->id,
            'title' => $books->title,
        ];
    }
}


?>