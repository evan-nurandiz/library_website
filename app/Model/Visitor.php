<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $table = "visitors";
    protected $fillable = ['student_id','date','time'];

    public function Student(){
        return $this->belongsTo('App\Model\Student','student_id');
    }
}
