<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Student;
use App\Model\Book;
use App\Model\Visitor;
use App\Model\Borrow;
use App\Model\Penalty;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total_student = Student::all();
        $total_book  = Book::all()->count();
        $total_visitor = Visitor::all();
        $total_visitor_today = Visitor::whereDate('created_at',Carbon::today())->get();
        $total_borrow = Borrow::all();
        $borrow_lates = Borrow::where('status','ongoing')->Get();
        foreach($borrow_lates as $borrow_late){
            $borrow_late['con_date_returned'] = $this->convert($borrow_late['date_returned']);
            $borrow_late['day_pass'] = $this->calculate_price($borrow_late->date_returned);
        }
        $borrow_lates =  $borrow_lates->where('con_date_returned', '<' , $this->convert($this->getdate()['date']));
        $total_penalty = Penalty::all();
        
        return view('home',compact('total_student','total_book','total_visitor','total_borrow','total_visitor_today', 'borrow_lates','total_penalty'));
    }

    public function confirm($id){
        $borrow = Borrow::find($id);
        $expect_return = $this->convert($borrow->date_returned);
        $return_date = $this->convert($borrow->return_date);
        if($expect_return > $return_date){
            $borrow->update(['status' => 'complete']);
        }else{
            $borrow->update(['status' => 'late']);
        }
        return redirect()->back()->with('status','Pengembalian berhasil dikonfirmasi');
    }
    
    public function convert($date) 
    {
      $newdate = str_replace("-", "", $date);
      return $newdate;
    }

    public function getDate(){
        $date = Carbon::now();
        
        return [
        'date' => $date->format('Y-m-d'),
        'time' => $date->toTimeString()
        ];
    }

    public function calculate_price($date){
        $date = Carbon::parse($date);
        $now = Carbon::now();
        $diff = $date->diffInDays($now);
        return $diff;
    }
}
