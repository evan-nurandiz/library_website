<?php

namespace App\Transformers\Api;

use League\Fractal\TransformerAbstract;

class BookTransformer extends TransformerAbstract{

    public function transform($books){
        return[
            'id' => $books->id,
            'writter' => $books->writter,
            'title' => $books->title,
            'description' => $books->description,
            'release' => $books->release_year,
            'status' => $books->status,
            'book_image' => 'http://192.168.1.76:8000/storage/book_image/'.$books->image
        ];
    }
}


?>