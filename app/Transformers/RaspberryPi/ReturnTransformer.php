<?php

namespace App\Transformers\RaspberryPi;

use League\Fractal\TransformerAbstract;

class ReturnTransformer extends TransformerAbstract{

    public function transform($books){
        return[
                'id' => $books->id,
                'title' => $books->title,
                'barcode' => $books->barcode
        ];
    }
}


?>