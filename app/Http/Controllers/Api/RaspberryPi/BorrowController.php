<?php

namespace App\Http\Controllers\Api\RaspberryPi;

use App\Transformers\RaspberryPi\BookTransformer;
use App\Transformers\RaspberryPi\StudentTransformer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Book;
use App\Model\Student;
use App\Model\Borrow;
use App\Model\BorrowingBook;
use Validator;
use Carbon\Carbon;

class BorrowController extends Controller
{
    public function GetBookByBarcode(Request $request){
        $barcode = $request->all();
        
        try {
            $book = Book::where('barcode',$barcode)->first();
            $result = fractal()->item($book)->transformWith(new BookTransformer)->toArray();
            $status_code = '200';
        } catch (\Exception $e) {
            $result = [
                'error' => 'book not found'
            ];
            $status_code = '404';
        }

        return response()->json($result,$status_code);
    }

    public function GetStudentData(Request $request){
        $rfid = $request->all();
        try{
            $student = Student::where('rfid',$rfid)->first();
            $result = fractal()->item($student)->transformWith(new StudentTransformer)->toArray();
            $status_code = '200';
        }catch (\Exception $e) {
            $result = [
                'error' => 'student not found'
            ];
            $status_code = '404';
        }
        return response()->json($result,$status_code);
    }

    public function store(Request $request){
        $data = $request->all();
        try{
            $validator = Validator::make($data,[
                'student_id' => 'required',
                'book_id' => 'required'
            ]);
            if($validator->fails()){
                $response = response()->json('validator not complete',406);
                return $response;
            }else{
                $borrowDate = $this->getDate();
                $returnDate = $this->getDateNextWeek();
                $borrowData = Borrow::create([
                    'student_id' => $data['student_id'],
                    'date_borrowed' => $borrowDate['date'],
                    'date_returned' => $returnDate['date'],
                ]);
                foreach(json_decode($data["book_id"]) as $book){
                    BorrowingBook::create([
                        'borrow_id' => $borrowData->id,
                        'book_id' => $book
                    ]);
                    Book::where('id',$book)->decrement('stock',1);
                }
                $response = response()->json('data accepted',200);
                return $response;
            }
        }catch (\Exception $e) {
            return $e->getMessage();
        }
        return response()->json($result);
    }

    public function getLastBorrow(Request $request){
        $borrow = Borrow::where('student_id',$request->id)
                        ->where('status','ongoing')->first();
        if($borrow != null){
            $response = response()->json('you not returned your last book',404);
            return $response;
        }else{
            $response = response()->json('your last borrow is complete',200);
            return $response;
        }
    }

    public function getDate(){
        $date = Carbon::now();
        
        return [
        'date' => $date->format('Y-m-d'),
        'time' => $date->toTimeString()
        ];
    }

    public function getDateNextWeek(){
        $date = Carbon::now();
        $date = $date->addDays(14);
        
        return [
        'date' => $date->format('Y-m-d'),
        'time' => $date->toTimeString()
        ];
    }
}
