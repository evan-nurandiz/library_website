<?php

namespace App\Http\Controllers\Web\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Student;
use App\Model\Borrow;
use App\Model\Book;
use Auth;

class StudentController extends Controller
{
    public function getStudent(){
        $id = Auth::user()->id;
        $student = Student::where('user_id',$id)->first();
        return $student;
    }

    public function dashboard(){
        $student = $this->getStudent();
        $visitors = $student->visiting()->paginate(10);
        return view('auth.student.home',compact('visitors'));
    }

    public function borrow(){
        $student = $this->getStudent();
        $borrows = Borrow::where('student_id',$student->id)->with('BorrowBook.Book')->paginate(6);
        return view('auth.student.borrow',compact('borrows'));
    }

    public function borrowDetail($id){
        $borrow = Borrow::with('BorrowBook.Book')->find($id);
        return view('auth.student.borrow.show',compact('borrow'));
    }

    public function book(){
        $books = Book::paginate(12);
        return view('auth.student.book.index',compact('books'));
    }

    public function showBook($id){
        $book = Book::find($id);
        return view('auth.student.book.show',compact('book'));
    }

    public function searchBook(Request $request){
        $books = Book::where('title', 'like', '%' . $request->name . '%')->orWhere('writter', 'like', '%' . $request->name . '%')->paginate(12);
        return view('auth.student.book.index',compact('books'));
    }
}
