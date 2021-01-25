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
// Route::get('students',function(){
//     return view('consultant.student.students');
// })->name('consultant.students');
Route::get('students',[
    'uses'=>'ConsultantStudentController@index',
    'as'=>'consultant.students'
])->middleware('Package');
// Route::get('student_show',function(){
//     return view('consultant.student.student_show');
// })->name('consultant.student.show');
Route::get('students/detail/{id}',[
    'uses'=>'ConsultantStudentController@show',
    'as'=>'consultant.student.show'
]);

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

Route::get('booking/show/{id}',[
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

Route::post('booking/decline',[
    'uses'=>'ConsultantBookingController@decline',
    'as'=>'consultant.booking.decline'
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

Route::post('application/offer/decline',[
    'uses' => 'ConsultantApplicationController@offerDecline',
    'as'=>'consultant.application.offer.decline'
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

Route::get('associated_university/university/show/{id}',[
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

Route::get('services/subscription/add', [
    'uses' => 'ConsultantSubscriptionController@add',
    'as' => 'consultant.subscription.add'
]);

/* Go Premium */
Route::get('services/premium', [
    'uses' => 'ConsultantPremiumController@index',
    'as' => 'consultant.premium'
]);

Route::get('services/premium/add', [
    'uses' => 'ConsultantPremiumController@add',
    'as' => 'consultant.gopremium'
]);

 /* Advertisements */
 Route::get('services/advertisements', [
    'uses' => 'ConsultantAdvertisementController@index',
    'as' => 'consultant.advertisement'
]);

Route::get('services/advertisements/add', [
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

Route::get('application/fetch/university',[
    'uses' => 'ConsultantBookingController@fetchUniversity',
    'as' => 'fetch.university_application'
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

// Route::post('application/university/update',[
//     'uses' =>'ConsultantApplicationController@universityUpdate',
//     'as'=>'consultant.application.university.update'
// ]);

Route::post('application/update/university',[
    'uses' =>'ConsultantApplicationController@universityUpdate',
    'as'=>'consultant.application.update.university'
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

Route::get('applications/followup/show/{id}',[
    'uses' => 'ConsultantApplicationFollowUpController@show',
    'as' => 'consultant.application.followup.show'
]);

/* PR Migration */
Route::get('PR_Migration',[
    'uses'=>'ConsultantPrmigrationController@index',
    'as'=>'consultant.prmigration'
]);

Route::post('PR_Migration/store',[
    'uses'=>'ConsultantPrmigrationController@store',
    'as'=>'consultant.prmigration.store'
]);

/* Booking Follow Up Show */
Route::get('bookings/follow_up',[
    'uses' => 'ConsultantBookingFollowUpController@index',
    'as' => 'consultant.booking.followup'
]);

Route::post('bookings/follow_up/store',[
    'uses' => 'ConsultantBookingFollowUpController@store',
    'as' => 'consultant.booking.followup.store'
]);

Route::get('bookings/follow_up/show/{id}',[
    'uses' => 'ConsultantBookingFollowUpController@show',
    'as' => 'consultant.booking.followup.show'
]);

/* PRMIGRATION Section #######################################*/
Route::get('prmigration',[
    'uses'=>'ConsultantPrmigrationController@prindex',
    'as'=>'consultant.prmigration'
]);

Route::get('prmigration/show/{id}',[
    'uses'=>'ConsultantPrmigrationController@prshow',
    'as'=>'prmigration.booking.show'
]);

Route::post('prmigration/accept',[
    'uses'=>'ConsultantPrmigrationController@accept',
    'as'=>'consultant.prmigration.accept'
]);

/* Dues Section */
Route::get('dues/{id}',[
    'uses'=>'ConsultantDuesController@index',
    'as'=>'consultant.dues'
]);


Route::post('dues/pay',[
    'uses'=>'ConsultantDuesController@pay',
    'as'=>'consultant.dues.pay'
]);

// Route::get('prmigration/show/{id}',[
//     'uses'=>'ConsultantPrmigrationController@prshow',
//     'as'=>'prmigration.booking.show'
// ]);

// Route::post('prmigration/accept',[
//     'uses'=>'ConsultantPrmigrationController@accept',
//     'as'=>'consultant.prmigration.accept'
// ]);

/*Consultant Add University */

Route::post('application/add/university',[
    'uses' =>'ConsultantApplicationController@universityAdd',
    'as'=>'consultant.application.add.university'
]);

Route::get('advertisement/edit/{id}',[
    'uses' =>'ConsultantAdvertisementController@edit',
    'as'=>'consultant.advertisement.edit'
]);

Route::post('advertisement/update/{id}',[
    'uses' =>'ConsultantAdvertisementController@update',
    'as'=>'consultant.advertisement.update'
]);

/* Application Close */
Route::post('application/close',[
    'uses' =>'ConsultantApplicationController@closeApplication',
    'as'=>'consultant.application.close'
]);

});
