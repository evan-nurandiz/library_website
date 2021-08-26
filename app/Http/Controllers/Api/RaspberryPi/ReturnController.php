<?php

namespace App\Http\Controllers\Api\RaspberryPi;

use App\Http\Controllers\Controller;
use App\Transformers\RaspberryPi\ReturnTransformer;
use Illuminate\Http\Request;
use App\Model\Book;
use App\Model\Borrow;
use App\Model\BorrowingBook;
use Carbon\Carbon;

class ReturnController extends Controller
{
    public function getBorrowData(Request $request){
        $id = $request->only(['id']);
        $borrow = Borrow::where('student_id',$id)
                        ->where('status','ongoing')
                        ->orWhere('status','late')
                        ->first();
        if($borrow != null){
            $books = BorrowingBook::where('borrow_id',$borrow->id)->whereHas('book')->Get()->pluck('book');
            return fractal()->collection($books)->transformWith(new ReturnTransformer)->toArray();
        }else{
            $response = response()->json('your last borrow is empty',404);
            return $response;
        }
        
    }

    public function returnBook(Request $request){
        $id = $request->only(['id']);
        $borrow = Borrow::where('student_id',$id)->where('status','ongoing')->first();
        foreach($borrow->BorrowBook as $book){
            Book::where('id',$book->book_id)->increment('stock',1);
        }
        $returnDate = $this->getDate();
        $borrow->update([
            'status' => 'pending',
            'return_date' => $returnDate['date']
        ]);
        return response()->json(200);
    }

    public function getDate(){
        $date = Carbon::now();
        
        return [
        'date' => $date->format('Y-m-d'),
        'time' => $date->toTimeString()
        ];
    }
}
