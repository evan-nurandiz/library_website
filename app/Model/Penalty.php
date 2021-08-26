<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Penalty extends Model
{
    protected $table = "penalties";
    protected $fillable = ['student_id','borrow_id','penalty','date_late'];

    public function student(){
        return $this->hasOne('App\Model\Student','id');
    }

    public function borrow(){
        return $this->belongsTo('App\Model\Borrow','borrow_id');
    }
}
