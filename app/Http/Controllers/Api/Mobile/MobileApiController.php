<?php

namespace App\Http\Controllers\Api\Mobile;

use App\Transformers\Api\BookTransformer;
use App\Transformers\Api\ProfileTransformer;
use App\Transformers\Api\BorrowTransformer;
use App\Transformers\Api\BorrowingDataTransformer;
use App\Transformers\Api\StudentInfoTransformer;
use App\Http\Controllers\Controller;
use App\Model\Book;
use App\Model\Student;
use App\Model\Borrow;
use App\Model\BorrowingBook;
use Illuminate\Http\Request;

class MobileApiController extends Controller
{
    public function GetAllBook(){
        $books = Book::paginate();
        return fractal()
        ->collection($books)
        ->transformWith(new BookTransformer)
        ->toArray();
    }

    public function GetBookById($id){
        $book = Book::find($id);
        return fractal()->item($book)->transformWith(new BookTransformer)->toArray();
    }

    public function profile($id){
        $student = Student::find($id);
        return fractal()->item($student)->transformWith(new ProfileTransformer)->toArray();
    }

    public function Borrow($id){
        $borrow = Borrow::where('student_id',$id)->latest()->paginate(4);
        return fractal()->collection($borrow)->transformWith(new BorrowTransformer)->toArray();
    }
    
    public function getLastBorrowDate($id){
        $borrow = Borrow::where('student_id',$id)->latest()->first();
        return fractal()->item($borrow)->transformWith(new BorrowTransformer)->toArray();
    }

    public function getLastBorrow($id){
        $borrow = Borrow::where('student_id',$id)->latest()->first();
        $res = $this->BorrowingData($borrow->id);
        return $res;
    }

    public function BorrowingData($id){
        $borrow = BorrowingBook::where('borrow_id',$id)->with('Book')->get()->pluck('Book');
        return fractal()->collection($borrow)->transformWith(new BorrowingDataTransformer)->toArray();
    }

    public function getStudentInfo($id){
        $student = Student::find($id);
        return fractal()->item($student)->transformWith(new StudentInfoTransformer)->toArray();
    }

    public function search($key){
        $books = Book::where('title','like', '%'.$key.'%')->Get();
        if($books){
            return fractal()->collection($books)->transformWith(new BookTransformer)->toArray();
        }else{
            return response()->json('book not found',404);
        }
        
    }
}
