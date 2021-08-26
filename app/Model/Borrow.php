<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    protected $table = "borrows";
    protected $fillable = ['student_id','type','status','date_borrowed','date_returned','return_date'];

    public function student(){
        return $this->belongsTo('App\Model\Student','student_id');
    }

    public function BorrowBook(){
        return $this->hasMany('App\Model\BorrowingBook','borrow_id');
    }

    public function penalty(){
        return $this->hasOne('App\Model\Penalty','borrow_id');
    }
}
