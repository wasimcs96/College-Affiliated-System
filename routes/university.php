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
    return view('university.student.students');
})->name('university.students');

Route::get('student_show',function(){
    return view('university.student.student_show');
})->name('university.student.show');

Route::get('student_application',function(){
    return view('university.student.student_application');
})->name('university.student.application');


  /* Courses Section */
// Route::get('courses',function(){
//     return view('university.courses');
// })->name('university.courses');

/* services Section */
Route::get('services',function(){
    return view('university.services');
})->name('university.services');

/* My Consultant Section */
// Route::get('my_consultants',function(){
//     return view('university.my_consultant.my_consultants');
// })->name('university.my_consultants');

Route::get('my_consultants',[
    'uses' => 'UniversityConsultantController@myconsultantindex',
    'as' => 'university.my_consultants',
]);



// Route::get('my_consultant_show',function(){
//     return view('university.my_consultant.my_consultant_show');
// })->name('university.my_consultant_show');

Route::get('my_consultant/show/{id}',[
    'uses' => 'UniversityConsultantController@myconsultantshow',
    'as' => 'university.my_consultant_show',
]);

Route::get('my_consultant_application',function(){
    return view('university.my_consultant.my_consultant_application');
})->name('university.my_consultant_application');

/* Consultant Section */
// Route::get('consultants',function(){
//     return view('university.consultant.consultants');
// })->name('university.consultants');

Route::get('consultants',[
    'uses' => 'UniversityConsultantController@index',
    'as' => 'university.consultants',
]);

Route::get('consultant/show/{id}',[
    'uses' => 'UniversityConsultantController@show',
    'as' => 'university.consultant_show',
]);

Route::get('consultant/show/accept/{id}',[
    'uses' => 'UniversityConsultantController@accept',
    'as' => 'university.consultant_accept',
]);

Route::get('consultant_application',function(){
    return view('university.consultant.consultant_application');
})->name('university.consultant_application');

/* gopremium Section */
Route::get('service/gopremium',function(){
    return view('university.go_premium');
})->name('university.go_premium');

/* adevents Section */
Route::get('adevents',function(){
    return view('university.ad_events');
})->name('university.ad_events');

/* privacy_policy Section */
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
Route::get('courses',[
    'uses' => 'UniversityCoursesController@index',
    'as' => 'university.courses'
]);

Route::get('add_course',[
    'uses' => 'UniversityCoursesController@create',
    'as' => 'university.add_course'
]);

Route::post('course/store',[
    'uses' => 'UniversityCoursesController@store',
    'as' => 'university.course.store'
]);

Route::get('course_show/{id}',[
    'uses' => 'UniversityCoursesController@show',
    'as' => 'university.course.show'
]);

Route::get('course_edit/{id}',[
    'uses' => 'UniversityCoursesController@edit',
    'as' => 'university.course.edit'
]);

Route::get('course_delete/{id}',[
    'uses' => 'UniversityCoursesController@destroy',
    'as' => 'university.course.delete'
]);

Route::post('course_update/{id}',[
    'uses' => 'UniversityCoursesController@update',
    'as' => 'university.course.update'
]);


/* Profile Section */
Route::get('profile',[
    'uses' => 'UniversityProfileController@profile',
    'as' => 'university.profile'
 ]);

 Route::post('profile_store',[
     'uses' => 'UniversityProfileController@profileStore',
     'as' => 'university.profile.update'
 ]);

// university media

Route::get('media',function(){
    return view('university.media.media');
})->name('university.media');

Route::post('media_store',[
    'uses'=>'UniversityMediaController@mediastore',
    'as'=> 'university.media.store'
]);
Route::get('media/delete/{id}',[
    'uses' =>'UniversityMediaController@destroy',
    'as'=>'media.destroy'

]);

/* Subscription */
Route::get('subscription', [
    'uses' => 'UniversitySubscriptionController@index',
    'as' => 'university.subscription'
]);

/* Go Premium */
Route::get('premium', [
    'uses' => 'UniversityPremiumController@index',
    'as' => 'university.premium'
]);

 /* Advertisements */
 Route::get('advertisements', [
    'uses' => 'UniversityAdvertisementController@index',
    'as' => 'university.advertisement'
]);

Route::get('advertisements/add', [
    'uses' => 'UniversityAdvertisementController@add',
    'as' => 'university.advertisement.add'
]);


Route::post('advertisements/store', [
    'uses' => 'UniversityAdvertisementController@store',
    'as' => 'university.advertisement.store'
]);

/* University Course Media */
Route::get('/course/media/delete/{id}',[
    'uses' =>'UniversityCoursesController@destroy',
    'as'=>'course.media.destroy'

]);


});
