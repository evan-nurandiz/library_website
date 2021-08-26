<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BorrowingBook extends Model
{
    protected $table = "borrowing_books";
    protected $fillable = ['borrow_id','book_id'];

    public function borrow(){
        return $this->belongsTo('App\Model\Borrow','id');
    }

    public function Book(){
        return $this->hasOne('App\Model\Book','id','book_id');
    }
}
