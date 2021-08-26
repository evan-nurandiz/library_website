<?php

namespace App\Transformers\Api;

use League\Fractal\TransformerAbstract;

class StudentInfoTransformer extends TransformerAbstract{

    public function transform($student){
        return[
            'name' => $student->name,
            'nim' => $student->nim,
            'major' =>  $student->majors,
            'class' => $student->class,
        ];
    }
}


?>