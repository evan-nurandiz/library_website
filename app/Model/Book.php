<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = "books";
    protected $fillable = ['writter','title','description','release_year','barcode','status','stock','image'];

    public function student(){
        return $this->belongsTo('App\Model\Student','id');
    }

    public function borrow(){
        return $this->belongsTo('App\Model\BorrowingBook','id','book_id');
    }
}
