<?php
   Route::group(['middleware' => 'role:consultant'], function () {
    Route::get('dash', function(){

       return "consultant";
   });
   /* Consultant */


/* dashboard Section */
Route::get('dashboard',function(){
    return view('consultant.dashboard');
})->name('consultant.dashboard');

/* Student Section */
Route::get('students',function(){
    return view('consultant.student.students');
})->name('consultant.students');

Route::get('student_show',function(){
    return view('consultant.student.student_show');
})->name('consultant.student.show');


/* Search Section */
Route::get('search',function(){
    return view('consultant.search');
})->name('consultant.search');


/* Booking Section #######################################*/

// Route::get('bookings/{id}',function(){
//     return view('consultant.booking.bookings');
// })->name('consultant.bookings');
Route::get('booking',[
    'uses'=>'ConsultantBookingController@index',
    'as'=>'consultant.bookings'
]);

// Route::get('booking_show',function(){
//   return view('consultant.booking.booking_show');
// })->name('consultant.booking.show');

Route::get('show/{id}',[
    'uses'=>'ConsultantBookingController@show',
    'as'=>'consultant.booking.show'
]);

// Route::get('booking/application',function(){
//     return view('consultant.booking.booking_application');
// })->name('consultant.booking.application');

Route::get('booking/application/{id}',[
    'uses'=>'ConsultantBookingController@application',
    'as'=>'consultant.booking.application'
]);

Route::post('booking/application/store',[
    'uses'=>'ConsultantBookingController@applicationStore',
    'as'=>'booking.application.store'
]);

Route::post('booking/accept',[
    'uses'=>'ConsultantBookingController@accept',
    'as'=>'consultant.booking.accept'
]);

/* applied Section */
Route::get('applied',function(){
    return view('consultant.applied');
})->name('consultant.applied');

/* offer recieved Section */
Route::get('offerrecieved',function(){
    return view('consultant.offerrecieved');
})->name('consultant.offerrecieved');

/* accepted Section */
Route::get('accepted',function(){
    return view('consultant.accepted');
})->name('consultant.accepted');

/* readytofly Section */
Route::get('readytofly',function(){
    return view('consultant.readytofly');
})->name('consultant.readytofly');

/* prmigration Section */
Route::get('prmigration',function(){
    return view('consultant.prmigration');
})->name('consultant.prmigration');

/* services Section */
Route::get('services',function(){
    return view('consultant.services');
})->name('consultant.services');

/* Gopremium Section */
Route::get('gopremium',function(){
    return view('consultant.gopremium');
})->name('consultant.gopremium');

/* universityrequest Section */
Route::get('universityrequest',function(){
    return view('consultant.universityrequest');
})->name('consultant.universityrequest');

/* adevents Section */
Route::get('adevents',function(){
    return view('consultant.adevents');
})->name('consultant.adevents');

/* duesbilling Section */
Route::get('duesbilling',function(){
    return view('consultant.duesbilling');
})->name('consultant.duesbilling');

/* feedback Section */
Route::get('feedback',function(){
    return view('consultant.feedback');
})->name('consultant.feedback');

/* application Section */

Route::get('application',[
    'uses'=>'ConsultantApplicationController@index',
    'as'=>'consultant.application'
]);

Route::get('application/show/{id}',[
    'uses'=>'ConsultantApplicationController@applicationCreate',
    'as'=>'consultant.application.create'
]);

Route::post('application/document/store',[
    'uses'=>'ConsultantApplicationController@documentStore',
    'as'=>'consultant.application.document'
]);

Route::post('application/document/delete',[
    'uses' =>'ConsultantApplicationController@destroy',
    'as'=>'consultant.application.document.destroy'

]);

// Route::get('application/create/',function(){
//     return view('consultant.application.application_create');
// })->name('consultant.application.create');

/* associated university */


// Route::get('associated_university',function(){
//     return view('consultant.university.university');
// })->name('consultant.associated_university');

Route::get('associated_university',[
    'uses'=>'ConsultantUniversityController@index',
    'as'=>'consultant.associated_university'
]);

// Route::get('university_show',function(){
//     return view('consultant.university.university_show');
// })->name('consultant.university.show');

Route::get('university/show/{id}',[
    'uses'=>'ConsultantUniversityController@show',
    'as'=>'consultant.university.show'
]);

Route::get('requested_university',[
    'uses'=>'ConsultantUniversityController@indexRequest',
    'as'=>'consultant.request_university'
]);

Route::get('requested_university/show/{id}',[
    'uses'=>'ConsultantUniversityController@showRequest',
    'as'=>'consultant.request_university.show'
]);

/* Profile Section */
Route::get('profile',[
    'uses' => 'ConsultantProfileController@profile',
    'as' => 'consultant.profile'
 ]);

 Route::post('profile_store',[
     'uses' => 'ConsultantProfileController@profileStore',
     'as' => 'consultant.profile.update'
 ]);

 /* Subscription */
Route::get('services/subscription', [
    'uses' => 'ConsultantSubscriptionController@index',
    'as' => 'consultant.subscription'
]);

Route::get('subscription/add', [
    'uses' => 'ConsultantSubscriptionController@add',
    'as' => 'consultant.subscription.add'
]);

/* Go Premium */
Route::get('services/premium', [
    'uses' => 'ConsultantPremiumController@index',
    'as' => 'consultant.premium'
]);

Route::get('premium/add', [
    'uses' => 'ConsultantPremiumController@add',
    'as' => 'consultant.gopremium'
]);

 /* Advertisements */
 Route::get('services/advertisements', [
    'uses' => 'ConsultantAdvertisementController@index',
    'as' => 'consultant.advertisement'
]);

Route::get('advertisements/add', [
    'uses' => 'ConsultantAdvertisementController@add',
    'as' => 'consultant.advertisement.add'
]);


Route::post('advertisements/store', [
    'uses' => 'ConsultantAdvertisementController@store',
    'as' => 'consultant.advertisement.store'
]);

/* Fetch */
Route::get('application/fetch/course',[
    'uses' => 'ConsultantBookingController@fetchCourse',
    'as' => 'fetch.course_application'
]);

/* Application Apply */
Route::post('application/apply',[
    'uses' => 'ConsultantApplicationController@applicationApply',
    'as' => 'application.apply'
]);

Route::post('application/approval',[
    'uses' => 'ConsultantApplicationController@applicationApprovel',
    'as' => 'application.approval'
]);

Route::post('application/accepted',[
    'uses' => 'ConsultantApplicationController@applicationAccepted',
    'as' => 'application.accepted'
]);

Route::post('application/readytofly',[
    'uses' => 'ConsultantApplicationController@applicationReady',
    'as' => 'application.readytofly'
]);
/* Application Follow Up */
Route::get('applications/followup',[
    'uses' => 'ConsultantApplicationFollowUpController@index',
    'as' => 'consultant.application.followup'
]);

Route::get('applications/followup/create',[
    'uses' => 'ConsultantApplicationFollowUpController@create',
    'as' => 'consultant.application.followup.create'
]);

Route::post('applications/followup/store',[
    'uses' => 'ConsultantApplicationFollowUpController@store',
    'as' => 'consultant.application.followup.store'
]);

Route::get('PR_Migration',[
    'uses'=>'ConsultantPrmigrationController@index',
    'as'=>'consultant.prmigration'
]);

Route::post('PR_Migration/store',[
    'uses'=>'ConsultantPrmigrationController@store',
    'as'=>'consultant.prmigration.store'
]);


});
