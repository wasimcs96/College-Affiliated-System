<?php
   Route::group(['middleware' => 'role:university'], function () {
    Route::get('dash', function(){

       return "university";
   });
   /* University */

/* dashboard Section */
Route::get('dashboard',function(){
    return view('university.dashboard');
})->name('university.dashboard');

   /* Students Section */
Route::get('students',function(){
    return view('university.students');
})->name('university.students');

Route::get('student_show',function(){
    return view('university.student_show');
})->name('university.student.show');

Route::get('student_application',function(){
    return view('university.student_application');
})->name('university.student.application');


  /* Courses Section */
Route::get('courses',function(){
    return view('university.courses');
})->name('university.courses');

/* services Section */
Route::get('services',function(){
    return view('university.services');
})->name('university.services');

/* My Consultant Section */
Route::get('my_consultants',function(){
    return view('university.my_consultants');
})->name('university.my_consultants');

Route::get('my_consultant_show',function(){
    return view('university.my_consultant_show');
})->name('university.my_consultant_show');

Route::get('my_consultant_application',function(){
    return view('university.my_consultant_application');
})->name('university.my_consultant_application');

/* Consultant Section */
Route::get('consultants',function(){
    return view('university.consultants');
})->name('university.consultants');

Route::get('consultant_show',function(){
    return view('university.consultant_show');
})->name('university.consultant_show');

Route::get('consultant_application',function(){
    return view('university.consultant_application');
})->name('university.consultant_application');

/* gopremium Section */
Route::get('gopremium',function(){
    return view('university.go_premium');
})->name('university.go_premium');

/* adevents Section */
Route::get('adevents',function(){
    return view('university.ad_events');
})->name('university.ad_events');

/* adevents Section */
Route::get('privacy_policy',function(){
    return view('university.privacy_policy');
})->name('university.privacy_policy');

/* Contact Us Section */
Route::get('contact_us',function(){
    return view('university.contact_us');
})->name('university.contact_us');

/* Terms and Condition Section */
Route::get('terms_condition',function(){
    return view('university.terms_condition');
})->name('university.terms_condition');

/* Courses */
Route::get('courses',function(){
      return view('university.courses');
})->name('university.courses');

Route::get('course_show',function(){
    return view('university.course_show');
})->name('university.course_show');

Route::get('add_course',function(){
    return view('university.add_course');
})->name('university.add_course');


});
