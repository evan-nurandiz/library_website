<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Model\Student;
use App\Model\Borrow;
use App\Model\Visitor;
use App\User;
use Validator;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::paginate(15);
        return view('auth.admin.student.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.admin.student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data,[
            'name' => 'required',
            'nim' => 'required',
            'password' => 'required',
            'majors' => 'required',
            'class' => 'required',
            'gender' => 'required',
            'rfid' => 'required',
            'departement' => 'required',
            'email' => 'required',
        ]);

        if ($validator->fails()){
            return redirect()->back()->with('fail','data mahasiswa kurang lengkap');
        }else{
            $student = User::create([
                'name' => $data['name'],
                'email' => $data['nim'],
                'password' => Hash::make($data['password'])
            ]);

            $data['user_id'] = $student->id;
    
            $student->assignRole('student');

            Student::create($data);

            return redirect()->back()->with('status','data mahasiswa berhasil dibuat');

        }
    }

    public function students($class){
        $students = Student::where('class',$class)->paginate(10);
        return view('auth.admin.student.index',compact('students'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        $visit = Visitor::where('student_id',$id)->orderBy('created_at')->paginate(8);
        $borrows = Borrow::where('student_id',$id)->orderBy('created_at')->paginate(8);
        return view('auth.admin.student.show',compact('student','visit','borrows'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        return view('auth.admin.student.edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'nim' => 'required',
            'majors' => 'required',
            'class' => 'required',
            'gender' => 'required',
            'rfid' => 'required',
            'departement' => 'required',
        ]);

        $data = $request->all();
        Student::find($id)->update($data);
        return redirect()->back()->with('status','data mahasiswa berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function findstudents(Request $request){
        $students = Student::where('name','LIKE',"%$request->student%")->get();
        return view('auth.admin.student.result',compact('students'));
    }

    public function editAccount($id){
        $student = Student::find($id);
        return view('auth.admin.student.account',compact('student'));
    }

    public function updatePassword(Request $request,$id){
        $request->validate([
            'password' => 'required|min:6',
            're-password' => 'required|min:6',
        ]);
        $data = $request->all();
        if($data['password'] = $data['re-password']){
            $student = Student::find($id);
            User::where('id',$student->user_id)->update([
                'password' => Hash::make($data['password'])
            ]);
            return redirect()->back()->with('status','password berhasil diubah');
        }else{
            return redirect()->back()->with('fail','password tidak sama');
        }
    }

    public function borrow($id,$borrow_id){
        $borrow = Borrow::with('BorrowBook.Book')->find($borrow_id);
        $day_pass = $this->calculate_price($borrow->date_returned);
        return view('auth.admin.borrow.show',compact('borrow','day_pass'));
    }

    public function sendMail($email,$days,$penalty){
        Mail::raw('Kepada Mahasiswa,

Peminjaman Anda Melebihi Waktu Selama "'.$days.'" har

dengan denda sebanyak "'.$penalty.'" ribu 

mohon segera bayarkan pada perpustakaan elektro
            ', function ($message) use ($email) {
                $message->to($email)->subject('perpustakaan elektro');
            });
    }

    public function calculate_price($date){
        $date = Carbon::parse($date);
        $now = Carbon::now();
        $diff = $date->diffInDays($now);
        return $diff;
    }
}
