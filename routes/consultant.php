<?php
   Route::group(['middleware' => 'role:consultant'], function () {
    Route::get('dash', function(){

       return "consultant";
   });
   /* Consultant */

Route::get('students',function(){
    return view('consultant.students');
})->name('consultant.students');

Route::get('bookings',function(){
    return view('consultant.bookings');
})->name('consultant.bookings');
   });
