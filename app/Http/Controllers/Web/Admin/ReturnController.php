<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Borrow;

class ReturnController extends Controller
{
    public function return(){
        $borrows = Borrow::with('BorrowBook.Book')->where('status','pending')->paginate(10);
        return view('auth.admin.borrow.return',compact('borrows'));
    }

    public function confirm($id){
        Borrow::find($id)->update([
            'status' => 'complete'
        ]);
        return redirect()->back()->with('status','Pengembalian berhasil dikonfirmasi');
    }

    public function history(){
        $borrows = Borrow::with('BorrowBook.Book')->where('status',['complete','late'])->paginate(10);
        return view('auth.admin.borrow.history',compact('borrows'));
    }
}
