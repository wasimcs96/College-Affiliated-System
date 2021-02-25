<?php

// use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'role:client','middleware' => 'Status','middleware' => 'verified'], function () {
    Route::get('dash', function(){

       return "client";
   });
   /* Client */
   /* dashboard Section */
Route::get('dashboard',function(){
    return view('client.dashboard');
})->name('client.dashboard');
// ->middleware('verified');


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

Route::get('applications/show/{id}', [
    'uses' => 'ClientApplicationController@show',
    'as' => 'client.application.show'
]);

Route::post('application/accepted',[
    'uses' => 'ClientApplicationController@applicationAccepted',
    'as' => 'client.application.offer.accepted'
]);

Route::post('application/offer/decline',[
    'uses' => 'ClientApplicationController@offerDecline',
    'as'=>'client.application.offer.decline'
]);

Route::post('application/document/store',[
    'uses'=>'ClientApplicationController@documentStore',
    'as'=>'client.application.document.store'
]);

Route::post('application/document/delete',[
    'uses' =>'ClientApplicationController@documentDestroy',
    'as'=>'client.application.document.destroy'
]);
/* Booking Section */
Route::get('bookings', [
    'uses' => 'ClientBookingController@index',
    'as' => 'client.bookings'
]);

Route::get('bookings/show/{id}', [
    'uses' => 'ClientBookingController@show',
    'as' => 'client.booking.show'
]);

/* Messenger  */

Route::get('messenger', [
    'uses' => 'ClientMessengerController@index',
    'as' => 'client.messenger'
]);

Route::post('messenger/fetchData', [
    'uses' => 'ClientMessengerController@fetchData',
    'as' => 'client.messenger.fetchdata'
]);

Route::post('messenger/sendMessage', [
    'uses' => 'ClientMessengerController@sendMessage',
    'as' => 'client.messenger.sendmessage'
]);

});

