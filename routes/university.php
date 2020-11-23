<?php
   Route::group(['middleware' => 'role:university'], function () {
    Route::get('dash', function(){

       return "university";
   });
   /* University */
Route::get('students',function(){
    return view('university.students');
})->name('university.students');

Route::get('courses',function(){
    return view('university.courses');
})->name('university.courses');
   });
