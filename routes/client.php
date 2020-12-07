<?php
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
Route::get('my_applications',function(){
    return view('client.application.my_applications');
})->name('client.my_applications');

Route::get('my_application_show',function(){
    return view('client.application.my_application_show');
})->name('client.my_application_show');

  /* Booking Section */
Route::get('bookings',function(){
    return view('client.booking.bookings');
})->name('client.bookings');

Route::get('booking_show',function(){
    return view('client.booking.booking_show');
})->name('client.booking_show');

 /* My Status Section */
Route::get('my_status',function(){
    return view('client.my_status');
})->name('client.my_status');

/* feedback Section */
Route::get('feedback',function(){
    return view('client.feedback');
})->name('client.feedback');

 /* Profile Section */
 Route::get('profile',function(){
    return view('client.profile');
})->name('client.profile');

});
