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


  /* Courses Section */
Route::get('courses',function(){
    return view('university.courses');
})->name('university.courses');

/* services Section */
Route::get('services',function(){
    return view('university.services');
})->name('university.services');

/* introtoconsultant Section */
Route::get('introtoconsultant',function(){
    return view('university.intro_to_consultant');
})->name('university.intro_to_consultant');

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

});
