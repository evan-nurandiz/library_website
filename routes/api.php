<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/








Route::middleware('auth:api')->group(function () {
    Route::get('/mobile/book/search/{key}','Api\Mobile\MobileApiController@search');
    Route::get('/mobile/last-borrow/{id}','Api\Mobile\MobileApiController@getLastBorrow');
    Route::get('/mobile/last-borrow/date/{id}','Api\Mobile\MobileApiController@getLastBorrowDate');
    Route::get('/mobile/profile/{id}','Api\Mobile\MobileApiController@profile');
    Route::get('/mobile/borrow/{id}','Api\Mobile\MobileApiController@Borrow');
    Route::get('/mobile/borrow/book/{id}','Api\Mobile\MobileApiController@BorrowingData');
    Route::get('/mobile/visit/{id}','Api\Mobile\VisitorController@GetData');
    Route::get('/mobile/book','Api\Mobile\MobileApiController@GetAllBook');
    Route::get('/mobile/book/{id}','Api\Mobile\MobileApiController@GetBookById');
    Route::get('/mobile/student-information/{id}','Api\Mobile\MobileApiController@getStudentInfo');
});

Route::post('/mobile/auth','Api\Mobile\Auth\LoginController@login');


Route::middleware('apiKey')->group(function(){
    Route::resource('/raspberry/visitor','Api\RaspberryPi\VisitorController');
    Route::post('/RaspberryPi/find/student/borrow','Api\RaspberryPi\BorrowController@getStudentBorrowData');
    Route::post('/RaspberryPi/find/book','Api\RaspberryPi\BorrowController@GetBookByBarcode');
    Route::post('/RaspberryPi/find/student','Api\RaspberryPi\BorrowController@GetStudentData');
    Route::post('/RaspberryPi/borrow/history','Api\RaspberryPi\BorrowController@getLastBorrow');
    Route::post('/RaspberryPi/borrow/store','Api\RaspberryPi\BorrowController@store');
    Route::post('/RaspberryPi/borrow-data','Api\RaspberryPi\ReturnController@getBorrowData');
    Route::post('/RaspberryPi/return','Api\RaspberryPi\ReturnController@returnBook');
});






Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
