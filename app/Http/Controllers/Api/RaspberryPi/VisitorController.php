<?php

namespace App\Http\Controllers\Api\RaspberryPi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Student;
use App\Model\Visitor;
use Carbon\Carbon;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rfid = $request->all();
        
        try {
            $student = Student::where('rfid',$rfid)->first();
            $time = $this->getDate();
            $data = [
                'student_id' => $student->id,
                'date' => $time['date'],
                'time' => $time['time']
            ];
            $result = Visitor::create($data);
            $status = 200;
            return $result = [
                'message' => 'absen berhasil disimpan'
            ];
          } catch (\Exception $e) {
            $status = 404;  
            return $result = [
                'error' => 'rfid not found',
            ];
        }

        return response()->json($result, $status);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

    public function getDate(){
        $date = Carbon::now();
        
        return [
        'date' => $date->format('Y-m-d'),
        'time' => $date->toTimeString()
        ];
    }
}
