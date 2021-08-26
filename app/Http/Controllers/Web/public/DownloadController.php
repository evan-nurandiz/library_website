<?php

namespace App\Http\Controllers\web\public;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use File;
use Response;

class DownloadController extends Controller
{
    public function download($filename){
        $path = Storage::path('public/Apk/'.$filename);
        return response()->file($path ,[
            'Content-Type'=>'application/vnd.android.package-archive',
            'Content-Disposition'=> 'attachment; filename="android.apk"',
        ]) ;
    }
}
