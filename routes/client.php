<?php

// use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'role:client'], function () {
    Route::get('dash', function(){

       return "client";
   });
   /* Client */

   /* dashboard Section */
Route::get('dashboard',function(){
    return view('client.dashboard');
})->name('client.dashboard');


/*my_applications Section */
// Route::get('my_applications',function(){
//     return view('client.application.my_applications');
// })->name('client.my_applications');

// Route::get('my_application_show',function(){
//     return view('client.application.my_application_show');
// })->name('client.my_application_show');

  /* Booking Section */
// Route::get('bookings',function(){
//     return view('client.booking.bookings');
// })->name('client.bookings');

// Route::get('booking_show',function(){
//     return view('client.booking.booking_show');
// })->name('client.booking_show');

 /* My Status Section */
Route::get('my_status',function(){
    return view('client.my_status');
})->name('client.my_status');

/* feedback Section */
Route::get('feedback',function(){
    return view('client.feedback');
})->name('client.feedback');

 /* Profile Section */
 Route::get('profile',[
    'uses' => 'ClientProfileController@profile',
    'as' => 'client.profile'
 ]);

 Route::post('profile_store',[
     'uses' => 'ClientProfileController@profileStore',
     'as' => 'client.profile.update'
 ]);

 /*my_applications Section */
Route::get('applications', [
    'uses' => 'ClientApplicationController@index',
    'as' => 'client.applications'
]);

Route::get('application/show/{id}', [
    'uses' => 'ClientApplicationController@show',
    'as' => 'client.application.show'
]);

/* Booking Section */
Route::get('bookings', [
    'uses' => 'ClientBookingController@index',
    'as' => 'client.bookings'
]);

Route::get('booking/show/{id}', [
    'uses' => 'ClientBookingController@show',
    'as' => 'client.booking.show'
]);


});
