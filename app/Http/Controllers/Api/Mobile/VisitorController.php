<?php

namespace App\Http\Controllers\Api\Mobile;

use App\Http\Controllers\Controller;
use App\Transformers\Api\VisitorTransformer;
use Illuminate\Http\Request;
use App\Model\Student;
use App\Model\Visitor;

class VisitorController extends Controller
{
    public function GetData($id){
        $visitor = Visitor::where('student_id',$id)->latest()->paginate(5);
        return fractal()->
        collection($visitor)->
        transformWith(new VisitorTransformer)->
        toArray();
    }
    
    public function store(Request $request){
        $rfid = $request->all();
        
        try {
            $student = Student::where('rfid',$rfid)->first();
            $time = $this->getDate();
            $data = [
                'student_id' => $student->id,
                'date' => $time['date'],
                'time' => $time['time']
            ];
            Visitor::create($data);
          
          } catch (\Exception $e) {
          
            return $result = [
                'status' => 500,
                'error' => 'rfid not found'
            ];
        }
        
        return response()->json($result);
    }

    public function getDate(){
        $date = Carbon::now();
        
        return [
        'date' => $date->format('Y-m-d'),
        'time' => $date->toTimeString()
        ];
    }
}
