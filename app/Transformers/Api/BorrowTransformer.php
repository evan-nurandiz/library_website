<?php

namespace App\Transformers\Api;

use League\Fractal\TransformerAbstract;

class BorrowTransformer extends TransformerAbstract{

    public function transform($borrow){
        return[
            'id' => $borrow->id,
            'type' => $borrow->type,
            'status' => $borrow->status,
            'date_borrowed' => $borrow->date_borrowed,
            'date_returned' => $borrow->date_returned,
            'book' => count($borrow->BorrowBook)
        ];
    }
}


?>