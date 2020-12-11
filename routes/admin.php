<?php
// dd(Auth::check());
// Auth::routes();
// Route::middleware(['auth'])->group(function () {
    Route::group(['prefix'=>'admin', 'middleware' => 'role:superadmin'], function () {
 Route::get('dash', function(){

    return "admin";
});

Route::get('dashboard',function(){
    return view('admin.dashboard');
 })->name('admin.dashboard');

Route::get('mypage/index','MypageController@index')->name('mypage.index');

Route::get('users',function(){
    return view('admin.user.user');
})->name('admin.user');

Route::get('users_show',function(){
   return view('admin.user.user_show');
})->name('admin.user.user_show');


// ####################application#############
Route::get('application',function(){
    return view('admin.application.application');
})->name('admin.application');


//#############################Applicaiton show routes###############################################
// Route::get('application/university/show',function(){
//     return view('admin.application.university_show');
// })->name('admin.application.university_show');

Route::get('application/application/show',function(){
   return view('admin.application.application_show');
})->name('admin.application.application_show');

Route::get('application/application',function(){
   return view('admin.application.application_application');
})->name('admin.application.application_application');

Route::get('application/application/create',function(){
   return view('admin.application.application_create');
})->name('admin.application.application_create');


// Route::get('application/consultant/show',function(){
//     return view('admin.application.consultant_app');
// })->name('admin.application.consultant_app');

// Route::get('application/consultant/show',function(){
//     return view('admin.application.client_app');
// })->name('admin.application.client_app');

// Route::get('application/consultant/app',function(){
//     return view('admin.application.university_app');
// })->name('admin.application.university_app');
// ###############booking#####################

Route::get('booking',function(){
   return view('admin.booking.booking');
})->name('admin.booking');

Route::get('booking/show',function(){
   return view('admin.booking.booking_show');
})->name('admin.booking.booking_show');

Route::get('Booking/consultant',function(){
   return view('admin.booking.consultant');
})->name('admin.booking.consultant');


// #################General Routes####################

// Route::get('general/contact',function(){
//     return view('admin.general.contact');
// })->name('admin.general.contact');

Route::get('general/about',function(){
   return view('admin.general.about');
})->name('admin.general.about');

Route::get('general/terms&condition',function(){
   return view('admin.general.terms');
})->name('admin.general.terms');

Route::get('admin/general/privacy_policy',function(){
   return view('admin.general.privacy_policy');
})->name('admin.general.privacy_policy');

// ###############Report Application########################

Route::get('report/application/client',function(){
   return view('admin.report.application.client');
})->name('admin.report.application.client');

Route::get('report/application/university',function(){
   return view('admin.report.application.university');
})->name('admin.report.application.university');

Route::get('report/application/consultant',function(){
   return view('admin.report.application.consultant');
})->name('admin.report.application.consultant');

Route::get('report/application/client_show',function(){
   return view('admin.report.application.client_show');
})->name('admin.report.application.client_show');

Route::get('report/application/university_show',function(){
   return view('admin.report.application.university_show');
})->name('admin.report.application.university_show');

Route::get('report/application/consultant_show',function(){
   return view('admin.report.application.consultant_show');
})->name('admin.report.application.consultant_show');

Route::get('report/application/client_application',function(){
   return view('report/application/client_application');
})->name('admin.report.application.client_application');

Route::get('report/application/university_application',function(){
   return view('admin.report.application.university_application');
})->name('admin.report.application.university_application');

Route::get('report/application/consultant_application',function(){
   return view('admin.report.application.consultant_application');
})->name('admin.report.application.consultant_application');
// ############################# Report BooKing#################
Route::get('report/booking/client',function(){
   return view('admin.report.booking.client');
})->name('admin.report.booking.client');

Route::get('report/booking/consultant',function(){
   return view('admin.report.booking.consultant');
})->name('admin.report.booking.consultant');


Route::get('report/booking/client_show',function(){
   return view('admin.report.booking.client_show');
})->name('admin.report.booking.client_show');

Route::get('report/booking/consultant_show',function(){
   return view('admin.report.booking.consultant_show');
})->name('admin.report.booking.consultant_show');


Route::get('report/booking/client_application',function(){
   return view('admin.report.booking.client_application');
})->name('admin.report.booking.client_application');

Route::get('report/booking/consultant_application',function(){
   return view('admin.report.booking.consultant_application');
})->name('admin.report.booking.consultant_application');

// #################Earning###############
Route::get('earning',function(){
    return view('admin.earning.earning');
})->name('admin.earning');

Route::get('earning/earning_show',function(){
   return view('admin.earning.earning_show');
})->name('admin.earning.earning_show');
// ######################profile##############

/* Profile Section */
Route::get('profile',[
    'uses' => 'AdminProfileController@profile',
    'as' => 'admin.profile'
 ]);

 Route::post('profile_store',[
     'uses' => 'AdminProfileController@profileStore',
     'as' => 'admin.profile.update'
 ]);

});

Route::get('/', function () {
    return view('frontEnd.index');
})->name('front');



