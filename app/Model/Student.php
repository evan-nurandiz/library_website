<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = "students";
    protected $fillable = ['user_id','name','nim','departement','majors','class','gender','rfid','email'];

    public function user(){
        return $this->belongsTo('App\User','id');
    }

    public function Borrow(){
        return $this->hasMany('App\Model\Borrow','student_id');
    }

    public function Visiting(){
        return $this->hasMany('App\Model\Visitor','student_id');
    }

    public function penalty(){
        return $this->belongsTo('App\Model\Penalty','id');
    }
}
