<?php

namespace App\Http\Controllers\Api\RaspberryPi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Student;

class StudentController extends Controller
{
    public function Rfid(Request $request){
        $data = $request->all();

        $validator = Validator::make($data,[
            'id' => 'required',
            'rfid' => 'required'
        ]);

        if($validator->fails()){
            $response = response()->json('validator not complete',406);
            return $response;
        }else{
            try {
                $student = Student::where('id',$request->id)->first();
                $data = [
                    'rfid' => $request->rfid
                ];
                $student->update([
                    'rfid' => $data['rfid']
                ]);
                $status = 200;
                return $result = [
                    'message' => 'rfid berhasil diubah'
                ];
              } catch (\Exception $e) {
                $status = 404;  
                return $result = [
                    'error' => 'siswa tidak ada'
                ];
            }
    
            return response()->json($result, $status);
        }
    }
}
