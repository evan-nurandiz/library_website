<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use Validator;

class AdminController extends Controller
{
    public function createNewAdmin(){
        return view('auth.admin.user.create');
    }

    public function storeNewAdmin(Request $request){
        $data = $request->all();

        $validator = Validator::make($data,[
            'name' => 'required|min:5|max:50',
            'email' => 'required|min:5|max:50',
            'password' => 'required|min:5',
            're-password' => 'required|min:5',
        ]);

        if ($validator->fails()){
            return redirect()->back()->with('fail','data kurang lengkap');
        }else{
            $student = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password'])
            ]);
    
            $student->assignRole('admin');

            return redirect()->back()->with('status','data mahasiswa berhasil dibuat');

        }
    }
}
