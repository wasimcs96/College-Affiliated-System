<?php
   Route::group(['middleware' => 'role:subadmin'], function () {
    Route::get('dash', function(){

       return "subadmin";
   });
    Route::get('dashboard',function(){
    return view('subadmin.dashboard');
 })->name('subadmin.dashboard');

 Route::get('application/client',function(){
     return view('subadmin.application.client');
 })->name('subadmin.application.client');

 Route::get('application/consultant',function(){
    return view('subadmin.application.consultant');
})->name('subadmin.application.consultant');

Route::get('application/university',function(){
    return view('subadmin.application.university');
})->name('subadmin.application.university');
// show routes###############################################
Route::get('application/university/show',function(){
    return view('subadmin.application.university_show');
})->name('subadmin.application.university_show');

Route::get('application/client/show',function(){
    return view('subadmin.application.client_show');
})->name('subadmin.application.client_show');

Route::get('application/consultant/show',function(){
    return view('subadmin.application.consultant_show');
})->name('subadmin.application.consultant_show');

Route::get('application/consultant/show',function(){
    return view('subadmin.application.consultant_app');
})->name('subadmin.application.consultant_app');

Route::get('application/consultant/show',function(){
    return view('subadmin.application.client_app');
})->name('subadmin.application.client_app');

Route::get('application/consultant/app',function(){
    return view('subadmin.application.university_app');
})->name('subadmin.application.university_app');
// ###############booking#####################

Route::get('Booking/client',function(){
    return view('subadmin.booking.client');
})->name('subadmin.booking.client');

Route::get('Booking/university',function(){
    return view('subadmin.booking.university');
})->name('subadmin.booking.university');

Route::get('Booking/consultant',function(){
    return view('subadmin.booking.consultant');
})->name('subadmin.booking.consultant');

// ############################show booking##################

Route::get('Booking/client/show',function(){
    return view('subadmin.booking.client_show');
})->name('subadmin.booking.client_show');

Route::get('Booking/university/show',function(){
    return view('subadmin.booking.university_show');
})->name('subadmin.booking.university_show');

Route::get('Booking/consultant/show',function(){
    return view('subadmin.booking.consultant_show');
})->name('subadmin.booking.consultant_show');
// #####################booking application####################

Route::get('Booking/client/application',function(){
    return view('subadmin.booking.client_app');
})->name('subadmin.booking.client_app');

Route::get('Booking/university/application',function(){
    return view('subadmin.booking.university_app');
})->name('subadmin.booking.university_app');

Route::get('Booking/consultant/application',function(){
    return view('subadmin.booking.consultant_app');
})->name('subadmin.booking.consultant_app');

// #################General Routes####################

Route::get('general/contact',function(){
    return view('subadmin.general.contact');
})->name('subadmin.general.contact');

Route::get('general/about',function(){
    return view('subadmin');
})->name('subadmin.booking.university_app');

Route::get('Booking/consultant/application',function(){
    return view('subadmin.booking.consultant_app');
})->name('subadmin.booking.consultant_app');

Route::get('Booking/university/application',function(){
    return view('subadmin.booking.university_app');
})->name('subadmin.booking.university_app');

Route::get('Booking/consultant/application',function(){
    return view('subadmin.booking.consultant_app');
})->name('subadmin.booking.consultant_app');

 });
