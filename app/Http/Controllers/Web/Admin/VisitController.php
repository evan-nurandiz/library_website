<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Visitor;

class VisitController extends Controller
{
    public function index(){
        $visitors = Visitor::with('Student')->latest()->paginate(10);
        return view('auth.admin.student.visit',compact('visitors'));
    }
}
