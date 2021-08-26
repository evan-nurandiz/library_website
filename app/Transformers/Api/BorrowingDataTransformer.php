<?php

namespace App\Transformers\Api;

use League\Fractal\TransformerAbstract;

class BorrowingDataTransformer extends TransformerAbstract{

    public function transform($borrow){
        return[
            'book' => [
                'book_id' => $borrow->id,
                'title' => $borrow->title,
                'writter' =>  $borrow->writter,
                'book_image' => 'http://192.168.1.76:8000/storage/book_image/'.$borrow->image,
            ]
        ];
    }
}


?>