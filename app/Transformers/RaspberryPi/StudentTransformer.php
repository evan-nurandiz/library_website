<?php

namespace App\Transformers\RaspberryPi;

use League\Fractal\TransformerAbstract;

class StudentTransformer extends TransformerAbstract{

    public function transform($student){
        return[
            'id' => $student->id,
            'name' => $student->name,
            'jurusan' => $student->majors,
            'kelas' => $student->class,
            'status' => '200',
        ];
    }
}


?>