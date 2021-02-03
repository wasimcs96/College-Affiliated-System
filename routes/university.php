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
// Route::get('students',function(){
//     return view('university.student.students');
// })->name('university.students');
Route::get('students',[
    'uses' => 'UniversityStudentController@index',
    'as' => 'university.students',
]);

Route::get('students/detail/{id}',[
    'uses' => 'UniversityStudentController@show',
    'as' => 'university.student.show',
]);


// Route::get('student_show',function(){
//     return view('university.student.student_show');
// })->name('university.student.show');

// Route::get('student_application',function(){
//     return view('university.student.student_application');
// })->name('university.student.application');


  /* Courses Section */
// Route::get('courses',function(){
//     return view('university.courses');
// })->name('university.courses');

/* services Section */
// Route::get('services',function(){
//     return view('university.services');
// })->name('university.services');

/* My Consultant Section */


Route::get('my_consultants',[
    'uses' => 'UniversityConsultantController@myconsultantindex',
    'as' => 'university.my_consultants',
]);

Route::get('my_consultants/show/{id}',[
    'uses' => 'UniversityConsultantController@myconsultantshow',
    'as' => 'university.my_consultant_show',
]);

Route::get('my_consultants/application',function(){
    return view('university.my_consultant.my_consultant_application');
})->name('university.my_consultant_application');

/* Consultant Section */
Route::get('consultants',[
    'uses' => 'UniversityConsultantController@index',
    'as' => 'university.consultants',
]);

Route::get('consultants/show/{id}',[
    'uses' => 'UniversityConsultantController@show',
    'as' => 'university.consultant_show',
]);

Route::get('consultants/show/accept/{id}',[
    'uses' => 'UniversityConsultantController@accept',
    'as' => 'university.consultant_accept',
]);

Route::get('consultants/consultant_application',function(){
    return view('university.consultant.consultant_application');
})->name('university.consultant_application');

/* gopremium Section */
// Route::get('service/gopremium',function(){
//     return view('university.go_premium');
// })->name('university.go_premium');

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

Route::get('courses/add_course',[
    'uses' => 'UniversityCoursesController@create',
    'as' => 'university.add_course'
]);

Route::post('course/store',[
    'uses' => 'UniversityCoursesController@store',
    'as' => 'university.course.store'
]);

Route::get('courses/show/{id}',[
    'uses' => 'UniversityCoursesController@show',
    'as' => 'university.course.show'
]);

Route::get('courses/edit/{id}',[
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

Route::get('courses/import',[
    'uses' => 'UniversityCoursesController@importBlade',
    'as' => 'university.course.import'
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
Route::post('media/delete',[
    'uses' =>'UniversityMediaController@destroy',
    'as'=>'media.destroy'

]);

/* Subscription */
Route::get('services/subscription', [
    'uses' => 'UniversitySubscriptionController@index',
    'as' => 'university.subscription'
]);


Route::get('services/subscription/add', [
    'uses' => 'UniversitySubscriptionController@add',
    'as' => 'university.subscription.add'
]);

/* Go Premium */
Route::get('services/premium', [
    'uses' => 'UniversityPremiumController@index',
    'as' => 'university.premium'
]);
Route::get('services/premium/add', [
    'uses' => 'UniversityPremiumController@add',
    'as' => 'university.gopremium'
]);
 /* Advertisements */
 Route::get('services/advertisements', [
    'uses' => 'UniversityAdvertisementController@index',
    'as' => 'university.advertisement'
]);

Route::get('services/advertisements/add', [
    'uses' => 'UniversityAdvertisementController@add',
    'as' => 'university.advertisement.add'
]);


Route::post('services/advertisements/store', [
    'uses' => 'UniversityAdvertisementController@store',
    'as' => 'university.advertisement.store'
]);

Route::get('advertisement/edit/{id}',[
    'uses' =>'UniversityAdvertisementController@edit',
    'as'=>'university.advertisement.edit'
]);

Route::post('advertisement/update/{id}',[
    'uses' =>'UniversityAdvertisementController@update',
    'as'=>'university.advertisement.update'
]);



/* University Course Media */
Route::get('/course/media/destroy/{id}',[
    'uses' =>'UniversityCoursesController@destroy',
    'as'=>'course.media.destroy'
]);

Route::post('/course/media/delete',[
    'uses' =>'UniversityCoursesController@delete',
    'as'=>'course.media.delete'

]);

/* University Messanger */

Route::post('university/messanger/fetchData', [
    'uses' => 'MessengerController@fetchData',
    'as' => 'university.messanger.fetchdata'
]);

Route::post('university/messanger/sendMessage', [
    'uses' => 'MessengerController@sendMessage',
    'as' => 'university.messanger.sendmessage'
]);

/* Document Section */
Route::get('document',[
    'uses' =>'UniversityDocumentController@index',
    'as'=>'university.document'
]);

Route::post('document/store',[
    'uses' =>'UniversityDocumentController@store',
    'as'=>'university.document.store'
]);

/* Application Routes */
Route::get('application',[
    'uses'=>'UniversityApplicationController@index',
    'as'=>'university.application'
]);

Route::get('application/show/{id}',[
    'uses'=>'UniversityApplicationController@applicationCreate',
    'as'=>'university.application.create'
]);
/* Import Routes */

Route::get('export', 'UniversityExcelController@export')->name('export');
Route::get('importExportView', 'UniversityExcelController@importExportView');
Route::post('import', 'UniversityExcelController@import')->name('import');

/* Category Fetch Course */
Route::get('fetch/category/course',[
    'uses' => 'UniversityCoursesController@fetchCategory',
    'as' => 'fetch.category.course'
]);

Route::get('fetch/category/course/add',[
    'uses' => 'UniversityCoursesController@fetchCategorycourse',
    'as' => 'fetch.category.add.course'
]);

});
