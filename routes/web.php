<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('get/{filename}', 'Web\Public\DownloadController@download')->name('getfile');

Auth::routes();

Route::group(['middleware'=>['role:student']],function(){
    Route::get('/student/dashboard/kunjungan','Web\Student\StudentController@dashboard')->name('student-dashboard');
    Route::get('/student/dashboard/peminjaman','Web\Student\StudentController@borrow')->name('student-borrow');
    Route::get('/student/dashboard/peminjaman/{id}','Web\Student\StudentController@borrowDetail')->name('student-borrow');
    Route::get('/student/dashboard/buku','Web\Student\StudentController@book')->name('student-book');
    Route::get('/student/dashboard/buku/{id}','Web\Student\StudentController@showBook')->name('student-book');
    Route::post('/student/book/search','Web\Student\StudentController@searchBook');
});

Route::group(['middleware'=>['role:admin']],function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/admin/buku', 'Web\Admin\BookController',[
        'names' => [
            'index' => 'admin.book',
            'create' => 'admin.book.create'
        ]
    ]);
    Route::resource('/admin/mahasiswa', 'Web\Admin\StudentController',[
        'names' => [
            'index' => 'admin.student',
            'create' => 'admin.student.create'
        ]
    ]);
    Route::resource('/admin/peminjaman', 'Web\Admin\BorrowController',[
        'names' => [
            'index' => 'admin.borrow'
        ]
    ]);
    Route::resource('/admin/penalty', 'Web\Admin\PenaltyController',[
        'names' => [
            'index' => 'admin.penalty'
        ]
    ]);
    Route::get('/student-{email}-{days}-{penalty}','Web\Admin\StudentController@sendMail');
    Route::get('/admin/mahasiswa/{id}/peminjaman/{borrow_id}', 'Web\Admin\StudentController@borrow');
    Route::get('/admin/tambah-admin','Web\Admin\AdminController@createNewAdmin')->name('add-admin');
    Route::get('/admin/mahasiswa/{id}/edit/akun', 'Web\Admin\StudentController@editAccount');
    Route::get('/admin/pengembalian', 'Web\Admin\ReturnController@return')->name('admin.return');
    Route::get('/admin/kunjugan', 'Web\Admin\VisitController@index')->name('admin.visit');
    Route::get('/admin/riwayat', 'Web\Admin\ReturnController@history')->name('admin.history');
    Route::get('/admin/elektro/mahasiswa/EC-{class}','Web\Admin\StudentController@students');
    Route::post('/admin/cari-mahasiswa', 'Web\Admin\StudentController@findstudents');
    Route::post('/admin/pengembalian/{id}', 'Web\Admin\ReturnController@confirm');
    Route::post('/admin/tambah-admin','Web\Admin\AdminController@storeNewAdmin');
    Route::patch('/admin/mahasiswa/{id}/edit/akun', 'Web\Admin\StudentController@updatePassword');
});




