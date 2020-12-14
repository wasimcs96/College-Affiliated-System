<?php
   Route::group(['middleware' => 'role:subadmin'], function () {
    Route::get('dash', function(){

       return "subadmin";
   });
    Route::get('dashboard',function(){
    return view('subadmin.dashboard');
 })->name('subadmin.dashboard');
 //##################users##################

 Route::get('users',function(){
     return view('subadmin.user.user');
 })->name('subadmin.users');

 Route::get('users_show',function(){
    return view('subadmin.user.user_show');
})->name('subadmin.user.user_show');


// ####################application#############
 Route::get('application',function(){
     return view('subadmin.application.application');
 })->name('subadmin.application.application');


//#############################Applicaiton show routes###############################################
// Route::get('application/university/show',function(){
//     return view('subadmin.application.university_show');
// })->name('subadmin.application.university_show');

Route::get('application/show',function(){
    return view('subadmin.application.application_show');
})->name('subadmin.application.application_show');

Route::get('application',function(){
    return view('subadmin.application.application');
})->name('subadmin.application');

Route::get('application/create',function(){
    return view('subadmin.application.application_create');
})->name('subadmin.application.application_create');



// ###############booking#####################

Route::get('booking',function(){
    return view('subadmin.booking.booking');
})->name('subadmin.booking');

Route::get('booking/show',function(){
    return view('subadmin.booking.booking_show');
})->name('subadmin.booking.booking_show');

Route::get('Booking/consultant',function(){
    return view('subadmin.booking.consultant');
})->name('subadmin.booking.consultant');


// #################General Routes####################

// Route::get('general/contact',function(){
//     return view('subadmin.general.contact');
// })->name('subadmin.general.contact');

Route::get('general/about',function(){
    return view('subadmin.general.about');
})->name('subadmin.general.about');

Route::get('general/terms&condition',function(){
    return view('subadmin.general.terms');
})->name('subadmin.general.terms');

Route::get('general/privacy_policy',function(){
    return view('subadmin.general.privacy_policy');
})->name('subadmin.general.privacy_policy');

// ###############Report Application########################

Route::get('report/application/client',function(){
    return view('subadmin.report.application.client');
})->name('subadmin.report.application.client');

Route::get('report/application/university',function(){
    return view('subadmin.report.application.university');
})->name('subadmin.report.application.university');

Route::get('report/application/consultant',function(){
    return view('subadmin.report.application.consultant');
})->name('subadmin.report.application.consultant');

Route::get('report/application/client_show',function(){
    return view('subadmin.report.application.client_show');
})->name('subadmin.report.application.client_show');

Route::get('report/application/university_show',function(){
    return view('subadmin.report.application.university_show');
})->name('subadmin.report.application.university_show');

Route::get('report/application/consultant_show',function(){
    return view('subadmin.report.application.consultant_show');
})->name('subadmin.report.application.consultant_show');

Route::get('report/application/client_application',function(){
    return view('subadmin.report.application.client_application');
})->name('subadmin.report.application.client_application');

Route::get('report/application/university_application',function(){
    return view('subadmin.report.application.university_application');
})->name('subadmin.report.application.university_application');

Route::get('report/application/consultant_application',function(){
    return view('subadmin.report.application.consultant_application');
})->name('subadmin.report.application.consultant_application');
// ############################# Report BooKing#################
Route::get('report/booking/client',function(){
    return view('subadmin.report.booking.client');
})->name('subadmin.report.booking.client');

Route::get('report/booking/consultant',function(){
    return view('subadmin.report.booking.consultant');
})->name('subadmin.report.booking.consultant');


Route::get('report/booking/client_show',function(){
    return view('subadmin.report.booking.client_show');
})->name('subadmin.report.booking.client_show');

Route::get('report/booking/consultant_show',function(){
    return view('subadmin.report.booking.consultant_show');
})->name('subadmin.report.booking.consultant_show');


Route::get('report/booking/client_application',function(){
    return view('subadmin.report.booking.client_application');
})->name('subadmin.report.booking.client_application');

Route::get('report/booking/consultant_application',function(){
    return view('subadmin.report.booking.consultant_application');
})->name('subadmin.report.booking.consultant_application');

// #################Earning###############
 Route::get('earning',function(){
     return view('subadmin.earning.earning');
 })->name('subadmin.earning');

 Route::get('earning_show',function(){
    return view('subadmin.earning.earning_show');
})->name('subadmin.earning.earning_show');

/* Profile Section */
Route::get('profile',[
    'uses' => 'SubAdminProfileController@profile',
    'as' => 'subadmin.profile'
 ]);

 Route::post('profile_store',[
     'uses' => 'SubAdminProfileController@profileStore',
     'as' => 'subadmin.profile.update'
 ]);

 });
